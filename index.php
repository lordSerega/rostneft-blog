<?php

include_once 'bd.php';

?>


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Информационный портал АО "Ростовнефтепродукт"</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>


	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Информационный портал АО "Ростовнефтепродукт"</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">О нас</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="news.php">Новости</a>
      </li>
      <?php   if (!isset($_SESSION['username'])|| $_SESSION['role']=="user" OR  $_SESSION['role']=="")  { ?>
     
        <?php } else if ($_SESSION['role']=="admin"){  ?>
           <li class="nav-item">
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

<?php if(isset($_SESSION['response'])) { ?>
                <div class="alert alert-<?=$_SESSION['res_type']; ?> alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?= $_SESSION['response']; ?>
                </div>
                <b>
                    <?php } unset($_SESSION['response']); ?></b>
      </div>

      <br>

<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="jumbotron">
  <h1 class="display-4">Добро пожаловать на информационный портал!</h1>
  <p class="lead">Это большой интернет ресурс, предоставляющий подробную информацию о новостях компании.</p>
  <hr class="my-4">
  <p>Для комментирования статей необходима регистрация пользователя.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="login.php" role="button">Узнать подробнее</a>
  </p>
</div>

		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<h1>Актуальные новости</h1>
			<div class="card-deck">


	<?php
  $sql = mysqli_query($link, 'SELECT * FROM articles ORDER BY id DESC LIMIT 0, 3;');
  while ($result = mysqli_fetch_array($sql)) {
     $show_img = base64_encode($result['img']);


  	?>

  	<div class="card">
      <img src="data:image/jpeg;base64, <?=$show_img ?>" " class="card-img-top" alt="..">
   

    <div class="card-body">
      <h5 class="card-title"><?php echo $result['title']; ?></h5>
      <p class="card-text"><?php echo mb_strimwidth($result['text'], 0, 100, '...'); ?></p>
    </div>
    <div class="card-footer">
    	 <a href="details.php?details=<?= $result['id'];?>" class="btn btn-secondary btn-sm">Подробнее</a> 
      <small class="text-muted"><?php echo $result['date']; ?></small>
    </div>
  </div>

  
  <?php } ?>



  

</div>

		</div>
	</div>
</div>






	


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>	
</body>
</html>