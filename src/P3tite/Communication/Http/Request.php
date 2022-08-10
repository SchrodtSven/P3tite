<?php

declare(strict_types=1);
/**
 * Class representing http request(s)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-09
 */

namespace P3tite\Communication\Http;

use P3tite\Type\ArrayClass;

class Request
{
    private ?string $requestUri;
    private ?string $requestMethod;
    private ?string $httpUpgradeInsecureRequests;
    private ?float $requestTimeFloat;
    private ?int $requestTime;
    private ?ArrayClass $parameters;

    public function __construct()
    {
        $this->requestUri = $_SERVER['REQUEST_URI'] ?? null;
        $this->requestMethod = $_SERVER['REQUEST_METHOD'] ?? null;
        $this->httpUpgradeInsecureRequests = $_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'] ?? null;
        $this->requestTimeFloat = (float)$_SERVER['REQUEST_TIME_FLOAT'] ?? null;
        $this->requestTime = (int)$_SERVER['REQUEST_TIME'] ?? null;
        $this->init();
    }

    private function init()
    {
        //@TODO parse super globals $_POST, $_GET or php input stream, if PUT into self::parameters
        switch ($this->requestMethod) {
            case 'PUT':
                parse_str(file_get_contents('php://input'), $tmp);
                break;
            case 'GET':
                $tmp = $_GET;
                break;
            case 'POST':
                $tmp = $_POST;
                break;
            default:
                $tmp = [];
        }

        $this->parameters = new ArrayClass($tmp);
    }

    /**
     * @return mixed|string|null
     */
    public function getRequestUri(): mixed
    {
        return $this->requestUri;
    }

    /**
     * To be used, when emulating HTTP console on a shell/CLI (e.g: unit tests, CI chains etc. )
     * @return mixed|string|null
     */
    public function setRequestUri(string $uri): self
    {
        $this->requestUri = $uri;
        return $this;
    }

    /**
     * @return mixed|string|null
     */
    public function getRequestMethod(): mixed
    {
        return $this->requestMethod;
    }

    /**
     * @return mixed|string|null
     */
    public function getHttpUpgradeInsecureRequests(): mixed
    {
        return $this->httpUpgradeInsecureRequests;
    }

    /**
     * @return float|null
     */
    public function getRequestTimeFloat(): ?float
    {
        return $this->requestTimeFloat;
    }

    /**
     * @return int|null
     */
    public function getRequestTime(): ?int
    {
        return $this->requestTime;
    }

    /**
     * @return ListType
     */
    public function getParameters(): ArrayClass
    {
        return $this->parameters;
    }
}
