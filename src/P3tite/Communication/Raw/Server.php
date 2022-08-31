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


class Server extends Base
{

  public function run()
  {
      set_time_limit (0);
      /* implicit output buffering for debug */
      ob_implicit_flush ();
      $this->bindAndListen();
  }

  public function shutdown()
  {
      socket_close ($this->socket);
      exit(0);
  }

  protected function accept(): \Socket
  {
      $tmp = socket_accept($this->socket);
      if($tmp === false) {
            throw new SocketException(
                SocketException::ACCEPT_SOCKET_ERROR . socket_strerror(socket_last_error()),
                socket_last_error()
            );
      }
      return $tmp;
  }
}