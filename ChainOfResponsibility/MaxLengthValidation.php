<?php
namespace ChainOfResponsibility;

use RuntimeException;

class MaxLengthValidation extends ValidationHandler
{
    private $max_length;

    public function __construct($max_length = 10)
    {
        parent::__construct();
        if (preg_match('/^[0-9]{,2}$/', $max_length)) {
            throw new RuntimeException('max length is invalid (0-99)');
        }
        $this->max_length = (int)$max_length;
    }

    protected function execValidation($input)
    {
        return (strlen($input) <= $this->max_length);
    }

    protected function getErrorMessage()
    {
        return $this->max_length . 'バイト以内で入力してください.';
    }

}