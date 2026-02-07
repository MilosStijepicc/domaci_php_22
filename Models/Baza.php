<?php

    class Baza
    {
        const HOST = "localhost";
        const DB_USER = "root";
        const DB_PASSWORD = "";
        const DB_NAME = "web_shop";

        protected $sql;

        public function __construct() {
            $this->sql = mysqli_connect(self::HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
        }
    }

?>