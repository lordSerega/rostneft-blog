<?php

    include 'bd.php';




    $msg="";

    if(isset($_POST['logi1n'])) {
        $username= $_POST['login'];
        $password= $_POST['password'];
        $userType= $_POST['gridRadios'];

        $sql = "SELECT * from users WHERE login=? AND password=? AND userType=?";

        $stmt=$link->prepare($sql);
        $stmt->bind_param("sss",$username,$password,$userType);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

       
 
        if ($result->num_rows==1 && $userType =="user"){
        	 session_regenerate_id();
        $_SESSION['username']=$row['login'];
        $_SESSION['role']=$row['userType'];
          $_SESSION['userID']=$row['idUser'];
        $_SESSION['response']="Авторизация прошла успешно!";
            $_SESSION['res_type']="success";
        session_write_close();
            header("location:index.php");
        }

        else if ($result->num_rows==1 && $userType =="admin"){
        	 session_regenerate_id();
        $_SESSION['username']=$row['login'];
        $_SESSION['role']=$row['userType'];
        $_SESSION['userID']=$row['idUser'];
        $_SESSION['response']="Авторизация прошла успешно!";
            $_SESSION['res_type']="success";
        session_write_close();
            header("location:admin.php");
        }
        else {
        	 $_SESSION['res_type']="danger";
        	  $_SESSION['response']="Неверный логин или пароль";
         
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
				<h2 class="text-center">Авторизация в информационно портале АО "Ростовнефтепродукт"</h2>
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
      <input type="text" name="login" class="form-control" id="inputEmail3">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Пароль</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Права</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="user" checked>
          <label class="form-check-label" for="gridRadios1">
            Пользователь
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="admin">
          <label class="form-check-label" for="gridRadios2">
            Администратор
          </label>
        </div>
	
      </div>
    </div>
  </fieldset>

  <div class="form-group row">
    <div class="col-xl-12">
      <button type="submit" name="logi1n" class="btn btn-primary btn-lg btn-block">Войти</button>

    </div>
  </div>
</form>


  <div class="form-group row">
    <div class="col-xl-12">
      <a href="registration.php">Нет аккаунта? Зарегистрироваться прямо сейчас.</a>

    </div>
				
			</div>
		</div>
	</div>

	
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>