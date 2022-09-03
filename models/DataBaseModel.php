<?php
require("Settings.php");

class DataBase extends PDO
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = parent::__construct(SETTINGS['dsn'],SETTINGS['username'],SETTINGS['password']);
            $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->db;
            
        } catch (PDOException $Exception) {
            echo $Exception->getMessage();
            return 0;
        }
    }
}
?>