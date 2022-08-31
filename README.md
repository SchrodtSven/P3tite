# P3tite
Very tiny web application framework (PHP 8.1+)

## Disclaimer / motivation 

This framework is _not_ *intended to be used in production, nor to be interoperable with other frameworks, libraries etc.* **for now** *.
It is a kind of POC and mainly PHP 8.1+ playground for me. 

The main (current) goals are: 

- learning about formerly unknown/lesser known PHP features
- doing performance profiling
- testing non- or even unusual design and architecture stuff
- well tested parts COULD be taken into other of projects of mine  

### Note::2self() : 
- Currently I am not sure, if I will add DocBlock comments to all methods|functions and property declarations
- for now I am using commenting mainly for remembering myself :-X
- I *always* use project specific data types *here*, instead of PHP native scalars for *now* 

## (Personal) Goals - targets to be reached with this project (for me)

 - Basic MVC functionality
 - Generic and language specific source code generation (from different data sources, e.g: RDBMs, flat files, http resources etc.)
 - Abstraction of scalar (even bits) and compound data types as PHP objects, offering fluent interfaces for complex operations on data
 - Offering client and server classes for basic and higher level network operations (raw sockets, tcp/udp, http ...) supporting legacy (v4) and current (v6) version of IP
 - Profiling different algorithms and patterns
 - having some nice hours and even fun  

# Appendix

## Files

<pre>
P3tite
├── LICENSE
├── MOCK_DATA.json
├── README.md
├── Reader.php
├── composer.json
├── composer.lock
├── files.txt
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
│       │   │   ├── data
│       │   │   │   ├── data.db
│       │   │   │   └── schema.sql
│       │   │   └── views
│       │   └── Config.php
│       ├── Autoload.php
│       ├── Cache
│       ├── Code
│       │   ├── GenericPart.php
│       │   ├── Lang
│       │   │   ├── Perl
│       │   │   ├── Php
│       │   │   ├── Python
│       │   │   ├── Rust
│       │   │   └── Sql
│       │   │       ├── Attribute.php
│       │   │       ├── DataType.php
│       │   │       ├── Query.php
│       │   │       ├── raw_data
│       │   │       │   └── typespure.txt
│       │   │       └── types.txt
│       │   └── Mocking
│       │       ├── Data
│       │       ├── DataContainer.php
│       │       ├── RandomData.php
│       │       ├── RandomNumber.php
│       │       └── raw_data
│       │           ├── MOCK_DATA.json
│       │           ├── heroes_dc.txt
│       │           ├── heroes_marvel.txt
│       │           ├── html5_elements.txt
│       │           └── html5_global_attr.txt
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
│       │   ├── Foo.php
│       │   └── Testing
│       │       ├── UnitTest.php
│       │       └── UnitTestConfig.php
│       ├── Data
│       │   ├── DateTimeHelper.php
│       │   └── Symbol.php
│       ├── Entity
│       │   ├── BasicEntity.php
│       │   └── Hero.php
│       ├── File
│       │   ├── FileException.php
│       │   └── Reader.php
│       ├── Frontend
│       │   ├── EcmaScript
│       │   ├── Html
│       │   │   ├── Element.php
│       │   │   └── General.php
│       │   └── StyleSheet
│       │       ├── AttributeSelector.php
│       │       └── Declaration.php
│       ├── Mvc
│       │   ├── ActionController.php
│       │   ├── FrontController.php
│       │   ├── PhpTplParser.php
│       │   └── Router.php
│       ├── Persistence
│       │   └── Driver
│       │       ├── DriverInterface.php
│       │       └── Sqlite.php
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
│       ├── Code
│       │   ├── Lang
│       │   │   ├── Perl
│       │   │   ├── Php
│       │   │   ├── Python
│       │   │   ├── Rust
│       │   │   └── Sql
│       │   │       └── DataTypeTest.php
│       │   └── Mocking
│       ├── Communication
│       ├── Core
│       │   └── FooTest.php
│       ├── DanglingTest.php
│       ├── Data
│       │   └── DateTimeHelperTest.php
│       ├── Entity
│       │   └── BasicEntityTest.php
│       ├── File
│       │   └── ReaderTest.php
│       ├── Frontend
│       │   ├── EcmaScript
│       │   ├── Html
│       │   │   └── ElementTest.php
│       │   └── StyleSheet
│       │       └── AttributeSelectorTest.php
│       ├── MockTest.php
│       ├── Mvc
│       ├── Persistence
│       │   └── Driver
│       │       └── SqliteTest.php
│       ├── Test.php
│       └── Type
│           ├── ArrayClassTest.php
│           ├── Binary
│           │   ├── BitTest.php
│           │   ├── BitsTest.php
│           │   ├── ByteTest.php
│           │   └── CrumbTest.php
│           └── StringClassTest.php

</pre>

## Development environment - just 4 the record

 - Main box: iMac21,2; Apple M1; Darwin Kernel Version 21.6.0/RELEASE_ARM64_T8101 arm64
 - IDE: Visual Studio Code; version: 1.70.2 (Universal)
 - PHP: PHP 8.1.9 (NTS); Zend Engine v4.1.9 with Zend OPcache v8.1.9
 - Sqlite: version 3.39.2
