<?php

declare(strict_types=1);
/**
 * Class representing http response(s)
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

interface  ClientInterface
{
    public function __construct(string $uri);
    public function process(string $uri, string $method = 'GET'): self;
    public function getMethod(): string;
    public function setMethod(string $method): self;
    public function setParameters(array $parameters): self;
    public function getParameters(): ArrayClass;
    public function setParameter(string $name, $value);
    public function getParameter(string $name);
    public function getUri(): string;
    public function setUri(string $uri): self;
    public function getTtl(): int;
    public function setTtl(int $ttl): self;
    public function getResponse(): Response;
    public function post(string $uri = ''): self;
    public function put(string $uri = ''): self;
    public function get(string $uri = ''): self;
    public function delete(string $uri = ''): self;

}