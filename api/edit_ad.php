<?php
include_once "../base.php";

foreach ($_POST['id'] as $key => $value) {
    if (isset($_POST['del']) && in_array($value, $_POST['del'])) {
        //del method
        $Ad -> del($value);
    } else {
        //update method
        $data['id'] = $value;
        $data['text'] = $_POST['text'][$key];
        $data['sh'] = ((isset($_POST['sh']) && in_array($value, $_POST['sh']))) ? 1 : 0;
        $Ad -> save($data);
    }
}



// if (isset($_POST['id'])) {

// } else {
    to("../back.php?do=" . $Ad -> table);
// }

?>