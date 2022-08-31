<?php

declare(strict_types=1);
/**
 * @see https://datatracker.ietf.org/doc/html/rfc864
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-12
 */


namespace P3tite\Communication\Raw\Socket;


use P3tite\Application\Messages;

class Base
{

    /***
     * IP address
     *
     * @var string
     */
    public string $address;

    /**
     * TCP | UDP port - only used for IP v4 or 6 sockets
     *
     * @var int
     */
    protected int $port;

    /**
     * Protocol family - one of the following:
     *
     * \AF_INET (Pv4 based)
     * \AF_INET6 (IPv6 based)
     * \AF_UNIX (local communication)
     *
     * @var int
     */
    public int $domain;

    /**
     * Type of socket:
     *
     * \SOCK_STREAM (full-duplex, connection-based byte streams e.g: TCP)
     * \SOCK_DGRAM  (datagrams - connectionless, unreliable messages of a fixed maximum length) e.G: UDP
     * \SOCK_SEQPACKET (sequenced, reliable, two-way connection-based data transmission path for datagrams)
     * \SOCK_RAW (raw network protocol access e.g: ICMP requests )
     * \SOCK_RDM  (reliable datagram layer without guaranteed ordering ->   most likely not implemented on your os;)
     *
     * @var int
     */
    public int $type;

    /**
     * Protocol:
     *
     *  self::SOL_ICMP icmp (Internet Control Message Protocol)
     * \SOL_TCP tcp (Transmission Control Protocol)
     * \SOL_UDP udp   (User Datagram Protocol)
     *
     * @var int
     */
    public int $protocol;

    /**
     * @var \Socket
     */
    protected \Socket $socket;

    /**
     * Errors occurring while communication
     *
     * @var array
     */
    protected array $errorMessage = [];

    /**
     * Maximum of connections to being queued
     *
     * @var int
     */
    protected int $maxConnections = \SOMAXCONN;

    /***
     * Constant for ICMP is missing as native PHP constant
     */
    public const SOL_ICMP = 1;

    public const DEFAULT_READ_LENGTH = 2048;

    protected Messages $messages;

    /**
     * @param string $address
     * @param int $port
     * @param int $domain
     * @param int $type
     * @param int $protocol
     */
    public function __construct(string $address, int $port, int $domain = \AF_INET6, int $type = \SOCK_STREAM, int $protocol = \SOL_TCP)
    {
        //@TODO check with Validator!!
        $this->address = $address;
        $this->port = $port;
        $this->domain = $domain;
        $this->type = $type;
        $this->protocol = $protocol;

        $this->messages = new Messages();
        try {
            $this->create();
        } catch (SocketException $exception) {
            $this->errorMessage[] = $exception->getMessage() . '(' . $exception->getCode() . ')';
        }

    }

    public function create(): Base
    {
        $tmp = socket_create($this->domain, $this->type, $this->protocol);
        if ($tmp === false) {
            throw new SocketException(
                SocketException::SOCKET_COULD_NOT_BE_CREATED . socket_strerror(socket_last_error()),
                socket_last_error()
            );
        }
        $this->socket = $tmp;
        return $this;
    }

    public function bindAndListen(): Base
    {

        if (socket_bind($this->socket, $this->address, $this->port) === false) {
            throw new SocketException(
                SocketException::SOCKET_COULD_NOT_BE_CREATED . socket_strerror(socket_last_error()),
                socket_last_error()
            );
        }
        if (socket_listen($this->socket, 5) === false) {
            throw new SocketException(
                SocketException::LISTEN_STATE_COULD_NOT_BE_ESTABLISHED . socket_strerror(socket_last_error()),
                socket_last_error()
            );
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Base
     */
    public function setAddress(string $address): Base
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @param int $port
     * @return Base
     */
    public function setPort(int $port): Base
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return int
     */
    public function getDomain(): int
    {
        return $this->domain;
    }

    /**
     * @param int $domain
     * @return Base
     */
    public function setDomain(int $domain): Base
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return Base
     */
    public function setType(int $type): Base
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getProtocol(): int
    {
        return $this->protocol;
    }

    /**
     * @param int $protocol
     * @return Base
     */
    public function setProtocol(int $protocol): Base
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * @return \Socket
     */
    public function getSocket(): \Socket
    {
        return $this->socket;
    }

    /**
     * @param Socket $socket
     * @return Base
     */
    public function setSocket(\Socket $socket): Base
    {
        $this->socket = $socket;
        return $this;
    }

    /**
     * @return array
     */
    public function getErrorMessage(): array
    {
        return $this->errorMessage;
    }

    /**
     * @param array $errorMessage
     * @return Base
     */
    public function setErrorMessage(array $errorMessage): Base
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxConnections(): int
    {
        return $this->maxConnections;
    }

    /**
     * @param int $maxConnections
     * @return Base
     */
    public function setMaxConnections(int $maxConnections): Base
    {
        $this->maxConnections = $maxConnections;
        return $this;
    }

    public function write(\Socket $socket, string $message)
    {
        socket_write($socket, $message, strlen($message));
    }

    public function read(\Socket $socket, int $mode = \PHP_BINARY_READ, int $length = self::DEFAULT_READ_LENGTH)
    {
        $out = socket_read($socket, $length, $mode);
        if ($out === false) {
            throw new SocketException(
                SocketException::SOCKET_READ_ERROR . socket_strerror(socket_last_error($socket)),
                    socket_last_error($socket)
                    );
        }

        return $out;
    }

    public function closeSocket(\Socket $socket)
    {
        socket_close($socket);
    }

}