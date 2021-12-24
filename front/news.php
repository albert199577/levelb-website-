<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <?php include "marquee.php";?>
    <span class="t botli">更多最新消息顯示區</span>
			<?php
			$all = $db -> math("count", "*");
            $div = 5;
            $pages = ceil($all / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $last_p = $now - 1;
            $next_p = $now + 1;
            ?>
            <ol style="list-style-type:decimal; start='$'">

            <?php
            $rows = $db -> all(" limit $start, $div");
			foreach ($rows as $key => $value) {
				echo "<li class='sswww'>";
				echo mb_substr($value["text"], 0, 20);
				echo "<div class='all' style='display: none'>{$value["text"]}</div>";
				echo "</li>";
			}
			?>

		</ol>
<style>
    .more-news a{
        text-decoration: none;
    }
    .more-news a:hover{
        text-decoration: underline;
    }
</style>

        <!--正中央-->
        <div class="more-news" style="text-align: center">
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
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
$(".sswww").hover(
    function ()
    {
        $("#alt").html("<pre>"+$(this).children(".all").html()+"</pre>").css({"top":$(this).offset().top-50})
        $("#alt").show()
    }
)
$(".sswww").mouseout(
    function()
    {
        $("#alt").hide()
    }
)
</script>