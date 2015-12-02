<?php
session_start();
?>
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
<body>
<?php
if ($_SESSION['admin'] == 'n') {
    include '../php/header.inc.php';

} elseif ($_SESSION['admin'] == 'y') {
    include '../php/header_ad.inc.php';
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    require '../php/db/connect.inc.php';

    $query = "SELECT * FROM users WHERE username = '".$user."'";
    $userDetails = $conn->query($query);
    $user = $userDetails->fetch_assoc();

    $firstname = $user['first_name'];
    $lastname = $user['last_name'];
    $gender = $user['gender'];
    $email = $user['email'];
    $username = $user['username'];
    $password = $user['password'];
}
?>

  <form action="<?php $_SERVER["PHP_SELF"]; ?>" id="edit" method="post">
    <fieldset>
      <legend>Register</legend>
      <table>
        <tr>
          <th><label for="firstname"><i class="material-icons">face</i></label></th>
          <td>
            <input type="text" name="firstname" required placeholder="<?php echo $firstname;?>" disabled />
            <input type="text" name="lastname" placeholder="<?php echo $lastname; ?>" disabled />
          </td>
        </tr>
        <tr>
          <th><label for="gender"><i class="material-icons">compare_arrows</i></label></th>
          <td>
            <input type="text" name="gender" placeholder="<?php echo $gender; ?>" disabled />
          </td>
        </tr>
        <tr>
          <th><label for="email"><i class="material-icons">email</i></label></th>
          <td>
            <input type="email" name="email" required placeholder="<?php echo $email; ?>" disabled />
          </td>
        </tr>
        <tr>
          <th><label for="username"><i class="material-icons">perm_identity</i></label></th>
          <td>
            <input type="text" name="username" placeholder="<?php echo $username; ?>" required disabled />
          </td>
        </tr>
        <tr>
          <th><label for="password"><i class="material-icons">lock</i></label></th>
          <td><input type="password" name="password" value="<?php echo $password; ?>" required disabled /></td>
        </tr>
      </table>
    </fieldset>
  </form>
</body>
</html>
