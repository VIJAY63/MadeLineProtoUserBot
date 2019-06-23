<?php
ini_set("display_errors", true);
error_reporting(E_ALL);

if (!file_exists(__DIR__."/../vendor/autoload.php")) {
    echo "You did not run composer update, using madeline.php".PHP_EOL;
    define("MADELINE_BRANCH", "");
    if (!file_exists("madeline.php")) {
        copy("https://phar.madelineproto.xyz/madeline.php", "madeline.php");
    }
    include "madeline.php";
} else {
    require_once __DIR__ . "/../vendor/autoload.php";
}

require_once __DIR__ . "/../sample_config.php";
require_once __DIR__ . "/functions.php";
require_once __DIR__ . "/EventHandler.php";

$settings = [
    "logger" => [
        "logger_level" => 5
    ],
    "app_info" => [
        "api_id" => $GLOBALS["APP_ID"],
        "api_hash" => $GLOBALS["API_HASH"],
        "device_model" => "MLPUB",
        "system_version" => "GNU/Linux powered by MLPUB",
        "app_version" => "1.0",
        "lang_code" => "ml"
    ]
];

$MadelineProto = new \danog\MadelineProto\API($GLOBALS["MLP_SESSION_NAME"], $settings);
// The session will be serialized to session.madeline
$MadelineProto->async(true);
// This will enable async mode for all MadelineProto functions
$MadelineProto->loop(function () use ($MadelineProto) {
    yield $MadelineProto->start();
    yield $MadelineProto->setEventHandler("\EventHandler");
    // set Event Handler
});
$MadelineProto->loop();
