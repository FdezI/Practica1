<?php
    $articles_limit=$articles_in_home_left + $articles_in_home_center;
	$news = DataBase::realizar("SELECT * FROM " . DB_NEWS_TB . " ORDER BY Date DESC LIMIT " . $articles_limit);
	$i=0;
?>

<aside id="inner-left">
	<?php while( $i<$articles_in_home_left && isset($news[$i])){
			include("includes/articleLastMeta.inc.php");$i++;
			} ?>
</aside>

<aside id="inner-right">
	<?php include_once("includes/modules/last_news.inc.php"); ?>
	<?php $n_adds = $home_adds; include_once("includes/articleadds.inc.php"); ?>
</aside>

<section id="inner-center">
	<?php
	        $articles_in_home_center += $articles_in_home_left;
	        while( $i<$articles_in_home_center && isset($news[$i])){
			include("includes/articleFirstMeta.inc.php");$i++;
			} ?>
</section>
