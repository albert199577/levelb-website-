<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$db -> title;?></p>
    <form method="post" action="./api/edit.php?do=<?=$db -> table;?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="70%"><?=$db -> header;?></td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php

                $rows = $db -> all();

                foreach ($rows as $key => $value) {
                    $checked = ($value['sh'] == 1) ? 'checked' : '';
                ?>
                <tr class="">
                    <td>
                        <img src="./img/<?=$value['img'];?>" alt="" width="150px" height="100px">
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=$checked?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$value['id'];?>">
                    </td>
                        <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                    <td>
                        <input type="button" onclick="op('#cover','#cvr','./modal/upload.php?do=<?=$db -> table;?>&id=<?=$value['id'];?>')" value="更換動畫">
                    </td>
                </tr>
                <?php
                }
                
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/mvim.php?table=<?=$db -> table;?>')" value="<?=$db -> button?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>    
    </form>
</div>