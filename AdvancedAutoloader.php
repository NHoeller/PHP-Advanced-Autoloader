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
     * USED_STANDARDS
     *
     * this constant contains all featured 'standard' this system is using. all values are
     * comma separated and handled by the autoloader system.
     * 
     * @var constant USED_STANDARDS
     */
    const USED_STANDARDS = 'vendor,extend,mapping,psr4,psr0,pear';

// TODO: to be continued
}
