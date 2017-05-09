CREATE  DATABASE `queasy_db`
        CHARACTER SET 'utf8'
        COLLATE 'utf8_general_ci';

CONNECT `queasy_db`;

SET     NAMES 'utf8' COLLATE 'utf8_general_ci';
SET     CHARACTER SET 'utf8';

CREATE  TABLE `users` (
        `id`                bigint          not null auto_increment,
        `current_room_id`   bigint              null,
        `name`              varchar(30)     not null,
        `password_hash`     varchar(40)         null,
        `last_active`       timestamp       not null,
        `color`             varchar(6)      not null,
        `is_guest`          tinyint         not null,
        primary key(`id`),
        unique(`name`)
);

CREATE  TABLE `rooms` (
        `id`                bigint          not null auto_increment,
        `name`              varchar(30)     not null,
        `is_free`           tinyint         not null default 0,
        `is_public`         tinyint         not null default 0,
        `date_created`      timestamp       not null,
        primary key(`id`)
);

INSERT  INTO `rooms` (`id`, `name`, `is_free`, `is_public`, `date_created`)
VALUES  (1, 'Guest Room', 1, 1, now());

CREATE  TABLE `messages` (
        `id`                bigint          not null auto_increment,
        `room_id`           bigint          not null,
        `user_id`           bigint              null,
        `user_name`         varchar(30)         null,
        `text`              varchar(200)    not null,
        `date_created`      timestamp       not null,
        primary key(`id`)
);

ALTER   TABLE `users`
        ADD CONSTRAINT `users_2_rooms` foreign key (`current_room_id`)
            REFERENCES `rooms` (`id`)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE;

ALTER   TABLE `messages`
        ADD CONSTRAINT `messages_2_users` foreign key (`user_id`)
            REFERENCES `users` (`id`)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE;

