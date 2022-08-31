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

class Validator
{
    public function isValidAddress(string $address)
    {
        return (filter_var($address, FILTER_VALIDATE_IP) !== false);
    }

    public function isValidPort(int $port)
    {
        return $port >= 1 && $port <= 65535;
    }

    public function checkProtocol(int $protocol)
    {
        return match ($protocol) {
            Base::SOL_ICMP,     //  ICMP
            \SOL_TCP,    // TCP will be ok
            \SOL_UDP => true, // UDP will be ok
            default => false // all others: not ok
        };
    }

    public function checkDomain(int $domain)
    {
        return match ($domain) {
            \AF_INET,     // legacy IP (IPv4) will be ok
            \AF_INET6,    // IP (IPv6) will be ok
            \AF_UNIX => true, // unix local communication will be ok
            default => false // all others: not ok
        };
    }

    public function checkType(int $type)
    {
        return match ($type) {
            \SOCK_STREAM => true, //full-duplex is ok
            \SOCK_DGRAM => true, // datagrams connectionless is ok
            \SOCK_SEQPACKET => true, //sequenced, reliable, two-way connection-based is ok
            \SOCK_RAW => true, // raw network protocol access is ok
            \SOCK_RDM => true, //reliable datagram layer without guaranteed ordering  is ok
            default => false // all others: not ok
        };
    }
}