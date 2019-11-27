<?php
class Config {
    private static $instance = NULL;

    public static function getConnexion() {
        if (!isset(self::$instance)) {
            self::$instance=new PDO('mysql:host=localhost; dbname=snack-fit;',
                                    'root',
                                    '',
                                    array((PDO::MYSQL_ATTR_INIT_COMMAND) => 'SET NAMES utf8')
                                    );
            self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        }
        return self::$instance;
    }
}
?>
