<?php

namespace app;

use queasy\App as BaseApp;

use app\models\Room;

class App extends BaseApp
{

    public static function user()
    {
        return null;
    }

    protected function before()
    {
        if ('00' == date('i')) { // Cleanup every hour
            Room::cleanup();
        }

        parent::before();
    }

}

