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

// TODO: to be continued
}
