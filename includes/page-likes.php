<?php
// Simply get the parameter from the URL, the collection is depending on the parameter
if($_GET['limit'] == "no"){
    $limit = 100;
}else {
    $limit = $_GET['limit'];
}
// Setting both $x and $i to 0
$x = 0; // We need to foreach through the second array in the main array
$i = 0;
$likes_collection = $facebook->api('/me/likes');
// Looping through the like collection which is an multidimensional array
foreach($likes_collection as $user_page_likes){
    if($x == 1) break; // We need to foreach through the second array in the main array and skip the rest which we don't need
    $x++;
    foreach($user_page_likes as $page){
        if($i == $limit) break;
        $i++; // creating new element for each result
        ?>
        <div class="element_row">
            <span>
                <?php
                    echo $page['category']."<br />";
                    echo $page['name'];
                ?>
            </span>
        </div>
    <?php
    }
}