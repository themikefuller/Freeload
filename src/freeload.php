<?php
class Freeload {

    private $dirs;

    public function __construct($dirs=[]) {
        $this->dirs = $dirs;
        if (!empty($dirs)) {
            $this->Autoload($dirs);
        }
    }

    public function Autoload($dirs) {
       if (!is_array($dirs)) {
           $tempdir = $dirs;
           unset($dirs);
           $dirs[] = $tempdir;
       }
           $this->dirs = array_merge($this->dirs,$dirs);

       spl_autoload_register(function ($classname) {
           $classname = strtolower($classname);
           $dirs = $this->dirs;
           foreach ($dirs as $dir) {
               $dir = rtrim($dir,'/');
               if (file_exists($dir . '/' . $classname . '.php')) {
                   require_once($dir . '/' . $classname . '.php');
                   break;
               }
               if (file_exists($dir . '/' . $classname . '/' . $classname . '.php')) {
                   require_once($dir . '/' . $classname . '/' . $classname . '.php');
                   break;
               }
               if (file_exists($dir . '/' . $classname . '/src/' . $classname . '.php')) {
                   require_once($dir . '/' . $classname . '/src/' . $classname . '.php');
                   break;
               }
           }
       });
    }

}
