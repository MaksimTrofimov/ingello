<?php

namespace App\Modules\Store\Controllers;

class ProductController
{
    public function index()
    {
        echo __METHOD__ . '<br>';
        foreach($_GET as $key => $value) {
            echo $key . '= ' . $value;
        }
    }

    public function create()
    {
        foreach($_GET as $key => $value) {
            echo $key . '= ' . $value;
        }
        echo __METHOD__ . '<br>';
    }
}