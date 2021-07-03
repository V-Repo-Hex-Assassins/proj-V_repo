<?php
session_start();

require_once "pdo.php";

if(isset($_POST['login'])){
if(isset($_POST['password']) && isset($_POST['email'])){
	$stmt = $pdo->query("SELECT * FROM vdummy");
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($rows as $row) {
	 if(($_POST['email']==$row['email_id']) && ($_POST['password']==$row['password'])){
     if($row['role_id']==1){
		 $_SESSION['username']=$row['name'];
		 $_SESSION['userid']=$row['user_id'];
		 header('Location: admindashboard.php');
		 return;
   }
   else if($row['year_study']==4){
     $_SESSION['username']=$row['name'];
		 $_SESSION['userid']=$row['user_id'];
		 header('Location: studentdashboard.php');
		 return;
   }
	 else if($row['role_id']==3){
		 $_SESSION['username']=$row['name'];
		 $_SESSION['userid']=$row['user_id'];
		header('Location: teacherdashboard.php');
		return;
	 }
	 else{
		 $_SESSION['username']=$row['name'];
		 $_SESSION['userid']=$row['user_id'];
	 header('Location: repositorydashboard.php');
	 return;
	 }
	 }
	}
	$_SESSION['error1']="Access Denied";
	header('Location: login.php');
	return;
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" >

<link rel="stylesheet" type="text/css" href="style.css">

    <title>Login-form</title>
  </head>
  <body>
    <h6 align="center" style="color:red; background:white;">
        <?php
          if(isset($_SESSION['error1'])){
            echo $_SESSION['error1'];
            unset($_SESSION['error1']);
          }

          ?>
        </h6>
   <div class="row w-100 d-flex justify-content-center align-items-center main_div">

     <div class="col-12 col-lg-4 col-md-8 col-xxl-5">
     <div class="card py-2 px-2">

<div class="division">
<div class="row">
<div class="col-6 mx-auto mb-4">
<span class="main-heading">LOGIN FORM</span>
</div>
</div>
<form class="myform" method="post">
<div class="mb-3">

    <input type="username" class="form-control" id="username" name="email" aria-describedby="username" placeholder="vit email_id">

  </div>
  <div class="mb-3">

    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>

<div class="my-3">

		<input type="submit" name="login" value="Login" class="btn btn-primary login_btn btn-block cth-lg">
  </div>
<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#"> &nbsp;&nbsp;Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
</form>

</div>
</div>
</div>
</div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
