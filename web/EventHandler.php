<?php
class EventHandler extends \danog\MadelineProto\EventHandler {
    public function onAny($update) {
        \danog\MadelineProto\Logger::log("Received an update of type ".$update["_"]);
        if (isset($update["message"]["out"]) && $update["message"]["out"]) {
            if (isset($update["message"]["message"]) && $update["message"]["message"]){
                $current_message = $update["message"];
                //
                if (startsWith(
                    $current_message["message"],
                    $GLOBALS["COMMAND_HANDLER"] . "ping"
                )) {
                    $start_time = round(microtime(true) * 1000);
                    // https://stackoverflow.com/a/11424665/4723940
                    yield $this->messages->editMessage([
                        "peer" => $current_message,
                        "id" => $current_message["id"],
                        "message" => "Pong",
                        "parse_mode" => "HTML"
                    ]);
                    $end_time = round(microtime(true) * 1000);
                    $time_taken = $end_time - $start_time;
                    yield $this->messages->editMessage([
                        "peer" => $update,
                        "id" => $current_message["id"],
                        "message" => "Pong\n" . $time_taken . "ms",
                        "parse_mode" => "HTML"
                    ]);
                }
                //
                if (startsWith(
                    $current_message["message"],
                    $GLOBALS["COMMAND_HANDLER"] . "json"
                )) {
                  $res = json_encode($update, JSON_PRETTY_PRINT);
                  if ($res == "") {
                      $res = var_export($update, true);
                  }
                  yield $this->messages->editMessage([
                      "peer" => $update,
                      "id" => $current_message["id"],
                      "message" => "<code>$res</code>",
                      "parse_mode" => "HTML"
                  ]);
                }
                //
            }
            return;
        }
    }
}
