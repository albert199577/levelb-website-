<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$db -> title;?></p>
    <form method="post" action="./api/edit_title.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                </tr>
                <?php

                $rows = $db -> all();

                foreach ($rows as $key => $value) {
                    $checked = ($value['sh'] == 1) ? 'checked' : '';
                ?>
                <tr class="">
                    <td width="23%">
                        <input type="text" name="text[]" value="<?=$value['text'];?>">
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="sh" value="<?=$value['id'];?>" <?=$checked?>>
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="del[]" value="<?=$value['id'];?>">
                    </td>
                        <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                </tr>

                <?php

                }
                
                ?>

            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/ad.php')" value="<?=$db -> button?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>    
    </form>
</div>