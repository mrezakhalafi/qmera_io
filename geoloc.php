<?php

$dbconn = getDBConn();

// language
$query = $dbconn->prepare("SELECT VALUE FROM SITE_SETTINGS WHERE PROPERTY = 'LANGUAGE'");
$query->execute();
$lang_setting = $query->get_result()->fetch_assoc();
$language = $lang_setting['VALUE'];
$query->close();

// geoloc
$query = $dbconn->prepare("SELECT VALUE FROM SITE_SETTINGS WHERE PROPERTY = 'GEOLOC'");
$query->execute();
$geoloc = $query->get_result()->fetch_assoc();
$geolocSts = $geoloc['VALUE'];
$query->close();

$_SESSION['language'] = $language;
$_SESSION['geolocSts'] = $geolocSts;
echo "<script>
    localStorage.geolocSts = " . $geolocSts . ";
    localStorage.fixedLanguage = " . $language . ";
    </script>";


?>

<form method="POST" class="d-none">
    <button type="submit" name="submitLogout" id="logoutButton">
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
    }

    if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { ?>
        window.onload = function() {
            inactivityTime();
        }
    <?php }
    ?>
</script>