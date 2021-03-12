<?php 
$items = get_the_terms(get_the_ID(), 'shipment_types');
if(!empty($items) ):
    $items = wp_list_pluck($items, 'name');
    foreach ($items as $item): ?>
        <li><?php echo $item ?></li>
        <?php 
    endforeach; 
else:
    echo "<li class=\"empty\">موردی ثبت نشده هنوز </li>";
endif;
?>
