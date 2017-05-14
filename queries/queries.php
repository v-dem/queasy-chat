<?php

return array(
    app\models\Message::TABLE_NAME => array(
        'cleanup' => array(
            'query' => sprintf('
                DELETE  FROM `%s`
                WHERE   `id` NOT IN (
                        SELECT  `id`
                        FROM    (
                                SELECT  `id`
                                FROM    `%s`
                                WHERE   `room_id` = :roomId1
                                ORDER   BY `date_created` DESC
                                LIMIT   %s
                                ) `m`
                        )
                        AND `room_id` = :roomId2',
                app\models\Message::TABLE_NAME,
                app\models\Message::TABLE_NAME,
                app\models\Message::MESSAGES_COUNT,
            ),
            'params' => array(
                'roomId1',
                'roomId2'
            )
            'return' => null
        ),
        'getMessages' => array(
            'query' => sprintf('
                SELECT  *
                FROM    `%s`
                WHERE   `room_id` = :roomId
                ORDER   BY `date_created` DESC
                LIMIT   %s',
                app\models\Message::TABLE_NAME,
                app\models\Message::MESSAGES_COUNT
            ),
            'params' => array(
                'roomId' => $roomId
            )
        )
    )
);

