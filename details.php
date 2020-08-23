<?php
include 'action.php';


    if(isset($_POST['dell'])) {
        $nomer= $_POST['nomer'];

        $sql = "DELETE from articles WHERE id=? ";


        $stmt=$link->prepare($sql);
        $stmt->bind_param("s",$nomer);
        $stmt->execute();
        $result=$stmt->get_result();
        header("location:news.php");
        

        }

?>


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Информационный портал АО "Ростовнефтепродукт"</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>


	 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Информационный портал АО "Ростовнефтепродукт"</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Главная</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">О нас</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="news.php">Новости</a>
      </li>
      <?php   if (!isset($_SESSION['username'])|| $_SESSION['role']=="user" OR  $_SESSION['role']=="")  { ?>
     
        <?php } else if ($_SESSION['role']=="admin"){  ?>
           <li class="nav-item ">
        <a class="nav-link" href="admin.php">Админ панель</a>
            <?php } ?>
      </li>
    </ul>
        
  </div>
    <?php  if (!isset($_SESSION['username'])){ ?>

        <a href="login.php" class="btn btn-success" role="button">Авторизация</a>
             <?php } ?>

  <?php  if (isset($_SESSION['username'])){ ?>
  <a class="navbar-brand" href="timetable.php">Вы вошли как:
            <?= $_SESSION['username']?></a>
        <a href="logout.php" class="btn btn-danger" role="button">Выйти</a>
             <?php } ?>
</nav>

<br>
<div class="container">
  <div class="row">
    <div class="col-xl-12">
              <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Главная</a></li>
    <li class="breadcrumb-item"><a href="news.php">Новости</a></li>
    <li class="breadcrumb-item"><a href="categories.php?categories=<?=$catid;?>"><?=$name;?></a></li>
       

    <li class="breadcrumb-item active" aria-current="page"><?=$title;?></li>
  
  </ol>
</nav>
  <hr>
    </div>
  </div>
</div>
<div class="container">

  <div class="row">
    <div class="col-xl-4">
      <img src="data:image/jpeg;base64, <?=$show_img ?>" class="img-fluid" alt="">
    </div>
    <div class="col-xl-8">
    

  
  <h1><?=$title;?></h1>

  <hr>
    <h5>Категория: <?=$name;?></h5>
  <p class="lead"><?=$text;?></p>

    <p class="text-right"><?=$date;?></p>
     <?php  if (isset($_SESSION['username']) and ($_SESSION['username']=="admin")){ ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
          <input type="hidden" name="nomer" value="<?=$vid;?>">
            <div class="form-group row">
    <div class="col-xl-12">
      <button type="submit" name="dell" class="btn btn-danger btn-lg btn-block">Удалить новость</button>

    </div>
  </div>
        </form>
  <?php }?>
      
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xl-12 p-0">
      <h5>Комментарии:</h5>
      <br>
 <?php  if (isset($_SESSION['username'])){ ?>
    <form action="action.php" method="post">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Ваш комментарий</label>
    <div class="col-sm-10">

            <input type="hidden" name="idUser" value="<?= $_SESSION['userID']?>">
            <input type="hidden" name="idArt" value="<?=$vid;?>">
            <input type="hidden" name="date1" value="<?= date("Y/m/d");?>">

            
     <textarea name="comment" class="form-control"id="" cols="2" rows="2"></textarea>
     <button type="submit" name="doComment" class="btn btn-primary btn-lg ">Отправить</button>
    </div>
  </div>
    

</form>

 <?php }?>

    </div>

    <?php $sql = mysqli_query($link, "SELECT
  comments.id,
  comments.comment,
  comments.id_article,
  comments.date,
  users.login
FROM comments
  INNER JOIN users
    ON comments.user = users.idUser
WHERE comments.id_article = $vid");
    while ($result = mysqli_fetch_array($sql)) {

      ?>


    <div class="row">
      <div class="col-2">
        <img src="img/1.jpg"  class="img-fluid rounded-circle"alt="">
        <p class="text-center"><?php echo $result['login']; ?></p>
      </div>
        <div class="col-10">
        <p class=""><?php echo $result['comment']; ?></p>
              <p class="text-right">Дата: <?php echo $result['date']; ?></p>
           <hr>
   
      </div>
    </div>

  <?php } ?>

      



    
  </div>
</div>
  
  

</div>

		</div>
	</div>
</div>






	


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>	
</body>
</html>