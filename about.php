

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
      <li class="nav-item active">
        <a class="nav-link" href="about.php">О нас</a>
      </li>
      <li class="nav-item ">
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
      <h2>О нас</h2>
      <hr>
      <h5>Общая информация:</h5>
      <p>На рынке нефтепродуктов Ростовской области ПАО «НК «Роснефть» представлена предприятием нефтепродуктообеспечения АО «РН-Ростовнефтепродукт». Общество образовано и работает на рынке с 1995 г.</p>
      <p>Общество осуществляет реализацию моторных топлив в розницу через собственную сеть АЗК и мелкооптовым потребителям с нефтебаз.</p>
      <p>В настоящее время нефтебазовое хозяйство Общества состоит из 5 нефтебаз:
</p>
<ul>
  <li><h5>Лиховская нефтебаза</h5>
    <p>Адрес: Ростовская обл., пос. Лиховской, ул. Советская,112</p></li>
    <p>График работы: Ежедневно  с 8.00 до 20.00</p></li>
  <li><h5>Миллеровская нефтебаза</h5>
  <p>Адрес: Ростовская обл., г. Миллерово, ул. Советская, д. 50</p></li>
    <p>График работы: Ежедневно  с 8.00 до 17.00</p></li></li>
  <li><h5>Ростовская нефтебаза</h5>
  <p>Адрес: г. Ростов-на-Дону, ул. Доватора, д. 158/8</p></li>
    <p>График работы: круглосуточно, без выходных</p></li></li>
  <li><h5>Цимлянская нефтебаза</h5>
  <p>Адрес: Ростовская обл., г. Цимлянск, ул. Привокзальная, д. 2</p></li>
    <p>График работы: Ежедневно с 8.00 до 20.00</p></li></li>
  <li><h5>Сальская нефтебаза</h5>
  <p>Адрес: Ростовская обл., г. Сальск, ул.Н.Островского, д. 1</p></li>
    <p>График работы: Ежедневно  с 8.00 до 20.00</p></li></li>
  <li><h5>Лиховская нефтебаза</h5>
  <p>Адрес: Ростовская обл., пос. Лиховской, ул. Советская,112</p></li>
    <p>График работы: Ежедневно с 8.00 до 20.00.</p></li></li>

</ul>
<hr>
<p class="lead text-center">СВЯЖИТЕСЬ С НАМИ!
Круглосуточная горячая линия (звонок по России бесплатный)
8 800 200 1070</p>
    </div>
  </div>
</div>

	
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>	
</body>
</html>