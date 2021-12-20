<?php

date_default_timezone_set("Asia/Taipei");

session_start();

class DB {
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=web01";
    protected $user = "root";
    protected $pw = "";
    protected $pdo;
    public $table;
    public $title;
    public $button;
    public $header;
    public $append;

    public function __construct ($table) {
        $this -> table = $table;
        $this -> pdo = new PDO($this -> dsn, $this -> user, $this -> pw);
        $this -> serStr($table);
    }

    private function serStr($table) {
        switch ($table) {
            case "title":
                $this -> title = "網站標題管理";
                $this -> button = "新增網站標題";
                $this -> header = "網站標題圖片";
            break;
            case "ad":
                $this -> title = "動態文字廣告";
                $this -> button = "新增動態文字廣告";
                $this -> header = "動態文字廣告";
            break;
            case "mvim":
                $this -> title = "動畫圖片管理";
                $this -> button = "新增動畫圖片";
                $this -> header = "動畫圖片";
            break;
            case "image":
                $this -> title = "校園映像資料管理";
                $this -> button = "新增校園映像";
                $this -> header = "校園映像資料圖片";
            break;
            case "total":
                $this -> title = "進站總人數管理";
                $this -> button = "";
                $this -> header = "進站總人數:";
            break;
            case "bottom":
                $this -> title = "頁尾版權資料管理";
                $this -> button = "";
                $this -> header = "頁尾版權資料";
            break;
            case "news":
                $this -> title = "最新消息資料管理";
                $this -> button = "新增最新消息資料";
                $this -> header = "最新消息資料內容";
            break;
            case "admin":
                $this -> title = "管理者帳號管理";
                $this -> button = "新增管理者帳號";
                $this -> header = "帳號";
                $this -> append = "密碼";
            break;
            case "menu":
                $this -> title = "選單管理";
                $this -> button = "新增主選單";
                $this -> header = "主選單名稱";
                $this -> append = "選單連結網址";
            break;

        }
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
                $sql .= " WHERE " . implode(" AND ", $arg[0]) . " " . $arg[1];
            break;
            case 1:
                if (is_array($arg[0])) {
                    foreach ($arg[0] as $key => $value) {
                    $tmp[] = "`$key` = '$value'";
                    }
                    $sql .= " WHERE " . implode(" AND ", $arg[0]);
                } else {
                    $sql .= $arg[0];
                }
            break;
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function math($method, $col, ...$arg) {
        $sql = "SELECT $method($col) FROM $this->table ";
        
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
                    $sql .= $arg[0];
                }
            break;
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    public function save($array) {
        if (isset($array['id'])) {
            //update
            foreach ($array as $key => $value) {
                $tmp[] = "`$key` = '$value'";
                $set = implode(" ,", $tmp);
            }
            $sql = "UPDATE $this->table SET " . implode(" ,", $tmp) . "WHERE `id` = '{$array['id']}'";
        } else {
            //insert
            $sql = "INSERT INTO $this->table (`" . implode("`, `", array_keys($array)) . "`) VALUES ('" . implode("', '", array_values($array)) . "')";
        }
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


$Total = new DB('total');
$Bottom = new DB('bottom');
$Title = new DB('title');
$Ad = new DB('ad');
$Mvim = new DB('mvim');
$Image = new DB('image');
$News = new DB('news');
$Admin = new DB('admin');
$Menu = new DB('menu');

$tt = $_GET['do'] ?? '';

switch ($tt) {
    case "title":
        $db = $Title;
    break;
    case "ad":
        $db = $Ad;
    break;
    case "mvim":
        $db = $Mvim;
    break;
    case "image":
        $db = $Image;
    break;
    case "total":
        $db = $Total;
    break;
    case "bottom":
        $db = $Bottom;
    break;
    case "news":
        $db = $News;
    break;
    case "admin":
        $db = $Admin;
    break;
    case "menu":
        $db = $Menu;
    break;

}
//TEST
// $bd = new DB('total');
// echo $bd->find(1)['total'];
// print_r($bd->all());


if (!isset($_SESSION['total'])) {
    $total = $Total->find(1);
    $total['total']++;
    $Total->save($total);
    $_SESSION['total'] = $total['total'];
}

?>

<?php

$title_str = ['title' => '網路標題管理',
              'ad' => '動態文字廣告管理',
              'mvim' => '動態圖片管理',
              'menu' => '選單管理'];
?>