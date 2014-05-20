<?php
if($_GET['limit'] == "no"){
    $limit = 100;
}else {
    $limit = $_GET['limit'];
}
// Setting both $x and $i to 0
$x = 0; // We need to foreach through the second array in the main array
$i = 0;
$update_collection = $facebook->api('/me/posts');
// Looping through the like collection which is an multidimensional array
foreach($update_collection as $user_updates){
    if($x == 1) break; // We need to foreach through the second array in the main array and skip the rest which we don't need
    $x++;
    foreach($user_updates as $update){
        if($i == $limit) break;
        $i++; // creating new element for each result
        ?>
        <div class="element_row">
            <span>
                <?php
                    echo $update['story']."<br />";
                    echo "Op ".substr($update['created_time'], 0, 10)."<br />"; // Substracting the entire date to a more readable format (10 characters)
                    if(count($update['likes']['data']) == 0){ echo "Geen likes";}else {echo count($update['likes']['data'])." likes"; } // If there are no likes echo Geen likes, if so? Echo the total likes
                ?>
            </span>
        </div>
    <?php

    }
}
