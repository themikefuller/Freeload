# Freeload
Freeload is a PHP Class Autoloader

Freeload accepts an array of directory paths. These paths should be specified as absolute paths when available. When you create a new instance of a class, Freeload will search for the class file within the specified directories and within any subdirectory with the same (lowercase) name as the class itself. It will also look one directory deeper if it finds a src/ directory within the class name subdirectory.

## BASIC EXAMPLE

For this example, we have a file **/path/to/classes/example/src/example.php**

This file has a class called Example defined within.

Freeload should be defined early in the application so that attempts to create new objects from classes will be able to utilize it when the class is not found to be loaded.

    require_once '/path/to/freeload.php';
    $dirs = [
      '/path/to/classes',
      '/path/to/more/classes',
    ];
    $freeload = new Freeload;
    $freeload->Autoload($dirs);
    $example = new Example;
    
$example now holds an Example object, but example.php did not have to be required beforehand.
  
