<?php
interface Command {
  public function execute(Context $context);
}