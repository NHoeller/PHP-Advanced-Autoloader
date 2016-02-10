<?php
/**
 * 
 * define namespace
 *
 */
namespace Conceptixx\AdvancedAutoloader;

/**
 *
 * AdvancedAutoloader
 *
 * this is the base class of the PHP-Advanced-Autoloader system. it is used to implement the
 * self extending and optimizing autoloader system. if the requirement of the conceptixx
 * PHP-Advanced-Autoloader is followed there need not to be any changes. in a further version
 * of this autoloader system an automatic update with this ithub repository is planned.
 *
 */
class AdvancedAutoloader
{

    /**
     * DS
     * 
     * this constant is defined as the DIRECTORY_SEPARATOR from the PHP for smarter access
     * by using self::DS
     * 
     * @var constant DS
     */
    const DS = DIRECTORY_SEPARATOR;

    /**
     * NS
     * 
     * this constant is defined as the \ for namespaces. this constant is only used for replacements
     * or other other string manipulating methods and functions. It can be accessed by using self::NS.
     * 
     * @var constant NS
     */
    const NS = '\\';

    /**
     * USED_STANDARDS
     *
     * this constant contains all featured 'standard' this system is using. all values are
     * comma separated and handled by the autoloader system.
     * 
     * @var constant USED_STANDARDS
     */
    const USED_STANDARDS = 'vendor,extend,mapping,psr4,psr0,pear';

    /**
     * $autoloaderObject
     * 
     * contains the created autoloader object
     * 
     * @var object \Conceptixx\AdvancedAutoloader\Interfaces\AdvancedAutoloaderInterface
     * @access protected
     * @static
     */
    protected static $autoloaderObject;

    /**
     * $adaptedStandards
     * 
     * this array contains all currently implemented standards, so the system can manage its self
     * extending features
     * 
     * @var array $adaptedStandards
     * @access protected
     * @static
     */
    protected static $adaptedStandards = array();

    /**
     * getLoader
     * 
     * gets the autoloader object detected by configuration
     * 
     * @return object \Conceptixx\AdvancedAutoloader\Interfaces\AdvancedAutoloaderInterface
     * @throws Exception \Exception
     * @access public
     * @static
     */
    public static function getLoader()
    {
        // check for self::$autoloaderObject
        if(true === \is_object(self::$autoloaderObject)) {
            // return object
            return self::$autoloaderObject;
        }

        // if no object has been found run detection
        // check if Interface exists and is readable
        if(false === \is_readable(__DIR__ . self::DS . 'Interfaces' . self::DS . 'AdvancedAutoloaderInterface.php')) {
            throw new \Exception("The required Interface (AdvancedAutoloaderInterface.php) does not exist or" .
                " is not readable");
        }
        // include the interface
        include_once(__DIR__ . self::DS . 'Interfaces' . self::DS . 'AdvancedAutoloaderInterface.php');

        // check if json or php configuration exists and is readable
        if(
            true === \is_readable(__DIR__ . self::DS . 'cfg.AdvancedAutoloader.json') ||
            true === \is_readable(__DIR__ . self::DS . 'cfg.AdvancedAutoloader.php')
        ) {
            // TODO: to be continued
        }
        // if no configuration is found check regular autoloader class
        if(false === \is_readable(__DIR__ . self::DS . 'Components' . self::DS . 'AdvancedAutoloader.php')) {
            throw new \Exception("The required class (Components/AdvancedAutoloader.php) does not exist or" .
                " is not readable");
        }
        // include regular PHP-Advanced-Autoloader class
        include_once(__DIR__ . self::DS . 'Components' . self::DS . 'AdvancedAutoloader.php');

    }
// TODO: to be continued
}
