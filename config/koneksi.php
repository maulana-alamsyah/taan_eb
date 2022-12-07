<?php
session_start();
class Database
{
    private $host;
    private $username;
    private $password;
    private $db;
    public $mysqli;

    public function __construct()
    {
        $this->db_connect();
    }

    public function db_connect()
    {
        $this->host = "db4free.net";
        $this->username = "taan_eb";
        $this->password = "pass-130328";
        $this->db = "taan_eb";

        $this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->db);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        return $this->mysqli;
    }
}
$db = new Database();
$db->db_connect();
