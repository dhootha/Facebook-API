<?php
// Required setup for facebook connection
require 'src/facebook.php';

// Config data (App credentials) for the OAUTH2 process
$config = array(
        'appId' => '291284351041314',
        'secret' => '58c2698530ffd5714ebccd43d56105e6'
);

// Creating new Facebook object, passing through the config details
$facebook = new Facebook($config);

// If the getUser returns 0, there is no session or logged in user. So log in!
if($facebook->getUser() == 0){
    $login = $facebook->getLoginUrl(array("scope" => "read_stream, user_photos, user_likes"));
}else{
    $user = $facebook->api('me');       // Object with user info
    $user_id = $facebook->getUser();    // Returns the userID
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Notive stage opdracht</title>
    <meta name="description" content=""/>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php if(!$facebook->getUser() == 0){ //page setup for logged in users ?>
<nav>
    <ul>
        <li><img src="https://graph.facebook.com/<?php echo $user_id; ?>/picture" alt="<?php echo $user['name']; ?>"></li>
        <li class='has-sub'><a href='index.php'><span><?php echo $user['name'] ?></span></a>
            <ul>
                <li>
                    <a href='logout.php'><span>Uitloggen</span></a>
                </li>
            </ul>
        </li>
        <li class='has-sub'><a href='#'><span>Foto album</span></a>
            <ul>
                <li>
                    <a href='?show=photos&limit=no'><span>Alles</span></a>
                </li>
                <li>
                    <a href='?show=photos&limit=5'><span>Laatste 5</span></a>
                </li>
            </ul>
        </li>
        <li class='has-sub'><a href='#'><span>Laatste updates</span></a>
            <ul>
                <li>
                    <a href='?show=updates&limit=no'><span>Alles</span></a>
                </li>
                <li>
                    <a href='?show=updates&limit=5'><span>Laatste 5</span></a>
                </li>
            </ul>
        </li>
        <li class='has-sub active'><a href='#'><span>Pagina likes</span></a>
            <ul>
                <li>
                    <a href='?show=page-likes&limit=no'><span>Alles</span></a>
                </li>
                <li>
                    <a href='?show=page-likes&limit=5'><span>Laatste 5</span></a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<div class="main_container">
    <?php
        switch($_GET['show']){
            case "photos":
                include_once "includes/photos.php";
                break;

            case "updates":
                include_once "includes/updates.php";
                break;

            case "page-likes":
                include_once "includes/page-likes.php";
                break;
            default: ?>
                <span class="note">Welkom, maak uw keuze hier boven.</span>
            <?php
            break;
        }
    }else { ?>
        <a href='<?php echo $login; ?>'>Login met Facebook</a>
    <?php
    }
    ?>
</div>
</body>
</html> 