<?php

date_default_timezone_get("Asia/Taipei");

session_start();

class DB {
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=web01";
    protected $user = "root";
    protected $pw = "";
    protected $table;
    protected $pdo;

    public function __construct ($table) {
        $this -> table = $table;
        $this -> pdo = new PDO($this -> dsn, $this -> user, $this -> pw);
    }
    public function find($id) {
        $sql = "SELECT * FROM $this->table WHERE ";

        if (is_array($id)) {
            foreach ($id as $key => $value) {
                $tmp[] = "`$key` = '$value'";
                $sql .= implode(" AND ", $tmp);
            }
        } else {
            $sql .= "`id` = '$id'"; 
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function all(...$arg) {
        $sql = "SELECT * FROM $this->table ";

        switch(count($arg)) {
            case 2:
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = "`$key` = '$value'";
                }
                $sql .= " WHERE " . implode(" AND " . $arg[0]) . " " . $arg[1];
            break;
            case 1:
                if (is_array($arg[0])) {
                    foreach ($arg[0] as $key => $value) {
                    $tmp[] = "`$key` = '$value'";
                    }
                    $sql .= " WHERE " . implode(" AND ", $arg[0]);
                } else {
                    $sql .= $arg[1];
                }
            break;
        }
        if (isset($arg[0])) {
            

        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function math($method, $col, ...$arg) {

        return $this->pdo->query($sql)->fetchColumn();
    }

    public function save($array) {

        return $this->pdo->exec($sql);
    }

    public function del($id) {
        $sql = "DELETE FROM $this->table WHERE ";

        if (is_array($id)) {
            foreach ($id as $key => $value) {
                $tmp[] = "`$key` = '$value'";
                $sql .= implode(" AND ", $tmp);
            }
        } else {
            $sql .= "`id` = '$id'"; 
        }
        return $this->pdo->exec($sql);
    }

    public function q($sql) {

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}


// function () {

// }


function to($url) {
    header("location:" . $url);
}


?>