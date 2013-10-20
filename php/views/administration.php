<script type="text/javascript">
	function confirmSubmit() {
	  if (confirm("¿Estás seguro de querer eliminar esta noticia?")) return true;
	  return false;
	}
</script>

<?php
	require_once("includes/class/bdaccess.class.php");
	include_once("includes/class/sessions.class.php");
	
	function show_table(){		
		$lastnews = DataBase::realizar("SELECT * FROM " . DB_LASTNEWS_TB . " ORDER BY Date DESC");
		
		echo '<form action="" method="post" id="lastnewsmanagement">';
		echo '<table id="inner-full" class="zebra">';
		echo '<th>Título</th><th>Autor</th><th>Categoría</th><th>Fecha - Hora</th><th>Acciones</th>';
		$c=0;
		foreach($lastnews as $news){
			array_map("htmlentities",$news);
			$c=($c+1)%2;
			echo '<tr class="zebra' . $c . '">';		
				echo '<td><strong>' . substr($news['Title'], 0, 50); if(strlen($news['Title']) > 50) echo '...'; echo '</strong></td>';
				echo '<td>' . $news['Author'] . '</td>';
				echo '<td><strong>' . $news['Category'] . '</strong></td>';
				echo '<td name="Date">' . str_replace(" ", "<strong> - </strong>", $news['Date']) . '</td>';
				echo '<td><button type="submit" onclick="javascript:return confirmSubmit()" value = "del.' . $news['ID'] . '" name = "action">Eliminar</button>';
				echo '<button type="submit" value = "edit.' . $news['ID'] . '" name = "action">Editar</button></td>';
			echo '</tr>';
		}
		echo '<tr class="zebra' . ($c+1)%2 .'"><td><button type="submit" value = "add" name = "action">Añadir</button></td><td></td><td></td><td></td><td></td></tr>';
		echo '</table>';
		echo '</form>';
	}
		
	if(Session::isAdmin()){
		
		if(isset($_POST['action'])){
			$action=explode(".", $_POST['action']);
			array_map("htmlentities",$_POST);
			switch($action[0]){
				case "edit":
					$selnew = DataBase::realizar("SELECT * FROM " . DB_LASTNEWS_TB . " WHERE ID='" . $action[1] ."'");
				case "add":
					$categories=DataBase::realizar("SHOW COLUMNS FROM " . DB_LASTNEWS_TB . " LIKE 'Category'");
					$categories = explode(",", preg_replace('/^enum|\(|\)|\'/', "", $categories[0]['Type']));
					echo '<form action="" method="post"><table id="inner-full">';
						echo '<tr>';
							echo '<td><label for="title">Título:</label></td>';
							echo '<td><input required autofocus type="text" value="' . $selnew[0]['Title'] . '" name="title" id="title" size="100"></td>';
						echo '</tr><tr>';
							echo '<td><label for="author">Autor:</label></td>';
							echo '<td><input required type="text" value="'; if($action[0] == "add") echo Session::getUser(); else echo $selnew[0]['Author']; echo '" name="author" id="author" size="100"></td>';
						echo '</tr><tr>';
							echo '<td><label for="category">Categoría:</label></td>';
							echo '<td><select required name="category" id="category">';
							foreach($categories as $category){
								echo '<option value="' . $category . '" '; if($category == $selnew[0]['Category']) echo 'selected'; echo '>' . $category . '</option>';
							}
							echo '</select></td>';
						echo '</tr><tr>';
							echo '<td><label for="date">Fecha:</label></td>';
							echo '<td><input required type="datetime-local" value="'; if($action[0] == "add") echo date('Y-m-d') . 'T' . date('G:i'); else echo str_replace(" ", "T", $selnew[0]['Date']); echo '" id="date" name="date"></td>';
						echo '</tr><tr>';
							echo '<td><label for="content">Contenido:</label></td>';
							echo '<td><textarea required name="content" rows="20" cols="99" id="content">' . $selnew[0]['Content'] . '</textarea></td>';
						echo '</tr><tr><td></td><td style="text-align:right;">' .
								'<button type="submit" value = "cancel" formnovalidate name = "action">Cancelar</button>' .
								'<button type="submit" value = "save.' . $selnew[0]['ID'] . '" name = "action">Guardar</button></td></tr>';
					echo "</table></form>";
					break;
				case "del":
					$consultaSQL="DELETE FROM `" . DB_LASTNEWS_TB . "` WHERE ID='" . $action[1] . "'";
					DataBase::realizar($consultaSQL);
					show_table();
					break;
				case "save":
					if(!empty($action[1]))
						$consultaSQL="UPDATE `" . DB_LASTNEWS_TB . "` SET `Title`='" . $_POST['title'] . "',`Author`='" . $_POST['author'] .
																			"',`Date`='" .$_POST['date']. "',`Content`='" .$_POST['content'] .
																			"',`Category`='" .$_POST['category']. "' WHERE ID='" . $action[1] . "'";
					else
						$consultaSQL="INSERT INTO `" . DB_LASTNEWS_TB . "`(`Title`, `Author`, `Date`, `Content`, `Category`)
													VALUES ('" . $_POST['title'] . "','" . $_POST['author'] . "','" .
													$_POST['date'] . "','" . $_POST['content'] . "','" . $_POST['category'] . "')";
					
					DataBase::realizar($consultaSQL);
				case "cancel":
					show_table();
					break;
			}
		}
		
		else show_table();
		
		
	}else echo "Área restringida";

?>
