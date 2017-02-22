<?php

namespace Index\Controller;

use Thumb\Controller;

class IndexController extends Controller
{

    public function _init()
    {
    }

    public function index()
    {

        exec("java Coder 123 22 encode", $output);
        echo '<pre>';
        print_r($output);
        $this->display();
    }

}
