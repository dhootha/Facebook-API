<?php
if($_GET['limit'] == "no"){
    $limit = 100;
}else {
    $limit = $_GET['limit'];
}

$x = 0;
$i = 0;
$photo_collection = $facebook->api('/me/photos'); ?>

<span class="note">Klik op de foto om te vergroten</span>
<?php
foreach($photo_collection as $user_photos){
    if($x == 1) break;
    $x++;
    foreach($user_photos as $photo){
        if($i == $limit) break;
        $i++;
        ?>
        <div class="element_row">
            <div class="photo">
                <a class="photo" href="<?php echo $photo['source']; ?>">
                    <img src="<?php echo $photo['picture']; ?>" alt="" />
                </a>
            </div>
            <div class="photo_likes"><?php if(count($photo['likes']['data']) == 0){ echo "Geen likes";}else {echo count($photo['likes']['data'])." likes"; }?></div>
            <div class="clear"></div>
        </div>
    <?php
    }
}

