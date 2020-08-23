<?php
  
    include 'bd.php';
    

if(isset($_POST['do_signup'])) {
    $login= $_POST['login'];
    $password= $_POST['password'];
    $password2= $_POST['password_2'];
    $email= $_POST['email'];
    $user_type = "user";

    if ($password == $password2){


        $sql = "INSERT INTO `users` (`login`, `password`, `userType`, `email`)
		VALUES ('".$login."','".$password."','".$user_type."','".$email."')";

		if ($link->query($sql) === TRUE) {
		   header('location:login.php');
		   $_SESSION['response']="Вы успешно зарегистрированы";
		   $_SESSION['res_type']="success";
		} else {
		   echo "Ошибка: " . $sql . "<br>" . $link->error; 

		}
  
    } else {

        $_SESSION['response']="Пароли не совпадают";
        $_SESSION['res_type']="danger";
    }

}



  

?>



<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Информационный портал АО "Ростовнефтепродукт"</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-xl-12 pt-5">
				<h2 class="text-center">Регистрация на информационном портале АО "Ростовнефтепродукт"</h2>
				  <?php if(isset($_SESSION['response'])) { ?>
                <div class="alert alert-<?=$_SESSION['res_type']; ?> alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?= $_SESSION['response']; ?>
                </div>
                <b>
                    <?php } unset($_SESSION['response']); ?></b>
			</div>
		</div>
		<div class="row pt-5">
			<div class="col-xl-2">
				
			</div>
			<div class="col-xl-8">
				<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Логин</label>
    <div class="col-sm-10">
      <input type="text"  name="login" class="form-control" id="inputEmail3">
    </div>
  </div>
    <div class="form-group row">
    <label for="inputEmail3"  class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail3">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3"  class="col-sm-2 col-form-label">Пароль</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3">
    </div>
  </div>
    <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Подтвердите пароль</label>
    <div class="col-sm-10">
      <input type="password" name="password_2" class="form-control" id="inputPassword3">
    </div>
  </div>


  <div class="form-group row">
    <div class="col-xl-12">
      <button type="submit" name="do_signup" class="btn btn-primary btn-lg btn-block">Зарегистрироваться</button>

    </div>
  </div>
</form>

		</div>
	</div>

	
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>