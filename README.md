# Mediator
![img](Mediator_design_pattern.png)

## Mediator
Colleague からの通知を受け取るメソッドを実装する

```php
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
```

## Colleague
Mediator に通知を行うメソッドを実装する

```php
<?php
namespace Mediator;

class User
{
    private $chatroom;

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setChatroom($value)
    {
        $this->chatroom = $value;
    }

    public function getChatroom()
    {
        return $this->chatroom;
    }

    public function sendMessage($to, $message)
    {
        $this->chatroom->sendMessage($this->name, $to, $message);
    }

    public function receiveMessage($from, $message)
    {
        printf("%sさんから%sさんへ: %s\n", $from, $this->getName(), $message);
    }
}
```

## Observer パターンとの違い
Mediator パターンは Colleague オブジェクト同士のやりとりの仲介者を用意する。Observer パターンは Observer クラス自身が処理を行う。