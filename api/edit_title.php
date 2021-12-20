<?php
include_once "../base.php";

foreach ($_POST['id'] as $key => $value) {
    if (isset($_POST['del']) && in_array($value, $_POST['del'])) {
        //del method
        $Title -> del($value);
    } else {
        //update method
        $data['id'] = $value;
        $data['text'] = $_POST['text'][$key];
        $data['sh'] = ($_POST['sh'] == $value) ? 1 : 0;
        $Title -> save($data);
    }
}

// if (isset($_POST['id'])) {

// } else {
    to("../back.php?do=" . $Title -> table);
// }

?>