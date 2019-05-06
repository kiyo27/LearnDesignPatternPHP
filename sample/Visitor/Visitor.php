<?php
require_once 'OrganizationEntry.php';

interface Visitor {
  public function visit(OrganizationEntry $entry);
}