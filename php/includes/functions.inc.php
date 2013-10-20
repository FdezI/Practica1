<?php
	function show_rel_news(){
		$relnews = DataBase::realizar("SELECT `ID`, `Title` FROM " . DB_NEWS_TB . " WHERE Category='" . $_GET['cat'] . "' ORDER BY Date DESC LIMIT " . $GLOBALS['articles_in_relatednews']);
		echo '<div id="relatedNews" class="hovered">';
		echo '<fieldset><h4>Noticias Relacionadas</h4>';
		foreach($relnews as $relnew){
			echo '<h4 class="' . $_GET['cat'] . '" id="tooLong' . $relnew['ID'] . '">- <a href="?view=news&cat=' . $_GET['cat'] . '&id=' . $relnew['ID'] . '">' . substr($relnew['Title'], 0, 40);
					if(strlen($relnew['Title']) > 40)
						echo '<span id="long-show' .$relnew['ID']. '">...</span><span id="long-hidden' . $relnew['ID'] . '">' . substr($relnew['Title'], 40) . '</span>';
					echo '</a></h4>';
		}
		echo '</div></fieldset>';
	}
?>
