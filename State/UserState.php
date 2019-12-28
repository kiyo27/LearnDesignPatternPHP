<?php
namespace State;

interface UserState
{
    public function isAuthenticated();

    public function nextState();

    public function getMenu();
}