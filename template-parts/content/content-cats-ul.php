<?php 

$cats = get_the_category();
if( $cats ): 
?>
<ul>
    <?php 
    foreach($cats as $cat) :
    ?>
    <li><a href="<?php echo get_category_link( $cat->cat_ID)?>"><?php echo $cat->name ?></a></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
