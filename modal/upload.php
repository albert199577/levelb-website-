<?php

include_once "../base.php";


?>
<h3>更新<?=$db -> upload;?></h3>
<hr>
<form action="./api/upload.php?do=<?=$db -> table;?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td><?=$db -> upload;?>:</td>
            <td><input type="file" value="" name="img"></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <div class="">
        <input type="submit" value="更新">
        <input type="reset" value="重置">
    </div>
</form>
