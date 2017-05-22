<?php

namespace app\models;

use queasy\db\TableTrait;

class Room
{

    use TableTrait;

    const TABLE_NAME = 'rooms';

    public static function getRoom($id)
    {
        return self::table()->get('id', $id);
    }

    public static function getMostActiveRooms()
    {
        return self::table()->all();
    }

    public static function cleanup()
    {
        $rooms = self::table()->all();
        foreach ($rooms as $room) {
            Message::cleanup($room['id']);
        }
    }

}

