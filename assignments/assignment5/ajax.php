<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
      table {
          border-bottom: 3px solid black;
          border-collapse: collapse;
          border-top: 3px solid black;
          width: 100%;
      }
      th {
          border-bottom: 1px soilid black;
      }
      th, td {
          border-right: 1px solid black;
      }
  </style>
</head>
<body>

  <form name="search" id="search">
    <input type="button" name="fetch" id="fetch" value="Fetch" onmousedown="ajaxCall();" />
  </form>

  <div id="demo"></div>

  <?php
    ?>

    <script>
      // Creating AJAX variable
      function getHTTPObject() {
          var xhr;

          if (window.XMLHttpRequest) { // check for support
              // if it's supported, use it because it's better
              xhr = new XMLHttpRequest();

          } else if (window.ActiveXObject) { // check for the IE 6 Ajax
              // save it to the xhr variable
              xhr = new ActiveXObject("Msxml2.XMLHTTP");
          }
          // spit out the correct one so we can use it
          return xhr;
      }

      /* define the Ajax call */
      function ajaxCall() {
          // Declare variables
          var search_text = document.getElementById('search_text'),
              demo = document.getElementById('demo'),
              request = getHTTPObject();

          // Loading text
          demo.innerHTML = "Loading...";

          // Once data is received
          request.onreadystatechange = function() {
              // check to see if the Ajax call went through
              if (request.readyState === 4 && request.status === 200) {
                  demo.innerHTML = request.responseText;
              }
          } // end onreadystatechange

          request.open('GET', 'fetch.inc.php', true);
          request.send();
      }
      /* wrap everything in an anonymous function to contain the variables */
  </script>
</body>
</html>
