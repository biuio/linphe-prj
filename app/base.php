<?php

namespace app;

use Yjtec\LinController\Controller;

class base extends Controller
{

    public function __construct()
    {
    }
    public function json($code, $msg, $data = [])
    {
        $this->ajaxReturn(['code' => $code, 'msg' => $msg, 'data' => $data]);
    }
}
