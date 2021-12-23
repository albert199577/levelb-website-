<?php include_once "../base.php";

dd($_POST);
dd($_GET);

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $key => $value) {
        if (isset($_POST['del']) && in_array($value, $_POST['del'])) {
            $Menu -> del($value);
        } else {
            $sub = $Menu -> find($value);
            $sub['name'] = $_POST["name"][$key];
            $sub['href'] = $_POST["href"][$key];
            $Menu -> save($sub);
        }
    }
}

if (isset($_POST['name2'])) {
    foreach ($_POST['name2'] as $key => $value) {
        if ($value != '') {
            $Menu -> save(['name' => $value, 'href' => $_POST['href2'][$key], 'sh' => 1, 'parent' => $_GET['main']]);
        }
    }
}



to("../back.php?do=" . $Menu -> table);

?>