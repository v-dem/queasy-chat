<?php

namespace app\models;

use queasy\db\TableTrait;

class Message
{

    use TableTrait;

    const TABLE_NAME = 'messages';

    const MESSAGES_COUNT = 10;

    public static function getMessages($roomId)
    {
        return self::table()->getMessages($roomId);
    }

    public static function addMessage($roomId, $user, $text)
    {
        if ($user) {
            $userId = App::user()->id;
            $userName = App::user()->name;
        } else {
            $userId = null;
            $userName = 'Guest';
        }

        self::table()->insert(array(
            'room_id' => $roomId,
            'user_id' => $userId,
            'user_name' => $userName,
            'text' => $text,
            'date_created' => date('Y-m-d H:i:s')
        ));
    }

    public static function cleanup($roomId)
    {
        self::table()->cleanup($roomId, $roomId);
    }

}

