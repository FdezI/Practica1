<?php
	$news = DataBase::realizar("SELECT * FROM " . DB_NEWS_TB . " WHERE ID='" . $_GET['id'] . "'");
	$i=0;
?>

<?php if(Session::verifyUser()){
		if(isset($_POST['comment'])){
			DataBase::realizar("INSERT INTO `" . DB_COMMENTS_TB . "`(`UserName`, `NewsID`, `Content`)
											VALUES ('" . Session::getUser() . "','" . $_GET['id'] . "','" .
											$_POST['content'] . "')");
		}
	}
?>

<script>
	$(document).ready(function(){
	  $('#inner-center h3').mouseover(function(){
		$('#relatedNews').fadeIn();
	  });
	  
	  $('#inner-center h3').mousemove(function(e){
		  $('.hovered').css({color:"#000",left:(e.pageX-100),top:(e.pageY+10)});
	  });
	  
	  $('[id^=tooLong]').mouseover(function(e){
		var currentID = '[id$='+e.currentTarget.id.replace('tooLong', '')+']';
		$('[id^=long-hidden]'+currentID).fadeIn("fast");
		$('[id^=long-show]'+currentID).hide();
	  });
	  
	  $('[id^=tooLong]').mouseleave(function(e){
		var currentID = '[id$='+e.currentTarget.id.replace('tooLong', '')+']';
		$('[id^=long-hidden]'+currentID).fadeOut("fast");
		$('[id^=long-show]'+currentID).fadeIn("fast");
	  });
	  
	  $('#relatedNews').mouseleave(function(){
		  $('#relatedNews').fadeOut();
	  });
	});
</script>
		
<div id="mainbody">
	<aside id="inner-right">
		<?php include_once("includes/modules/last_news.inc.php"); ?>
	</aside>
	
	<section id="inner-center" class="expand-left <?php echo $_GET['cat']?>">
		<?php show_rel_news();?>
		<?php include("includes/articleFirstMeta.inc.php"); ?>
		<?php if(Session::verifyUser()) echo '<button type="button" onclick="show_comment_form()" id="commentButton">Añadir un Comentario</button>'; ?>
		
		<section class="comments" id="comments">
		<?php
			$comments = DataBase::realizar("SELECT * FROM " . DB_COMMENTS_TB . " WHERE NewsID=" . $_GET['id'] . " ORDER BY Date DESC LIMIT " . $comments_per_page);
			for($k=0; $k<count($comments); $k++){ ?>
				<article>
					<header>
						<img src="images/default_avatar.png"/>
						<span class="author"><?php echo $comments[$k]['UserName']; ?> - </span>
						<span class="date"><?php echo $comments[$k]['Date']; ?></span>
					</header>
					<p><?php echo $comments[$k]['Content']; ?></p>
				</article>
		<?php } ?>
		</section>
		<?php if(Session::verifyUser()){ ?>
		<section class="comments" id="commentsFormSection" style="display:none;">
			<form action="#comments" method="post" id="commentsForm">
				<label for="content">Comentario:</label>
				<textarea required name="content" rows="20" cols="99" maxlength='500' id="content"></textarea>
				<button type="button" value = "cancel" onclick="submit_comment_form()" formnovalidate>Cancelar</button>
				<button type="submit" onclick="javascript:return submit_comment_form('commentsForm')" id="commentButton" name="comment">Comentar</button>
			</form>
		</section>
		<?php } ?>
	</section>
</div>

