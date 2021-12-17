<?php include_once "../base.php";

// $viewers = $_POST['total'];
// $total = $Total->find(1);
// $total['total'] = $viewers;
// $Total->save($total);

//the same top
$Bottom->save(['id' => 1, 'bottom' => $_POST['bottom']]);

to("../back.php?do=bottom");
?>