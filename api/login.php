<?php 

include_once "../base.php";


$check = $Admin -> math('count', "*", ["acc" => $_POST['acc'], "pw" => $_POST['ps']]);


if ($check) {
    $_SESSION['login'] = $_POST['acc'];
    to("../back.php");
} else {
    echo "<script>";
    echo "alert('帳號密碼不正確');";
    echo "location.href='../index.php?do=login';";
    echo "</script>";
}


?>