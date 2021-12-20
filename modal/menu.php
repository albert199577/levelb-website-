<h3>新增主選單</h3>
<hr>
<form action="./api/add.php?do=<?=$_GET['table'];?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>主選單名稱:</td>
            <td><input type="text" name="name"></td>
            <td>主選單連結網址:</td>
            <td><input type="text" name="href"></td>
        </tr>
    </table>
    <div class="">
        <input type="submit" value="送出">
        <input type="reset" value="重置">
    </div>
</form>