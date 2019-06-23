<?php
if (getenv("ENV", true)) {
  echo "Using config.php";
  require_once __DIR__ . "/config.php";
}
else {
  echo "trying to Use ENV vars";
  $GLOBALS["APP_ID"] = getenv("APP_ID");
  $GLOBALS["API_HASH"] = getenv("API_HASH");
  $GLOBALS["MLP_SESSION_NAME"] = getenv("MLP_SESSION_NAME");
  $GLOBALS["COMMAND_HANDLER"] = getenv("COMMAND_HANDLER");
}
