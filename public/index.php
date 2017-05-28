<?php

// Set index.php path, do not change this
define('INDEX_PATH', __FILE__);

// We'll count that the parent folder is the main Queasy path
define('QUEASY_PATH', dirname(dirname(INDEX_PATH)));

// And we'll count that the vendor folder is in the main Queasy folder
define('VENDOR_PATH', sprintf('%s%s%s', QUEASY_PATH, DIRECTORY_SEPARATOR, 'vendor'));

// Include Queasy bootstrapping file
require_once(
    sprintf(
        '%s%s%sv-dem%squeasy-core%ssrc%sbootstrap.php',
        DIRECTORY_SEPARATOR, VENDOR_PATH, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR
    )
);

