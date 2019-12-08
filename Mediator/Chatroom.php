<?php
namespace Mediator;

class Chatroom
{
    private $users = [];

    public function login($user)
    {
        $user->setChatroom($this);
        if (!array_key_exists($user->getName(), $this->users)) {
            $this->users[$user->getName()] = $user;
            printf("%sさんが入室しました\n", $user->getName());
        }
    }

    public function sendMessage($from, $to, $message)
    {
        if (array_key_exists($to, $this->users)) {
            $this->users[$to]->receiveMessage($from, $message);
        } else {
            printf("%sさんは入室していないようです\n", $to);
        }
    }
}