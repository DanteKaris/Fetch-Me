<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Fetch Me! || Login</title>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/forms.css" />
  <link type="image/icon" rel="icon" href="../img/favicon.png" height="32px" width="32px" />
</head>
<style>
  input[type=submit] {
    background: #428BCA;
    font-family: Sans-serif;
    text-align: center;
    transition: all 0.3s ease 0s;
  }

  input[type=submit]:hover {
    background: #3071A9;
  }
</style>
<body>
  <div class="row">
    <header id="index" style="background: none;">
      <div class="col-4"></div>
      <div class="col-4">
        <img src="img/main_logo.png" alt="Logo" />
      </div>
      <div class="col-4"></div>
    </header>
  </div>

  <div class="row">
    <div class="col-12">
      <img src="img/hero.jpg" id="bgvid" />
    </div>
  </div>

  <div class="row">
    <div class="col-6 box-login">
      <form action="forms/login.php" method="post">
        <fieldset>
          <legend>Login</legend>
            <table>
              <tr>
                <th><label for="username"><i class="material-icons">verified_user</i></label></th>
                <td>
                  <input type="text" name="username" required placeholder="Username" value="<?php echo $username;?>" />
                </td>
              </tr>
              <tr>
                <th><label for="Password"><i class="material-icons">lock</i></label></th>
                <td><input type="password" name="password" placeholder="Password" required /></td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name="submit" value="Login" style="background: rgba(255, 0, 0, .7);"/>
                </td>
              </tr>
              <tr>
                <?php echo $error; ?>
              </tr>
            </table>
        </fieldset>
      </form>
    </div>
    <div class="col-6 box-signup">
      <form action="forms/signup.php" method="post">
        <fieldset>
        <legend>Register</legend>
        <table>
          <tr>
            <th><label for="firstname"><i class="material-icons">face</i></label></th>
            <td>
              <input type="text" name="firstname" required placeholder="First name" value="<?php echo $firstname;?>"/>
              <input type="text" name="lastname" placeholder="Last name" value="<?php echo $lastname; ?>" />
            </td>
          </tr>
          <tr>
            <th><label for="gender"><i class="material-icons">compare_arrows</i></label></th>
            <td>
              <input type="radio" name="gender" value="male" required checked />
              <label>Male</label>
              <input type="radio" name="gender" value="female" />
              <label>Female</label>
            </td>
          </tr>
          <tr>
            <th><label for="email"><i class="material-icons">email</i></label></th>
            <td>
              <input type="email" name="email" required placeholder="Email address" value="<?php echo $email; ?>" />
            </td>
          </tr>
          <tr>
            <th><label for="username"><i class="material-icons">perm_identity</i></label></th>
            <td>
            <input type="text" name="username" placeholder="Enter username" required value="<?php echo $username;?>" />
            </td>
          </tr>
          <tr>
            <th><label for="password"><i class="material-icons">lock</i></label></th>
            <td><input type="password" name="password" placeholder="Password" required /></td>
          </tr>
          <tr>
            <th><label for="confirmPass"><i class="material-icons">security</i></label></th>
            <td><input type="password" name="confirmPass" placeholder="Confirm Password" required /></td>
          </tr>
          <tr>
            <td><input type="submit" name="submit" value="Sign Up" /></td>
          </tr>
        </table>
        </fieldset>
      </form>
    </div>
  </div>
</body>
</html>


<?php
?>
