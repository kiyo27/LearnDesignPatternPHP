<?php
require_once 'UserState.php';
require_once 'UnauthorizedState.php';

class AuthorizedState implements UserState {
  private static $singleton = null;

  private function __construct(){}

  public static function getInstance() {
    if (self::$singleton == null) {
      self::$singleton = new AuthorizedState();
    }
    return self::$singleton;
  }

  public function isAuthenticated() {
    return true;
  }

  public function nextState() {
    return UnauthorizedState::getInstance();
  }

  public function getMenu() {
    $menu = '<a href="?mode=inc">カウントアップする</a> |'
      . '<a href="?mode=reset">リセットする</a> |'
      . '<a href="?mode=state">ログアウトする</a>';
    return $menu;
  }

  public final function __clone() {
    throw new RuntimeException('Clone is not allowed against ' . get_class($this));
  }
}