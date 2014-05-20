<?php
if($_GET['limit'] == "no"){
    $limit = 100;
}else {
    $limit = $_GET['limit'];
}
$x = 0;
$i = 0;
$likes_collection = $facebook->api('/me/likes');
foreach($likes_collection as $user_page_likes){
    if($x == 1) break;
    $x++;
    foreach($user_page_likes as $page){
        if($i == $limit) break;
        $i++;
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