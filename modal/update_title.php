<h3>更新標題區圖片</h3>
<hr>
<form action="./api/update_title.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題區圖片:</td>
            <td><input type="file" value="" name="img"></td>
        </tr>
    </table>
    <div class="">
        <input type="submit" value="送出">
        <input type="reset" value="重置">
    </div>
</form>