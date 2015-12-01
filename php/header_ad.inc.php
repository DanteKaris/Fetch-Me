<?php
require 'db/connect.inc.php';
$usersQuery = "SELECT * FROM users WHERE approved = 'n'";
$newUsers = $conn->query($usersQuery);
$requests = $newUsers->num_rows;
?>
<header>
    <div class="row">
      <div class="row col-9 col-m-12">
        <div class="col-4">
          <a href="../pages/dashboard_ad.php#" class="logo"><img src="../img/main_logo.png" alt="Fetch Me!"></a>
        </div>
        <div class="col-8">
          <nav>
            <ul>
              <li class="dropdown"><a href="#">Categories <i class="material-icons md-dark">arrow_drop_down</i></a>
                <ul class="dropdown-nav">
                  <li class="flyout"><a href="education.php"><i class="material-icons">book</i> Education</a>
                    <ul class="flyout-nav">
                      <li><a href="#">Math</a></li>
                      <li><a href="#">Science</a></li>
                    </ul>
                  </li>
                  <li class="flyout"><a href="sports.php"><i class="material-icons">golf_course</i> Sports</a>
                    <ul class="flyout-nav">
                      <li><a href="#">Football</a></li>
                      <li><a href="#">Basketball</a></li>
                    </ul>
                  </li>
                  <li class="flyout"><a href="entertainment.php"><i class="material-icons">tv</i> Entertainment</a>
                    <ul class="flyout-nav">
                      <li><a href="#">Movies</a></li>
                      <li><a href="#">Series</a></li>
                      <li><a href="#">Music</a></li>
                      <li><a href="#">Anime</a></li>
                    </ul>
                  </li>
                  <li class="flyout"><a href="travel.php"><i class="material-icons">flight_takeoff</i> Travel</a>
                    <ul class="flyout-nav">
                      <li><a href="#">Dorms</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="profile.php"><i class="material-icons md-dark">fingerprint</i> <?php echo $_SESSION['user']; ?></a></li>
              <li><a href="requests.php" class="badge" data-badge="<?php echo $requests; ?>"><i class="material-icons md-dark">update</i> Requests</a></li>
              <li id="show"><a href="../php/logout.php">Logout <i class="material-icons md-dark">exit_to_app</i></a></li>
            </ul>
          </nav>
        </div>
      </div>

      <div class="col-3 col-m-12">
        <form id="searchbar" name="searchbar">
          <input id="searchField" type="search" name="search" placeholder="Search Posts" />
          <input type="submit" value="Search" />
        </form>
        <div id="results" style="color: white;"></div>
      </div>
    </div>
  </header>
