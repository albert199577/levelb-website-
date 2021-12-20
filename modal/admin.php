<h3>新增管理者帳號</h3>
<hr>
<form action="./api/add.php?do=<?=$_GET['table'];?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>帳號:</td>
            <td><input type="text" name="acc"></td>
            <td>密碼:</td>
            <td><input type="password" name="pw"></td>
        </tr>
    </table>
    <div class="">
        <input type="submit" value="送出">
        <input type="reset" value="重置">
    </div>
</form>