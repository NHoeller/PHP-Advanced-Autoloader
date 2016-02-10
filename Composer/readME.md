#Composer autoload
The PHP-Advanced-Autoloader is compatible to the composer's autoload, but it **MUST** be used with the required interface.
The autoload object will accept all methods that were available for the PHP-Advanced-Autoloader.

##Installation
To use the composer autoload with the PHP-Advanced-Autoloader just create a _'AdvancedAutoload.json'_ file inside the _/path/to/vendor/Conceptixx/AdvancedAutoloader_ folder.
The json file needs to contain the following informations

**JSON**
```
{
  "datasets":
  [
    {
      "methodName": "Composer"
    }
  ]
}
```
That's it. When now the Advanced Autoloader is implemented to the project the composer's autoload will be used instead of the Conceptixx standard autoloader.
