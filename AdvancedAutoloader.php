<?php
/**
 * 
 * define namespace
 *
 */
namespace Conceptixx\AdvancedAutoloader;

/**
 * 
 * use statements
 * 
 */
use \Conceptixx\AdvancedAutoloader\Components;
use \Conceptixx\AdvancedAutoloader\Interfaces\AdvancedAutoloaderInterface;

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

        // if no autoloader object has been found object of self needed
        $autoload = new self();

        // check if Interface exists and is readable
        if(false === \is_readable(__DIR__ . self::DS . 'Interfaces' . self::DS . 'AdvancedAutoloaderInterface.php')) {
            throw new \Exception("The required Interface (AdvancedAutoloaderInterface.php) does not exist or" .
                " is not readable");
        }
        // include the interface
        include_once(__DIR__ . self::DS . 'Interfaces' . self::DS . 'AdvancedAutoloaderInterface.php');

        // check if json configuration exists and is readable
        if(true === \is_readable(__DIR__ . self::DS . 'cfg.AdvancedAutoloader.json')) {
            // load the json configuration to variable
            $autoloaderConfig = \file_get_contents(__DIR__ . self::DS . 'cfg.AdvancedAutoloader.json');
            // decode $autoloaderConfig and run detector (returns final object)
            return self::$autoloaderObject = $autoload->detectAutoloader(\json_decode($autoloaderConfig, true));
        }

        // if no configuration is found check regular autoloader class
        if(false === \is_readable(__DIR__ . self::DS . 'Components' . self::DS . 'AdvancedAutoloader.php')) {
            throw new \Exception("The required class (Components/AdvancedAutoloader.php) does not exist or" .
                " is not readable");
        }

        // include regular PHP-Advanced-Autoloader class
        include_once(__DIR__ . self::DS . 'Components' . self::DS . 'AdvancedAutoloader.php');
        // store new autoloader to instance and return object
        return self::$autoloaderObject = new Components\AdvancedAutoloader();
    }

    /**
     * detectAutoloader
     * 
     * searches a json config for an autoloader to implement
     * 
     * @param array $jsonConfiguration
     * @return object \Conceptixx\AdvancedAutoloader\Interfaces\AdvancedAutoloaderInterface
     * @throws Exception \Exception
     * @access protected
     */
    protected function detectAutoloader(array $jsonConfiguration)
    {
        // check for 'datasets' index in json
        if(false === isset($jsonConfiguration['datasets'])) {
            // throw exception
            throw new \Exception("the 'json'-file does not match the required format");
        }

        // create counter for logging
        $itemCounter = 0;

        // loop the 'datasets'
        foreach($jsonConfiguration['datasets'] as $datasetItem) {
            // store $itemCounter to dataset and increase counter
            $datasetItem['itemCounter'] = $itemCounter++;
            // check for 'methodName' index
            if(
                false === isset($datasetItem['methodName']) ||
                false === \method_exists($this, 'getAutoloaderBy' . $datasetItem['methodName')
            ) {
                // throw exception
                throw new \Exception("parameter 'methodName' in json does not match the requirements");
            }
            // create $methodName
            $methodName = 'getAutoloaderBy' . $datasetItem['methodName';
            // check result from the get...By method
            if(($methodResult = $this->{$methodName}($datasetItem)) instanceof AdvancedAutoloaderInterface) {
                // store $methodResult to self::$autoloaderObject and return it
                return self::$autoloaderObject = $methodResult;
            }
        }
        // if no loader can be detected throw exception
        throw new \Exception("no autoloader can be detected from json-file");
    }

    /**
     * getAutoloaderByAdapter
     * 
     * gets the autoloader created with an PHP-AdvancedAutoloader adapter software
     * 
     * @param string $datasetItem
     * @return object
     * @throw
     * @access protected
     */
    protected function getAutoloaderByComposer(array $datasetItem)
    {
        // check for injection file
    }

// TODO: to be continued
}
