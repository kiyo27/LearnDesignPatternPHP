<?php
namespace State;

use RuntimeException;

class AuthorizedState implements UserState
{
    private static $singleton = null;

    private function __construct()
    {
        //
    }

    public static function getInstance()
    {
        if (self::$singleton == null) {
            self::$singleton = new AuthorizedState();
        }
        return self::$singleton;
    }

    public function isAuthenticated()
    {
        return true;
    }

    public function nextState()
    {
        return UnauthorizedState::getInstance();
    }

    public function getMenu()
    {
        //
    }

    public function __clone()
    {
        throw new RuntimeException('Clone is no allowed against ' . get_class($this));
    }
}