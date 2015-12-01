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
?>

  <form action="requests.php" method="post">
    <table>

<?php
$usersQuery = "SELECT * FROM users WHERE approved = 'n'";
$newUsers = $conn->query($usersQuery);

if ($newUsers->num_rows > 0) {
    while ($row = $newUsers->fetch_assoc()) {
        echo '
        <tr>
          <th><input type="checkbox" value="'. $row['id']. '" name="toApprove[]" /></th>
          <td>'.$row['first_name'].'</td>
          <td>'.$row['last_name'].'</td>
          <td>'.$row['gender'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$row['username'].'</td>
        </tr>
        ';
    }

    if (isset($_POST['submit'])) {
        // Delete rows
        foreach ($_POST['toApprove'] as $approve_id) {
            $approve = "UPDATE users SET approved ='y' WHERE id = '".$approve_id."'";
            $conn->query($approve) or die('Could not query database');
        }
        $conn->close;
        header('Location: requests.php');
    }

} else {
    echo 'No requests to approve';
}
?>

      <tr>
        <td><input type="submit" name="submit" value="Approve" /></td>
      </tr>
    </table>
  </form>
</body>
</html>
