<?php

class Database
{
    private static $instance;

    public static function getInstance()
    {
        try {
            if (!isset(self::$instance)) {
                self::$instance = new PDO(
                    DSN,
                    DB_USER,
                    DB_PASS,
                    [
                        // エラーが起きたとき、例外をスロー
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        // オブジェクト形式で取得
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                        // SQLで指定した型で取得
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
            }

            return self::$instance;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
