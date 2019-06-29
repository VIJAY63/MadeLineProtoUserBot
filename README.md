# [@MLPUB](https://telegram.dog/MLPUB)

## installing

##### The Easiest Way

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy?template=https://gitlab.com/Vijay63/UserBot)


##### The Legacy Way

Simply clone the repository and run the main file:

```sh
git clone https://github.com/SpEcHiDe/MadeLineProtoUserBot.git
cd MadeLineProtoUserBot
# <Create config.php with variables as given below>
php web/index.php
```


An example `config.php` file could be:

```php
<?php
$GLOBALS["APP_ID"] = 6;
$GLOBALS["API_HASH"] = "eb06d4abfb49dc3eeb1aeb98ae0f581e";
$GLOBALS["MLP_SESSION_NAME"] = "USER.madeline";
$GLOBALS["COMMAND_HANDLER"] = ".";
```
