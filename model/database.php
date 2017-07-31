<?php
class Database {
    private static $db;

    private function __construct() {}

    public static function getDB () {
        $secrets = fopen("../.secrets", "r");
        $username = rtrim(fgets($secrets));
        $password = rtrim(fgets($secrets));
        $dsn = rtrim(fgets($secrets));

        if (!isset(self::$db)) {
            try {
                self::$db = new PDO($dsn, $username, $password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>
