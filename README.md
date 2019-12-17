# Singleton
```php
<?php
namespace Singleton;

use RuntimeException;

class Singleton
{
    private $id;

    private static $instance;

    private function __construct()
    {
        $this->id = md5(date('r')) . mt_rand();
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Singleton();
            echo 'a Singleton instance was created' . "\n";
        }
        return self::$instance;
    }

    public function getID()
    {
        return $this->id;
    }

    public final function __clone()
    {
        throw new RuntimeException('Clone is not allowed against ' . get_class($this));
    }
}
```