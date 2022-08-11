# P3tite
Very tiny web application framework (PHP 8.1+)

## Disclaimer / motivation 

This framework is *not intended to be used in production, nor to be interoperable with other frameworks, libraries etc. for now*.
It is a kind of POC and mainly PHP 8.1+ playground for me. It is not intended to be used without thinking in PROD systems.

The main (current) goals are: 

- learning about formerly unknown/lesser known PHP features
- doing performance profiling
- testing non- or even unusual design and architecture stuff
- well tested parts COULD be taken into other of projects of mine  

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
│       │   └── App
│       ├── Autoload.php
│       ├── Cache
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
│       ├── Entity
│       ├── Mvc
│       │   ├── FrontController.php
│       │   └── Router.php
│       ├── Persistence
│       └── Type
│           ├── ArrayClass.php
│           └── StringClass.php
├── test
│   └── P3tite
│       ├── Application
│       ├── Communication
│       ├── Core
│       │   └── FooTest.php
│       ├── Mvc
│       └── Type

</pre>