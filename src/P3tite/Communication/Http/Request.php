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
 * 
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
              $this->init();
    }

    private function init()
    {
        $this->requestUri = $_SERVER['REQUEST_URI'] ?? null;
        $this->requestMethod = $_SERVER['REQUEST_METHOD'] ?? null;
        $this->httpUpgradeInsecureRequests = $_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'] ?? null;
        $this->requestTimeFloat = (float)$_SERVER['REQUEST_TIME_FLOAT'] ?? null;
        $this->requestTime = (int)$_SERVER['REQUEST_TIME'] ?? null;

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

    public function getRequestUri(bool $withQueryString = true): string|null
    {
        return ($withQueryString)
            ? $this->requestUri
            : parse_url($this->requestUri, PHP_URL_PATH);
    }

    public function setRequestUri(string $uri): self
    {
        $this->requestUri = $uri;
        return $this;
    }

    public function getRequestMethod(): mixed
    {
        return $this->requestMethod;
    }

    public function getHttpUpgradeInsecureRequests(): mixed
    {
        return $this->httpUpgradeInsecureRequests;
    }

    public function getRequestTimeFloat(): ?float
    {
        return $this->requestTimeFloat;
    }

    public function getRequestTime(): ?int
    {
        return $this->requestTime;
    }

  
    public function getParameters(): ArrayClass
    {
        return $this->parameters;
    }
}
