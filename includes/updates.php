<?php
if($_GET['limit'] == "no"){
    $limit = 100;
}else {
    $limit = $_GET['limit'];
}
$x = 0;
$i = 0;
$update_collection = $facebook->api('/me/posts');

foreach($update_collection as $user_updates){
    if($x == 1) break;
    $x++;
    foreach($user_updates as $update){
        if($i == $limit) break;
        $i++;
        // if update is not a chat message, show the update
        ?>
        <div class="element_row">
            <span>
                <?php
                    echo $update['story']."<br />";
                    echo "Op ".substr($update['created_time'], 0, 10);
                    if(count($update['likes']['data']) == 0){ echo "Geen likes";}else {echo count($update['likes']['data'])." likes"; }
                ?>
            </span>
        </div>
    <?php

    }
}
