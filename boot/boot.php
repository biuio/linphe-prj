<?php

namespace boot;

use Yjtec\Linphe\Core;
use Yjtec\Linview\View;

class boot {

    public $baseDir;

    public function __construct() {
        $this->baseDir = dirname(realpath(__DIR__));
    }

    public function start() {
        View::$baseDir = $this->baseDir;
        Core::start();
    }

}

return new boot();
