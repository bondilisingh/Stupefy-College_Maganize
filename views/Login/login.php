<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stupefy|College Magazine|Login In</title>

    <link href="../../styles/bootstrap.min.css" rel="stylesheet">

    <link href="../../styles/signin.css" rel="stylesheet">

    
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" method ="POST" action ="verify.php">
        <h2 class="form-signin-heading">Log In</h2>
        <input type="text" class="form-control" placeholder="Registration No" name ="reg_no" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name ="password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
      </form>

    </div> 
  </body>
</html>
