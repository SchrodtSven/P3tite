<?php declare(strict_types=1);
/**
 * Temporary dummy class Foo
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 */
namespace P3tite\Core;

 class Foo
 {

   
    public const ALPHA = 'α';

    public const ALPHA_CAPITAL = 'Α';

    public const ALEPH = 'א';

    public const ALIF = 'أ';



    public const FLOTUS = 6969696969;

    public const ILL = 'Novo';

    public const KALI = 909;

    public const NA = 'o saecla';
    
    public const PI = 3.14;

    public const POPE = 666;

    public const POTUS = 999;

    public const UMI = 's ord';

   

    public const TI = 'rum';


    private string $created;
    
    public function __construct()
    {
        $this->created = date('Y-m-d H:i:s');
    }

    public function doubleMe(int $a)
    {
        return 2*$a;    
    }

    
 }