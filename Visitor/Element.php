<?php

namespace Visitor;

interface Element
{
    public function accept($v);
}