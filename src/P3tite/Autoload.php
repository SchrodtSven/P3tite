<?php declare(strict_types=1);
/**
 * Autoloading for P3tite 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-09
 */


namespace P3tite;

class Autoload
{

    /**
     * Namespace prefix for project files
     */
    public const NAMESPACE = 'P3tite';

    /**
     * Lib prefix
     */
    public const LIB_PREFIX = 'src/';

    /**
     * Registering AL
     *
     * @return void
     */
    public function registerAutoloader()
    {
        /**
         * Registering project specific auto loading
         */
        spl_autoload_register(callback: function ($className) {

            // Check if namespace of class to be instantiated belongs to us
            if (str_starts_with($className,  Autoload::NAMESPACE)) {
                $file = self::LIB_PREFIX. str_replace('\\', '/', $className) . '.php';
               
                //print ('FOO:::: ' . $file . PHP_EOL);
               
                // Check if destination class file exists  and include it, if so - __do not throw__ \E*, because of AL chain!
                // @see https://www.php-fig.org/psr/psr-4/#2-specification : "4. Autoloader implementations *MUST NOT* throw exceptions,
                // MUST NOT raise errors of any level, and SHOULD NOT return a value."
                if (file_exists($file)) {
                    require_once $file;
                }
            }
        });
    }

    /**
     * (Yet) senseless function
     *
     * @return Autoload
     *
     */
    public static function run()
    {
        return new self();
    }
}

(new Autoload())->registerAutoloader();


