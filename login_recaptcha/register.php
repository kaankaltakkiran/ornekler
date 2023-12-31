<?php
$activePage="register";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
  <?php
    require_once('navbar.php');
    ?>
    <div class="container">
  <div class="row justify-content-center mt-3">
  <div class="col-6">
   <!-- Üye olduktan sonra login sayfasına yönlendirme -->
  <?php 
if (isset($_POST['form_email'])) {
  header("location: login.php");
}
?>
<form method="POST">
<h1 class="text-center text-danger">Register</h1>
<div class="form-floating mb-3">
  <input type="text" name="form_name" class="form-control">
  <label>Name</label>
</div>
  <div class="form-floating mb-3">
  <input type="email" name="form_email" class="form-control">
  <label>Email</label>
</div>
<!-- <div class="form-floating mb-3">
  <input type="password" name="form_password"class="form-control">
  <label>Password</label>
</div> -->
<div class="input-group mb-3  input-group-lg">
  <input type="password"  name="form_password" class="form-control" id="password" placeholder="Password">
  <span class="input-group-text bg-transparent"><i id="togglePassword" class="bi bi-eye-slash"></i></span>
</div>

                  <button type="submit" name="submit" class="btn btn-primary">Register</button>   	
     </form>
     </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="hideShow.js"></script>
  </body>
</html>
<?php
//post işlemi gerçkeleşmişse  
if(isset($_POST['form_email'])){
  //!veritabanı bağlantısı
  require_once('db.php');
 //!post edilen verileri değişkenlere atama
  $name = $_POST['form_name'];
  $email = $_POST['form_email'];
  $password = $_POST['form_password'];
 //!paswword hashleme
  $password = password_hash($password, PASSWORD_DEFAULT);   
  //! veritabanına kayıt işlemi
  $sql = "INSERT INTO users (username,useremail,userpassword) VALUES (:form_name,:form_email,'$password')";

  $SORGU = $DB->prepare($sql);
  
  $SORGU->bindParam(':form_name',  $name);
  $SORGU->bindParam(':form_email',  $email);

  $SORGU->execute();

}