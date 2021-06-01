<?php
    require('config/config.php');
    require('config/db.php');
    session_start();

  
    if($_SERVER["REQUEST_METHOD"] == "POST") {
       
       $username = mysqli_real_escape_string($conn,$_POST['username']);
       $password = mysqli_real_escape_string($conn,$_POST['password']); 
       
       $sql = "SELECT uid FROM USERACCOUNT WHERE username = '$username' and password = '$password'";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
       
       if (isset($row)) {
       $active = $row['active'];
       $count = mysqli_num_rows($result);

       if($count == 1) {
        $_SESSION['login_user'] = $username;
        
        header("location: guestbook-list.php");
     }else {
        $error = "Account does not exist.";
     }
      } else {
        echo "<font color='red'>Account does not exist.</font>";
      }
    }


?>
<?php include('inc/header.php'); ?>
  <br/>
  <div style="width:30%; margin: auto; text-align: center;">
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-signin">
      <img class="mb-4" src="img/bootstrap.svg" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
      <br/><label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary btn-block">Sign in</button>

    </form>
  </div>
<?php include('inc/footer.php'); ?>