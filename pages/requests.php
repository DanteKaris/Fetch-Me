<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fetch Me! || Approve requests</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/forms.css" />
  <link type="image/icon" rel="icon" href="../img/favicon_32.png" />
  <link type="image/icon" rel="icon" href="../img/favicon_16.png" />
  <style>
    tr:nth-child(even) {
      background-color: whitesmoke;
      border-collapse: collapse;
    }
  </style>
</head>
<body>

<?php
require '../php/header_ad.inc.php';
require '../php/db/connect.inc.php';

$usersQuery = "SELECT * FROM users WHERE approved = 'n'";
$newUsers = $conn->query($usersQuery);

if ($newUsers->num_rows > 0) {
    echo '
    <table>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Username</th>
      </tr>';

    while ($user = $newUsers->fetch_assoc()) {
        $f_name = $user['first_name'];
        $l_name = $user['last_name'];
        $gender = $user['gender'];
        $email = $user['email'];
        $username = $user['username'];

        echo '
        <tr>
          <td>'.$f_name.'</td>
          <td>'.$l_name.'</td>
          <td>'.$gender.'</td>
          <td>'.$email.'</td>
          <td>'.$username.'</td>
          <td><button class="approve" value="">Approve</button>
          <td><button class="deny" onclick="deny()">Deny</button>
          <td><button class="suspend" onclick="suspend()">Suspend</button>
        </tr>';
    }
}
?>
  <script src="../js/jquery.js"></script>
  <script>
    $(document).ready( function () {
        $(".approve").click( function () {
            window.alert('Approved');
        });

        $(".approve").click( function () {
            window.alert('Denied');
        });

        $(".approve").click( function () {
            window.alert('Suspended');
        });
    });
  </script>
</body>
</html>
