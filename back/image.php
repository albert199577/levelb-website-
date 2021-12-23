
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$db->title;?></p>
    <form method="post"  action="api/edit.php?do=<?=$db->table;?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="70%"><?=$db->header;?></td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $all = $db -> math("count", "*");
                $div = 3;
                $pages = ceil($all / $div);
                $now = $_GET['p'] ?? 1;
                $start = ($now - 1) * $div;
        
                $rows = $db -> all(" limit $start, $div");
                
                foreach($rows as $row){
                    $checked = ($row['sh'] == 1) ? 'checked' : '';
                ?>
                <tr>
                    <td>
                        <img src="./img/<?=$row['img'];?>" style="width:100px;height:68px">
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$checked;?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">

                    </td>
                    <td>
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/upload.php?do=<?=$db->table;?>&id=<?=$row['id'];?>&#39;)" value="更換圖片">
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="cent">
            <?php
                for($i = 1; $i <= $pages; $i++) {
                    echo "<a href='?do={$db -> table}&p=$i'> $i </a>";
                }
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button"
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/<?=$db->table;?>.php?table=<?=$db->table;?>&#39;)" 
                              value="<?=$db->button;?>">
                    </td>
                    <td class="cent">
                        
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>