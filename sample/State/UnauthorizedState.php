<?php
require_once 'UserState.php';
require_once 'AuthorizedState.php';

class UnauthorizedState implements UserState {
  private static $singleton = null;

  private function __construct() {}
  
  public static function getInstance() {
    if (self::$singleton === null) {
      self::$singleton = new UnauthorizedState();
    }
    return self::$singleton;
  }

  public function isAuthenticated() {
    return false;
  }

  public function nextState() {
    return AuthorizedState::getInstance();
  }

  public function getMenu() {
    $menu = '<a href="?mode=state">ログイン</a>';
    return $menu;
  }

  public final function __clone() {
    throw new RuntimeException('Clone is not allowed against ' . get_class($this));
  }
}