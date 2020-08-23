<?php
include 'bd.php';

    if (!isset($_SESSION['username'])|| $_SESSION['role']!="admin"){
        header("location:index.php");
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
      <li class="nav-item">
        <a class="nav-link" href="news.php">Новости</a>
      </li>
      <?php   if (!isset($_SESSION['username'])|| $_SESSION['role']=="user" OR  $_SESSION['role']=="")  { ?>
     
        <?php } else if ($_SESSION['role']=="admin"){  ?>
           <li class="nav-item active">
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
   		<h1>Добавление новой новости</h1>
  



<form action="action.php" method="post"  enctype="multipart/form-data">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label ">Фотография (до 1 мб)</label>
    <div class="col-sm-10">
      <input type="file" class="" name="img_upload">
    </div>
  </div>
    <div class="form-group row">
    <label for="inputEmail3"  class="col-sm-2 col-form-label">Заголовок новости</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3"  class="col-sm-2 col-form-label">Текст статьи</label>
    <div class="col-sm-10">
      <textarea name="text"   class="form-control" cols="50" rows="10"></textarea>
    </div>
  </div>
    <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Категория</label>
    <div class="col-sm-10">
        <select name="categories" class="form-control" id="">
          <?php
    $sql = mysqli_query($link, "SELECT * FROM categories");
    while ($result = mysqli_fetch_array($sql)) {
      ?>
          <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
          <?php } ?>
        </select>

    </div>
  </div>


      <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Дата публикации</label>
    <div class="col-sm-10">
     <input type="date" name="date" class="form-control" >
    </div>
  </div>
  <div class="form-group row">
    <div class="col-xl-12">
      

      <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Опубликовать новость</button>

    </div>
  </div>

      
    </div>
  </div>

<hr>

  <div class="row">
    <div class="col-xl-8">
      <h1>Добавление новой категории</h1>
  



<form action="action.php" method="post"  enctype="multipart/form-data">

    <div class="form-group row">
    <label for="inputEmail3"  class="col-sm-2 col-form-label">Название</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tagName">
    </div>
  </div>
  
   
     
  <div class="form-group row">
    <div class="col-xl-4">
      
  
      <button type="submit" name="addCat" class="btn btn-primary btn-lg btn-block">Добавить</button>

    </div>
  </div>

      
    </div>
  </form>
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