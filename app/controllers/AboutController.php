<?php

namespace app\controllers;

use queasy\Controller;

class AboutController extends Controller
{

    public function get()
    {
        return $this->view('about');
    }

}

