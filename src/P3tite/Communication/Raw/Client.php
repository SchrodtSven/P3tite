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
 


class Client extends Base
{

    public function connect()
    {
        $result = socket_connect($this->socket, $this->address, $this->port);
        if ($result === false) {
            throw new SocketException(
                sprintf(SocketException::CONNECTION_TO_PORT_ERROR,
                    $this->address, $this->port)
            );
        }
    }


}