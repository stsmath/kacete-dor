<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title><?php bloginfo('name'); ?> - <?php bloginfo('description') ?> </title>
  <meta name="description" content="<?php bloginfo('name'); ?> - <?php bloginfo('description') ?> ">

  <meta property="og:type" content="website" />
  <meta property="og:title"
    content="<?php bloginfo('name'); ?> - <?php wp_title('-') ?><?php bloginfo('description') ?> " />
  <meta property="og:description" content="<?php bloginfo('name'); ?> - <?php bloginfo('description') ?> " />
  <meta property="og:url" content="<?php bloginfo('url') ?>" />
  <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/img/og-image.png" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Inicio header Wordpress -->
  <?php wp_head(); ?>
  <!-- Fim header Wordpress -->
</head>

<body <?php body_class(); ?>>
  <?php $header = get_post('6'); ?>
  <header class="m-header">
    <?php if (!wp_is_mobile()): ?>
      <?php include(TEMPLATEPATH . '/inc/header/header-desk.php'); ?>
    <?php else: ?>
      <?php include(TEMPLATEPATH . '/inc/header/header-mobile.php'); ?>
    <?php endif; ?>
  </header>