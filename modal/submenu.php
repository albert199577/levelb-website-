<?php include_once "../base.php";?>
<h3>編輯次選單</h3>
<hr>
<form action="./api/submenu.php?main=<?=$_GET['id'];?>" method="post" enctype="multipart/form-data">
    <table id="sub">
        <tr>
            <td>次選單名稱:</td>
            <td>次選單連結網址:</td>
            <td>刪除</td>
        </tr>
        <?php
            $subs = $Menu -> all(['parent' => $_GET['id']]);
            foreach ($subs as $key => $value) {
        ?>
        <tr>
            <td><input type="text" name="name[]" value="<?=$value['name'];?>"></td>
            <td><input type="text" name="href[]" value="<?=$value['href'];?>"></td>
            <td><input type="checkbox" name="del[]"></td>
            <input type="hidden" name="id[]" value="<?=$value['id'];?>">
        </tr>
        <?php
            }
        ?>
    </table>
    <div class="">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>
<script>
    function more() {
        let row = `<tr>
                    <td><input type="text" name="name2[]"></td>
                    <td><input type="text" name="href2[]"></td>
                    <td></td>
                    </tr>`;
                console.log(row);
        $("#sub").append(row);
    }
</script>