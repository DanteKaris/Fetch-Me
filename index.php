<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Fetch Me!</title>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/forms.css" />
</head>
<body>
  <div class="row">
    <div class="col-6">
<?php
if (isset($_SESSION['user'])) {
    include 'forms/signup.php';
} else {
?>
    </div>
    <div class="col-6">
<?php
    include 'forms/login.php';
}
?>
    </div>
  </div>
</body>
</html>


<?php
?>
