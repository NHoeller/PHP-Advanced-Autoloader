# PHP-Advanced-Autoloader
PHP-Advanced-Autoloader is designed to be an universal self extending autoload system.

The PHP-Advanced-Autoloader is fully compatible with the following autoload builder
- composer

Also the PHP-Advanced-Autoloader is featured with some high perfomance autoload functions that can lead in instant file detection. Also mapping features are included and prefered.

# Installation
The PHP-Advanced-Autoloader has some requirements that have to be followed. If these requirements are NOT followed the classes, interfaces and traits have to be changed manually.

1. the advanced autoloader *MUST* be located at _/path/to/vendor/Conceptixx/AdvancedAutoloader_
2. all project files *SHOULD* be located inside the _/path/to/vendor_
3. all class files *SHOULD* follow the following naming conventions shown under _'vendor-loading'_
4. it *SHOULD* be avoided to place files outside the _/path/to/vendor_
5. all class files located outside th _/path/to/vendor_ *SHOULD* be placed in a 'vendor' path and follow the naming conventions shown under _'vendor-loading'_
6. all class files *MUST* follow the actual PSR conventions defined by the Framwork Interop Group (currently PSR-4)

# Features
The PHP-Advanced-Autoloader is delivered with many features explained below.

####vendor-loader
One of the features is a direct vendor loader that results in _instant_ detection of the class file. If the class file naming and its location inside the file system matches the required specifications
```
\VendorName\PackageName\SubNamespace\className =>
/path/to/vendors/VendorName/PackageName/SubNamespace/className.php
```
This feaure is the fastest possible file detection, so it is prefered by the PHP-Advanced-Autoloader system. It follows the actual PSR-4 standard published by the Framework Interop Group.

####classmap-extender
The second extremely performant way to autoload is the (prefered json based also php-array based) classmap-extender. This feature checks if there is a json/php file named and located like the class file containing the prefix 'map.' and load it.
```
vendorName/.../className.php
vendorName/.../map.className.json
vendorName/.../map.className.php
```
This file *MUST* contain a valid json classmap or php array
*json*
```json
{
  "VendorName\\PackageName\\SubNamespace\\className1":
    "/path/to/vendor/VendorName/PackageName/SubNamespace/className1.php",
  "VendorName\\PackageName\\SubNamespace\\className2":
    "/path/to/vendor/VendorName/PackageName/SubNamespace/className2.php",
  "VendorName\\PackageName\\SubNamespace\\className3":
    "/path/to/vendor/VendorName/PackageName/SubNamespace/className3.php",
}
```
*PHP*
```PHP
<?php
return array(
  "VendorName\\PackageName\\SubNamespace\\className1" =>
    "/path/to/vendor/VendorName/PackageName/SubNamespace/className1.php",
  "VendorName\\PackageName\\SubNamespace\\className2" =>
    "/path/to/vendor/VendorName/PackageName/SubNamespace/className2.php",
  "VendorName\\PackageName\\SubNamespace\\className3" =>
    "/path/to/vendor/VendorName/PackageName/SubNamespace/className3.php",
);
?>
```
So the PHP-Advanced-Autoloader expects that these files inside the classmap are needed EVERY TIME the requested class is loaded. The usage of these classmap-extensions SHOULD be reduced to a optimal minimum.

####classmap-loader
The next fast file detection can be reached by using a classmap-loader. The PHP-Advanced-Autoloader will lock up for the requested file inside the classmap AND DELETES entries that are invalid or the requested file is loaded.


# Usage
The PHP-Advanced-Autoloader is designed to be used as easy as possible. so the following 'PHP' code shows how to implement it.
```PHP
// set usage for namespace
use \Conceptixx\AdvancedAutoloader\AdvancedAutoloader;
// include advanced autoloader
include /Path/to/Vendor/Conceptixx/AdvancedAutoloader/AdvancedAutoloader.php;
// get autoloader
$autoload = AdvancedAutoloader::getLoader();
```
####AdvancedAutoloader::getLoader()
Inside the script the autoloader can be implemented as variable or property by using the get the getLoader method.
```PHP
// set usage for namespace
use \Conceptixx\AdvancedAutoloader\AdvancedAutoloader;
class classname
{
  // define property
  public $autoloader;
  // set method
  public function setAutoloader()
  {
    $this->autoload = AdvancedAutoloader::getLoader();
  }
}
// ...
$autoloader = AdvancedAutoloader::getLoader();
```

From the autoloader object requested by the getLoader() method are many methods available that are explained in a separate .md file.
