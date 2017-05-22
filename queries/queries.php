<?php

use app\models\Message;

return array(
    Message::TABLE_NAME => array(
        /**
         * Expects two parameters, both are room ID
         */
        'cleanup' => array(
            'query' => sprintf('
                DELETE  FROM `%s`
                WHERE   `id` NOT IN (
                        SELECT  `id`
                        FROM    (
                                SELECT  `id`
                                FROM    `%s`
                                WHERE   `room_id` = ?
                                ORDER   BY `date_created` DESC
                                LIMIT   %s
                                ) `m`
                        )
                        AND `room_id` = ?',
                Message::TABLE_NAME,
                Message::TABLE_NAME,
                Message::MESSAGES_COUNT
            )
        ),

        /**
         * Expects one parameter (room ID)
         */
        'getMessages' => array(
            'query' => sprintf('
                SELECT  *
                FROM    `%s`
                WHERE   `room_id` = ?
                ORDER   BY `date_created` DESC
                LIMIT   %s',
                Message::TABLE_NAME,
                Message::MESSAGES_COUNT
            )
        )
    )
);

