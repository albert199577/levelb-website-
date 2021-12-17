<?php include_once "../base.php";

// $viewers = $_POST['total'];
// $total = $Total->find(1);
// $total['total'] = $viewers;
// $Total->save($total);

//the same top
$Total->save(['id' => 1, 'total' => $_POST['total']]);

?>