<?php

declare(strict_types=1);
/**
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-31
 */


namespace P3tite\Communication\Raw;

class SocketException extends \ErrorException
{
    public const SOCKET_COULD_NOT_BE_CREATED = 'Socket could not be created: ';

    public const SOCKET_COULD_NOT_BE_BOUND = 'Socket could not be bound: ';

    public const LISTEN_STATE_COULD_NOT_BE_ESTABLISHED = 'State listen could not be established: ';

    public const ACCEPT_SOCKET_ERROR = 'Error while processing accept socket: ';

    public const SOCKET_READ_ERROR = 'Error while reading from socket: ';

    public const CONNECTION_TO_PORT_ERROR = 'The connection to port could not be established: (%s:%s)';

    public function __construct(
        string $message = '', int $code, int $severity = 1, ?string $filename = __FILE__, ?int $line = __LINE__, ?\Throwable $previous = null
    )
    {
          parent::__construct($message, $code, $severity, $filename, $line, $previous);
    }
}
