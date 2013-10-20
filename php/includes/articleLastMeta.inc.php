<article class="<?php echo $news[$i]['Category'];?>">
	<h3><a href="<?php echo "?view=news&cat=" . $news[$i]['Category'] . "&id=" . $news[$i]['ID'];?>"><?php echo $news[$i]['Title'];?></a></h3>
	<?php
		if(isset($news[$i]['Subtitle'])) echo "<h4>" . $news[$i]['Subtitle'] . "</h4>";
		if(!is_null($news[$i]['Image'])) echo '<center><img src="images/' . $news[$i]['Image'] . '"></center>';
		if(!isset($_GET['id'])){
			$p=explode("</p>",$news[$i]['Content']);
			echo $p[0] . "</p>";
		}
		include("meta.inc.html");
	?>
</article>
