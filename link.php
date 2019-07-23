<nav class="navbar navbar-expand-lg navbar-light bg-light bordercolourgrey">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse nav-height" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto navbar-spacing">
      <?php
            // If user is logged in
            if ( isset($_SESSION["id"])) {
              switch($_SESSION["userrole"]) {
                case 'administrator':
                  echo '<li class="nav-item automargin">
                          <a class="nav-link nav-btn" href="./index.php?content=administrator_home">Admin<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item automargin">
                          <a class="nav-link nav-btn" href="./index.php?content=addproduct">ProAdd<span class="sr-only">(current)</span></a>
                        </li>';

                break;
                case 'root': 
                  echo '<li class="nav-item automargin">
                          <a class="nav-link nav-btn" href="./index.php?content=root_home">RootHome<span class="sr-only">(current)</span></a>
                        </li>';
                break;
                case 'customer':
                  echo '<li class="nav-item automargin">
                          <a class="nav-link nav-btn" href="./index.php?content=home">Home<span class="sr-only">(current)</span></a>
                        </li>';
                break;
                case 'moderator':
                  echo '<li class="nav-item automargin">
                          <a class="nav-link nav-btn" href="./index.php?content=moderator_home">ModeratorHome<span class="sr-only">(current)</span></a>
                        </li>';
                break;
                default:
                  header("Location: url=./index.php?content=logout");
                break;
              }
              // Nav Heren
              echo '
                <li class="nav-item automargin">
                  <span class="nav-link nav-btn">
                    Heren
                  </span>
                  <div class="dropdown-btn">
                    <a class="dropdown-item" href="index.php?content=herenkleding">Kleding</a>
                    <a class="dropdown-item" href="index.php?content=herenschoenen">Schoenen</a>
                    <a class="dropdown-item" href="index.php?content=herenaccessoires">Accessoires</a>
                  </div>
                </li>';
              // Nav Dames
              echo '
                <li class="nav-item automargin">
                  <span class="nav-link nav-btn">
                    Dames
                  </span>
                  <div class="dropdown-btn">
                    <a class="dropdown-item" href="index.php?content=dameskleding">Kleding</a>
                    <a class="dropdown-item" href="index.php?content=damesschoenen">Schoenen</a>
                    <a class="dropdown-item" href="index.php?content=damesaccessoires">Accessoires</a>
                  </div>
                </li>';
              
              echo '<li class="nav-item automargin">
                      <a class="nav-link nav-btn" href="./logout.php">Uitloggen</a>
                    </li>';
            } else {
              // if user is not logged in
              echo '<li class="nav-item active automargin">
                      <a class="nav-link nav-btn" href="./index.php?content=home">Home <span class="sr-only">(current)</span></a>
                    </li>';
              echo '
                <li class="nav-item automargin">
                  <span class="nav-link nav-btn">
                    Heren
                  </span>
                  <div class="dropdown-btn">
                    <a class="dropdown-item" href="index.php?content=herenkleding">Kleding</a>
                    <a class="dropdown-item" href="index.php?content=herenschoenen">Schoenen</a>
                    <a class="dropdown-item" href="index.php?content=herenaccessoires">Accessoires</a>
                  </div>
                </li>';
              // Nav Dames
              echo '
                <li class="nav-item automargin">
                  <span class="nav-link nav-btn">
                    Dames
                  </span>
                  <div class="dropdown-btn">
                    <a class="dropdown-item" href="index.php?content=dameskleding">Kleding</a>
                    <a class="dropdown-item" href="index.php?content=damesschoenen">Schoenen</a>
                    <a class="dropdown-item" href="index.php?content=damesaccessoires">Accessoires</a>
                  </div>
                </li>';
              echo '<li class="nav-item automargin">
                      <a class="nav-link nav-btn" href="./index.php?content=registerform">Registreer</a>
                    </li>';
              echo '<li class="nav-item automargin">
                      <a class="nav-link nav-btn" href="./index.php?content=loginform">Inloggen</a>
                    </li>';
            }
          ?>
      <li class="search-box automargin">
        <?php
            include("./searchform.php");
            ?>
      </li>
    </ul>
  </div>
</nav>