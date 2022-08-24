# P3tite
Very tiny web application framework (PHP 8.1+)

## Disclaimer / motivation 

This framework is *not intended to be used in production, nor to be interoperable with other frameworks, libraries etc. for now*.
It is a kind of POC and mainly PHP 8.1+ playground for me. 

The main (current) goals are: 

- learning about formerly unknown/lesser known PHP features
- doing performance profiling
- testing non- or even unusual design and architecture stuff
- well tested parts COULD be taken into other of projects of mine  

Note 2self():: Currently I am not sure, if I will add DocBlock comments to all methods|functions and property declarations
- for now I am using commenting mainly for remembering myself :-X
- we *always* use project specific data types instead of PHP native scalars for *now* 

# Appendix

## Files

<pre>
P3tite
├── LICENSE
├── README.md
├── make
├── phpunit.xml
├── public
│   └── index.php
├── router.php
├── src
│   └── P3tite
│       ├── Application
│       │   ├── Admin
│       │   ├── Api
│       │   ├── App
│       │   │   ├── controllers
│       │   │   │   └── Foo.php
│       │   │   └── views
│       │   └── Config.php
│       ├── Autoload.php
│       ├── Cache
│       ├── Code
│       │   ├── GenericPart.php
│       │   └── Mocking
│       │       ├── DataContainer.php
│       │       └── raw_data
│       │           ├── MOCK_DATA.json
│       │           ├── heroes_dc.txt
│       │           └── heroes_marvel.txt
│       ├── Communication
│       │   ├── Http
│       │   │   ├── ClientInterface.php
│       │   │   ├── CurlClient.php
│       │   │   ├── Parser.php
│       │   │   ├── Protocol.php
│       │   │   ├── Request.php
│       │   │   └── Response.php
│       │   ├── Raw
│       │   └── Response.php
│       ├── Console
│       ├── Core
│       │   └── Foo.php
│       ├── Data
│       │   └── Symbol.php
│       ├── Entity
│       │   └── Hero.php
│       ├── Frontend
│       │   ├── EcmaScript
│       │   ├── Html
│       │   │   └── Element.php
│       │   └── StyleSheet
│       │       └── Declaration.php
│       ├── Mvc
│       │   ├── ActionController.php
│       │   ├── FrontController.php
│       │   ├── PhpTplParser.php
│       │   └── Router.php
│       ├── Persistence
│       └── Type
│           ├── ArrayClass.php
│           ├── Binary
│           │   ├── Bit.php
│           │   ├── Bits.php
│           │   ├── Byte.php
│           │   ├── Crumb.php
│           │   ├── Nibble.php
│           │   ├── README.md
│           │   ├── Word16.php
│           │   └── Word32.php
│           ├── Operational
│           │   ├── ArrayFilter.php
│           │   └── StringFilter.php
│           └── StringClass.php
├── test
│   └── P3tite
│       ├── Application
│       ├── Communication
│       ├── Core
│       │   └── FooTest.php
│       ├── DanglingTest.php
│       ├── Frontend
│       │   ├── EcmaScript
│       │   ├── Html
│       │   └── StyleSheet
│       ├── MockTest.php
│       ├── Mvc
│       └── Type
│           ├── ArrayClassTest.php
│           ├── Binary
│           │   ├── BitTest.php
│           │   └── BitsTest.php
│           └── StringClassTest.php
</pre>

## Development environment - just 4 the record

 - Box: iMac21,2; Apple M1
 - OS: Darwin Kernel Version 21.6.0/RELEASE_ARM64_T8101 arm64
 - IDE: Visual Studio Code; version: 1.70.2 (Universal)
 - PHP: PHP 8.1.9 (NTS); Zend Engine v4.1.9 with Zend OPcache v8.1.9
 - Sqlite: version 3.39.2
