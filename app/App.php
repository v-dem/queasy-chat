<?php

namespace app;

use queasy\Kernel;

use app\models\Room;

class App extends Kernel
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

