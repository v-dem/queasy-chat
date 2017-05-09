<?php

namespace app\models;

use queasy\db\DbTrait;
use queasy\db\TableTrait;

class Message
{

    use DbTrait;
    use TableTrait;

    const TABLE_NAME = 'messages';

    const MESSAGES_COUNT = 10;

    public static function getMessages($roomId)
    {
        return self::db()->select('
            SELECT  *
            FROM    ' . self::TABLE_NAME . '
            WHERE   `room_id` = :roomId
            ORDER   BY `date_created` DESC
            LIMIT   ' . self::MESSAGES_COUNT,
            array(
                'roomId' => $roomId
            )
        );
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
        self::db()->execute('
            DELETE  FROM `' . self::TABLE_NAME . '`
            WHERE   `id` NOT IN (
                    SELECT  `id`
                    FROM    (
                            SELECT  `id`
                            FROM    `' . self::TABLE_NAME . '
                            WHERE   `room_id` = :roomId1
                            ORDER   BY `date_created` DESC
                            LIMIT   ' . self::MESSAGES_COUNT . '
                            ) `m`
                    )
                    AND `room_id` = :roomId2',
            array(
                'roomId1' => $roomId,
                'roomId2' => $roomId
            )
        );
    }

}

