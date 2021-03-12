<ul>
    <?php 
    $tags= get_the_tags();
    if($tags):
    foreach($tags as $tag) : ?>

    <li><a href="<?php echo get_tag_link( $tag->term_id)?>"><?php echo $tag->name ?></a></li>
    
    <?php endforeach;endif; ?>
</ul>