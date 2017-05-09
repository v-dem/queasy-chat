<?php

namespace app\controllers;

use queasy\Controller;

use app\App;
use app\models\Message;

class DefaultController extends Controller
{

    public function get($roomId = 1)
    {
        if ($this->request()->isAjax()) {
            return Message::getMessages($roomId);
        } else {
            return $this->view('index');
        }
    }

    public function post($roomId = 1)
    {
        Message::addMessage(
            $roomId,
            App::user(),
            $this->request()->post('text')
        );
    }

}

