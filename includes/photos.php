<?php
if($_GET['limit'] == "no"){
    $limit = 100;
}else {
    $limit = $_GET['limit'];
}

// Setting both $x and $i to 0
$x = 0; // We need to foreach through the second array in the main array
$i = 0;
$photo_collection = $facebook->api('/me/photos'); ?>

<?php
// Looping through the like collection which is an multidimensional array
foreach($photo_collection as $user_photos){
    if($x == 1) break; // We need to foreach through the second array in the main array and skip the rest which we don't need
    $x++;
    foreach($user_photos as $photo){
        if($i == $limit) break;
        $i++; // creating new element for each result
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

