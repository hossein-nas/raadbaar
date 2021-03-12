<?php 
$list = get_post_ancestors(get_the_ID());
$list = array_reverse($list);
foreach($list as $index => $l){
    $class= '';

    if( $index == 0) $class = 'root';

    $title = get_the_title($l);
    $permalink = get_the_permalink($l);
    echo "<li class='$class'> <a href='$permalink'>$title</a></li>";
}
?>
