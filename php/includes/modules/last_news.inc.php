<?php
	$lastnews = DataBase::realizar("SELECT * FROM " . DB_LASTNEWS_TB . " ORDER BY Date DESC LIMIT " . $articles_in_lastnews);
	$lni=0;
?>
<section id="lastnews"> 
	<?php
		while( $lni<$articles_in_lastnews && isset($lastnews[$lni])){ ?>
			<article class="<?php echo $lastnews[$lni]['Category'];?>">
				<h3><?php echo $lastnews[$lni]['Title'];?></h3>
				<?php
					if(isset($lastnews[$lni]['Content'])) echo $lastnews[$lni]['Content']; 
					include ("../meta.inc.html");
					$lni++;
				?>
			</article>
		<?php } ?>
</section>
