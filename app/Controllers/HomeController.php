<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        //echo '<pre>'; print_r($this->pageData); exit;
        return view('index', $this->pageData);
    }
}
