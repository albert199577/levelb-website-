<?php
include_once "../base.php";

foreach ($_POST['id'] as $key => $value) {
    if (isset($_POST['del']) && in_array($value, $_POST['del'])) {
        //del method
        $db -> del($value);
    } else {
        //update method
        $data = $db -> find($value);

        switch ($db -> table) {
            case "title":
                $data['text'] = $_POST['text'][$key];
                $data['sh'] = ($_POST['sh'] == $value) ? 1 : 0;
            break;
            case "admin":
                $data['acc'] = $_POST['acc'][$key];
                $data['pw'] =  $_POST['pw'][$key];
            break;
            case "menu":
                $data['name'] = $_POST['name'][$key];
                $data['href'] = $_POST['href'][$key];
                $data['sh'] = ($_POST['sh'] == $value) ? 1 : 0;
            default:
                //ad, news, image, mvim
                $data['text'] = isset($_POST['text']) ? $_POST['text'][$key] : "";
                $data['sh'] = (isset($_POST['sh']) && in_array($value, $_POST['sh'])) ? 1: 0;
            break;
        }
        
        $db -> save($data);
        print_r($data);
    }
}



// if (isset($_POST['id'])) {

// } else {
    to("../back.php?do=" . $db -> table);
// }

?>