<?php
namespace ChainOfResponsibility;

class NotNullValidationHandler extends ValidationHandler
{
    protected function execValidation($input)
    {
        return (is_string($input) && $input !== '');
    }

    protected function getErrorMessage()
    {
        return '入力されていません.';
    }
}