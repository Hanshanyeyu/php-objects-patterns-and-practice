<?php
require_once "my/Outputter.php";
require_once "useful/Outputter.php";

use my\Outputter;
use useful\Outputter as UsefulOutputter;

class Index {

    public function __construct()
    {
        new Outputter();
        new UsefulOutputter();

        new \useful\Outputter();
    }
}

$index = new Index();