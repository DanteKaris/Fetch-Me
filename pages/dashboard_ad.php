<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/forms.css" />
  <link type="image/icon" rel="icon" href="../img/favicon_32.png" />
  <link type="image/icon" rel="icon" href="../img/favicon_16.png" />
</head>
<body>

<?php
include '../php/header_ad.inc.php';
?>

  <section id="page">
       <div class="row">
           <div class="col-3 col-m-12">
             <!-- Form for creating a new post -->
             <form enctype="multipart/form-data" id="createPost" name="createPost" action="../php/addPost.php" method="POST">
               <table>
                 <tr>
                   <td>
                     <h2><i class="material-icons">create</i> Create a Fetch</h2>
                     <hr />
                   </td>
                 </tr>
                 <tr>
                   <th>
                     <input type="text" id="postTitle" name="postTitle" placeholder="Name your Fetch" required length="50" />
                   </th>
                 </tr>
                 <tr>
                   <td>
                     <textarea name="newPost" id="newPost" cols="30" rows="10" placeholder="New Fetch?" length="1500" required ></textarea>
                   </td>
                 </tr>
                 <!--<tr>
                   <th><label>Or upload a photo</label></th>
                 </tr>
                 <tr>
                   <td><input type="file" name="image" ></td>
                 </tr>-->
                 <tr>
                   <td>
                     <select name="subCategory" id="subCategory">
                       <option value="Math" selected>Math</option>
                       <option value="Science">Science</option>
                       <option value="Football">Football</option>
                       <option value="Basketball">Basketball</option>
                       <option value="Movies">Movies</option>
                       <option value="Series">Series</option>
                       <option value="Anime">Anime</option>
                       <option value="Music">Music</option>
                     </select>
                   </td>
                 </tr>
                 <tr>
                   <td><input type="submit" name="post" id="post" value="Create" /></td>
                 </tr>
               </table>
             </form>
           </div>
           <div class="col-9 col-m-12" id="feed"></div>
       </div>
   </section>

    <div id="del"></div>
  <script src="../js/jquery.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/ajax.js"></script>
</body>
</html>
