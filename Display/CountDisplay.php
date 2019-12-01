<?php
namespace Display;

use Display\Display;

/**
 * 機能のクラス
 * 新しい機能として multiDisplay を追加
 */
class CountDisplay extends Display
{
    public function __construct(DisplayImpl $impl)
    {
        parent::__construct($impl);
    }

    public function multiDisplay($times)
    {
        $this->open();
        for ($i = 0; $i < $times; $i++) {
            $this->print();
        }
        $this->close();
    }
}