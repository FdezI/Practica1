<?php
	$articles_limit=$articles_per_category_left + $articles_per_category_center + $articles_per_category_top;
	$news = DataBase::realizar("SELECT * FROM " . DB_NEWS_TB . " WHERE Category='" . $_GET['cat'] . "' ORDER BY Date DESC LIMIT " . $articles_limit);
	$i=0;
?>

<div id="mainbody" class="<?php echo $_GET['cat']; ?>">
	<header><?php echo $_GET['cat']; ?></header>
	<section id="inner-top">
		<?php while( $i<$articles_per_category_top && isset($news[$i])){
			include("includes/articleFirstMeta.inc.php"); $i++;
			}?>
	</section>
	<aside id="inner-left">
		<?php
		    $articles_per_category_left+=$articles_per_category_top;
		    while( $i<$articles_per_category_left && isset($news[$i])){
			include("includes/articleLastMeta.inc.php");$i++;
			} ?>
	</aside>
	<aside id="inner-right">
		<?php $n_adds = $category_adds; include_once("includes/articleadds.inc.php"); ?>
	</aside>
	<section id="inner-center">
		<?php
		    $articles_per_category_center+=$articles_per_category_left;
		    while( $i<$articles_per_category_center && isset($news[$i])){
			include("includes/articleFirstMeta.inc.php"); $i++;
			}?>
	</section>
</div>
