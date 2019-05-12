<?php
require('vendor/autoload.php');
use PHPUnit\Framework\TestCase;
use Test\Display;
use Test\StringDisplay;

class UserTest extends TestCase {
    public function testDecorator() {
        $b = new StringDisplay("Hello, world.");
        $this->assertIsInt($b->getRows());
    }
}