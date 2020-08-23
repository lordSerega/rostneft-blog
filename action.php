<?php
include 'bd.php';





	if(isset($_GET['categories'])){
			
			$_SESSION['categories']=$_GET['categories'];
		}






	if(isset($_GET['details'])){
			$id=$_GET['details'];
			$query="SELECT
  articles.id ,
  articles.title,
  articles.text,
  categories.name,
  categories.id AS catid,
  articles.date,
    articles.img
FROM articles
  INNER JOIN categories
    ON articles.id_categories = categories.id

    WHERE articles.id=?";
		
			$stmt=$link->prepare($query);
			if( ! $stmt ){ //если ошибка - убиваем процесс и выводим сообщение об ошибке.
    die( "SQL Error: {$link->errno} - {$link->error}" );
}
			$stmt->bind_param("i",$id);
			$stmt->execute();
			$result=$stmt->get_result();
			$row=$result->fetch_assoc();

			$vid=$row['id'];
			$title=$row['title'];
			$text=$row['text'];
			$name=$row['name'];
			$date=$row['date'];
			$catid=$row['catid'];
			$show_img = base64_encode($row['img']);
		}


			if(isset($_POST['submit'])){

		$title=$_POST['title'];
		$text=$_POST['text'];
		$date=$_POST['date'];
		$categories=$_POST['categories'];
		$img_type = substr($_FILES['img_upload']['type'], 0, 5);
		$img_size = 100*1024*1024;
	if(!empty($_FILES['img_upload']['tmp_name']) and $img_type === 'image' and $_FILES['img_upload']['size'] <= $img_size){ 
	$img = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
	$sql ="INSERT INTO `articles` (`title`,`text`,`id_categories`,`date`,`img`) VALUES ('".$title."','".$text."','".$categories."','".$date."','".$img."')";
	}
	if ($link->query($sql) === TRUE) {
		echo "успех";
		} else {
		   echo "Ошибка: Неправильно заполнено одно из полей. Либо изображение больше 1мб"   ; 

		}
}


		if(isset($_POST['addCat'])){

	$name=$_POST['tagName'];
	$sql ="INSERT INTO `categories` (`name`) VALUES ('".$name."')";
	
	if ($link->query($sql) === TRUE) {

			header('location:admin.php');		
		} else {
		  echo "Ошибка: " . $sql . "<br>" . $link->error; 

		}
}


		if(isset($_POST['doComment'])){

	$user=$_POST['idUser'];
	$art=$_POST['idArt'];
	$date1=$_POST['date1'];
	$comment=$_POST['comment'];
	$sql ="INSERT INTO `comments` (`comment`,`id_article`,`date`,`user`) VALUES ('".$comment."','".$art."','".$date1."','".$user."')";
	
	if ($link->query($sql) === TRUE) {

			header("location:details.php?details=$art");		
		} else {
		  echo "Ошибка: " . $sql . "<br>" . $link->error; 

		}
}






		?>