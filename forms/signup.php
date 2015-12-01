<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fetch Me! || Sign Up</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/forms.css" />
  <link type="image/icon" rel="icon" href="../img/favicon.png" height="32px" width="32px" />
</head>
<body style="background: whitesmoke;">
  <div class="row">
    <div class="col-12">
      <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
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
                <input type="text" name="username" placeholder="Enter username" required value="<?php echo $username; ?>" />
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
session_start();
require '../php/db/connect.inc.php';

if (isset($_POST['submit'])) {
    // User credientials
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $email = $conn->real_escape_string($_POST['email']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $conf_password = $conn->real_escape_string($_POST['confirmPass']);
    $mdPass = md5($password);
    $admin = 'n';
    $approved = 'n';

    if ($password == $conf_password) {
        // Check if email already exists
        $verifyEmail = "SELECT email FROM users where email='". $email. "'";
        $verifyUsername = "SELECT username FROM users where email='". $email. "'";
        $emails = $conn->query($verifyEmail);
        $usernames = $conn->query($verifyUsername);
        $numResultsEmail = mysqli_num_rows($emails);
        $numResultsUsernames = mysqli_num_rows($usernames);


        if ($numResultsEmail >= 1) {
            echo '<br /><hr />';
            echo $message = '<i class="material-icons">error</i>'. $email. ' Email already exist!!';

        } else {
            if ($numResultsUsernames >= 1) {
                echo '<br /><hr />';
                echo $message = '<i class="material-icons">error</i>'. $email. "Username already exist!!";

            } else {
                $addUser = "INSERT INTO `users` (first_name, last_name, gender, email, username, password, admin, approved) VALUES
                ('". $firstname. "', '". $lastname. "', '". $gender. "', '". $email. "',
                '". $username. "', '". $mdPass. "', '". $admin. "', '".$approved."')";

                // Add user to db
                $conn->query($addUser) or die('Could not add user');

                // Get new user details
                $allData = "SELECT * FROM users WHERE username = '". $username. "'";
                $newUser = $conn->query($allData);
                $data = $newUser->fetch_assoc();

                // Create session varibles
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['admin'] = $data['admin'];

                echo 'Waiting for admin to confirm request';
            }
        }
        $conn->close();

    } else {
        echo '<i class="material-icons">error</i> Passwords do not match';
    }
}
?>
