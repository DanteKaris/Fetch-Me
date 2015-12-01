<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Fetch Me! || Login</title>
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/forms.css" />
  <link type="image/icon" rel="icon" href="../img/favicon.png" height="32px" width="32px" />
</head>
<body style="background: whitesmoke;">
  <div class="row">
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
      <div class="col-12">
        <fieldset>
          <legend>Login</legend>
            <table>
              <tr>
                <th><label for="username"><i class="material-icons">verified_user</i></label></th>
                <td>
                  <input type="text" name="username" required placeholder="Username" value="<?php echo $username;?>" autofocus />
                </td>
              </tr>
              <tr>
                <th><label for="Password"><i class="material-icons">lock</i></label></th>
                <td><input type="password" name="password" placeholder="Password" required /></td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name="submit" value="Login" />
                </td>
              </tr>
              <tr>
                <?php echo $error; ?>
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
$error = ''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
    require '../php/db/connect.inc.php';

    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = '<i class="material-icons">error</i>Fill in all fields';

    } else {
        // Define $username and $password
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
        $mdPass = md5($password);

        // SQL query to fetch information of registerd users and finds user match.
        $query = "SELECT * FROM users WHERE password='". $mdPass. "' AND username='". $username. "'";
        $users = $conn->query($query);
        $rows = $users->num_rows;
        $row = $users->fetch_assoc();

        if ($row['approved'] == 'y') {
            if ($rows == 1) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user'] = $username;
                $_SESSION['admin'] = $row['admin']; // Initializing Session

                if ($row['admin'] == 'n') {
                    header('location: ../pages/dashboard.php'); // Redirecting To Other Page

                } elseif ($row['admin'] == 'y') {
                    header('location: ../pages/dashboard_ad.php'); // Redirecting To Other Page
                }

            } else {
                $error = '<i class="material-icons">error</i>Username or Password is invalid';
            }

        } else {
            echo 'You have not yet been approved by admin';
        }
    }
    $conn->close();
}
?>
