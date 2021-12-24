<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$db -> title;?></p>
    <form method="post" action="./api/edit.php?do=<?=$db -> table;?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="60%"><?=$db->header;?></td>
                    <td width="20%">顯示</td>
                    <td width="20%">刪除</td>
                </tr>
                <?php
                $all = $db -> math("count", "*");
                $div = 4;
                $pages = ceil($all / $div);
                $now = $_GET['p'] ?? 1;
                $start = ($now - 1) * $div;
                $last_p = $now - 1;
                $next_p = $now + 1;
                $rows = $db -> all(" limit $start, $div");
                
                foreach($rows as $key => $value){
                    $checked = ($value['sh'] == 1) ? 'checked' : '';
                ?>
                <tr class="">
                    <td>
                        <input type="text" name="text[]" value="<?=$value['text'];?>">
                        
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=$checked?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$value['id'];?>">
                    </td>
                        <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                </tr>

                <?php

                }
                
                ?>

            </tbody>
        </table>
        <div class="cent">
            <?php
                if ($now > 1) {
                    echo "<a style='margin: 5px;' href='?do={$db -> table}&p={$last_p}'><span> &#60; </span></a>";
                } 
                for($i = 1; $i <= $pages; $i++) {
                    if ($now == $i) {
                        echo "<a style='font-size: 2rem;margin: 5px;' href='?do={$db -> table}&p=$i'> $i </a>";
                    } else {
                        echo "<a style='margin: 5px;' href='?do={$db -> table}&p=$i'> $i </a>";
                    }
                }
                if ($now < $pages) {
                    echo "<a style='margin: 5px;' href='?do={$db -> table}&p={$next_p}'><span> &#62; </span></a>";
                }
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$db -> table;?>.php?table=<?=$db -> table;?>')" value="<?=$db -> button?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>    
    </form>
</div>