<header class="u-clearfix u-header u-sticky u-white u-header" id="sec-54ad">
  <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
    <a href="/" data-page-id="198333707" class="u-image u-logo u-image-1" data-image-width="1000" data-image-height="502" title="Home">
      <img src="images/Qmera_Logo1.png" class="u-logo-image u-logo-image-1" onclick="(function(){window.location = '/';})();">
    </a>
    <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
      <div class="menu-collapse u-custom-font" style="font-size: 1.125rem; letter-spacing: 0px; font-family: Poppins-Regular;">
        <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
          <svg>
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
          </svg>
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
              <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                <rect y="1" width="16" height="2"></rect>
                <rect y="7" width="16" height="2"></rect>
                <rect y="13" width="16" height="2"></rect>
              </symbol>
            </defs>
          </svg>
        </a>
      </div>
      <div class="u-custom-menu u-nav-container">
        <ul class="u-custom-font u-nav u-unstyled u-nav-1">
          <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-black" href="Products.php" style="padding: 10px 20px; font-weight:500;">Products</a>
          </li>
          <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-black" href="Solutions.php" style="padding: 10px 20px; font-weight:500;">Solutions</a>
          </li>
          <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-black" href="Pricing.php" style="padding: 10px 20px; font-weight:500;">Pricing</a>
          </li>
          <li class="u-nav-item"><a id="dev-nav" class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-black" href="Developers.php" style="padding: 10px 20px;font-weight:500;">Developers</a>
          </li>
        </ul>
      </div>
      <div class="u-custom-menu u-nav-container-collapse">
        <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
          <div class="u-sidenav-overflow">
            <div class="u-menu-close"></div>
            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
              <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Products.php" style="padding: 10px 20px;">Products</a>
              </li>
              <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Solutions.php" style="padding: 10px 20px;">Solutions</a>
              </li>
              <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Pricing.php" style="padding: 10px 20px;">Pricing</a>
              </li>
              <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Developers.php" style="padding: 10px 20px;">Developers</a>
              </li>
              <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Sign-up.php" style="padding: 10px 20px;">Get Started</a>
              </li>
              <li class="u-nav-item">
                <a class="u-button-style u-nav-link" href="login.php" style="padding: 10px 20px;">
                  <?php 
                    if (isset($_SESSION['id_user'])) {
                      echo 'Dashboard';
                    } else {
                      echo 'Login';
                    }
                  ?>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
      </div>
    </nav>
    <?php if (!isset($_SESSION['id_user'])) { ?>
      <a href="Sign-up.php" data-page-id="301341319" class="u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-custom-font u-hidden-md u-hidden-sm u-hidden-xs u-radius-12 u-text-custom-color-2 u-btn-1 corner-pointed">
        <span style="font-size: 1rem; font-weight: 600;">Get Started</span>
        <br>
      </a>
    <?php } ?>
    <img class="u-hidden-md u-hidden-sm u-hidden-xs u-image u-image-default u-preserve-proportions u-image-2" src="images/Log_In1.png" alt="" data-image-width="500" data-image-height="500" data-href="login.php" data-page-id="38003013">
  </div>
</header>

<form method="POST" id="logoutUser" style="display:none;">
  <button type="submit" name="submitLogout" class="dropdown-item" id="logoutButton">
    <i class="fas fa-sign-out-alt mr-2"></i> Sign out
  </button>
</form>

<script>
  <?php if ($geolocSts == 1) { ?>
    // console.log('geoloc ON');

    localStorage.prevGeoloc = localStorage.currentGeoloc;
    localStorage.currentGeoloc = 'ON';

    localStorage.removeItem('switchLang');

    var ONE_HOUR = 3600; //second

    if (localStorage.country_code == null || typeof localStorage.country_code === 'undefined' || localStorage.lastCheck == null || typeof localStorage.lastCheck === 'undefined' || (Math.floor(Date.now() / 1000) - localStorage.lastCheck) > ONE_HOUR) {
      geoLoc();
    }

    <?php  } else {
    if ($language == 0) {
    ?>
      localStorage.clear();
      localStorage.prevGeoloc = localStorage.currentGeoloc;
      localStorage.currentGeoloc = 'OFF';

      // console.log('geoloc OFF, EN only');
      localStorage.lang = 0;
      localStorage.lang_visible = 0;
      localStorage.switchLang = 0;
      localStorage.country_code = 'EN';

    <?php } else if ($language == 1) { ?>
      localStorage.clear();
      localStorage.prevGeoloc = localStorage.currentGeoloc;
      localStorage.currentGeoloc = 'OFF';

      // console.log('geoloc OFF, ID only');
      localStorage.lang = 1;
      localStorage.lang_visible = 0;
      localStorage.switchLang = 1;
      localStorage.country_code = 'ID';

  <?php }
  } ?>

  <?php if (isset($_SESSION['id_user'])) { ?>

    window.onload = function() {
      inactivityTime();
      checkVisible();
      PR.prettyPrint();
    }
  <?php } else { ?>

    window.onload = function() {
      PR.prettyPrint();
      checkVisible();
    }
  <?php } ?>
</script>