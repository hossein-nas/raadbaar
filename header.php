<!DOCTYPE html>
<html <?php language_attributes() ?> dir="rtl">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-is-mobile="<?php echo wp_is_mobile()? 'true': 'false'; ?>">

<?php
    get_template_part('template-parts/content', 'header');
    get_template_part('template-parts/content', 'navbar');

?>    
    <div id="app">
        <main>
    