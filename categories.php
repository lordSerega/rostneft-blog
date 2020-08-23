<?php
include 'action.php';

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

<div class="container">
  <div class="row">
    <div class="col-xl-12">

        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Главная</a></li>
    <li class="breadcrumb-item"><a href="news.php">Новости</a></li>
       <?php
        $categories = $_SESSION['categories'];
    $sql = mysqli_query($link, "SELECT name FROM categories WHERE id =$categories");
    while ($result = mysqli_fetch_array($sql)) { ?>
      


    <li class="breadcrumb-item active" aria-current="page"><?php echo $result['name']; ?></li>
      <?php } ?>
  </ol>
</nav>
  <hr>

      Тэги:
      <?php
    $sql = mysqli_query($link, 'SELECT * FROM categories');
    while ($result = mysqli_fetch_array($sql)) {

      ?>

      <a href="categories.php?categories=<?= $result['id'];?>" class="btn btn-primary"><?php echo $result['name']; ?></a>


  <?php } ?>

 <br>

 <br>


 





<ul class="list-unstyled">
   <?php
   $categories = $_SESSION['categories'];
    $sql = mysqli_query($link, "SELECT
  articles.id,
  articles.title,
  articles.text,
  categories.name,
  articles.date,
  articles.img,
  categories.id AS idTag
FROM articles
  INNER JOIN categories
    ON articles.id_categories = categories.id
WHERE categories.id = $categories");
    while ($result = mysqli_fetch_array($sql)) {
          $show_img = base64_encode($result['img']);
      ?>

  <li class="media">
    <img src="data:image/jpeg;base64, <?=$show_img ?>" style="width:20%" class="mr-5" alt="..">
   
    <div class="media-body">
      <h5 class="mt-0 mb-1"><?php echo $result['title']; ?></h5>
      <h5 class="mt-0 mb-1">Тэг: <?php echo $result['name']; ?></h5>
<?php echo mb_strimwidth($result['text'], 0, 600, '...'); ?>
      <br>
      <a href="details.php?details=<?= $result['id'];?>" class="btn btn-secondary btn-sm">Подробнее</a> 


   
    </div>


  </li>
     <hr>
  <br>

  <?php } ?>
</ul>
      
    </div>
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