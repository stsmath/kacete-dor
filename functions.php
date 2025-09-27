<?php
// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Habilitar Menus
add_theme_support('menus');

function registrar_menu_kacete_dor()
{
  register_nav_menu('menu-principal', __('Menu Principal'));
}
;
add_action('init', 'registrar_menu_kacete_dor');

function wp_kacetedor_scripts()
{
  wp_register_script('wp-kacetedor-scripts', get_template_directory_uri() . '/scripts/script.js', array(), '1.0', true);
  wp_enqueue_script('wp-kacetedor-scripts');

}
// add_action('wp_enqueue_scripts', 'wp_kacete_dor_scripts');

function wp_kacetedor_style()
{
  wp_register_style('wp-kacetedor-potions', get_template_directory_uri() . '/style.css', array(), false, false);
  wp_enqueue_style('wp-kacetedor-potions');
}
add_action('wp_enqueue_scripts', 'wp_kacetedor_style');

//Página com Informações gerais do Header.
function custom_post_type_cms_header()
{
  register_post_type('Custom Elements Header', array(
    'label' => 'Custom Elements Header',
    'description' => 'Informações de Campos personalizados do Header',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'rewrite' => array('slug' => 'Custom Elements Header', 'with_front' => true),
    'query_var' => true,
    'supports' => array('title', 'editor', 'page-attributes', 'post-formats'),

    'labels' => array(
      'name' => 'Custom Elements Header',
      'singular_name' => 'CMS Header',
      'menu_name' => 'CMS Header',
      'add_new' => 'Adicionar Novo',
      'add_new_item' => 'Adicionar Novo CMS Header',
      'edit' => 'Editar',
      'edit_item' => 'Editar CMS Header',
      'new_item' => 'Novo CMS Header',
      'view' => 'Ver CMS Header',
      'view_item' => 'Ver CMS Header',
      'search_items' => 'Procurar CMS Header',
      'not_found' => 'Nenhum CMS Header Encontrado',
      'not_found_in_trash' => 'Nenhum CMS Header Encontrado no Lixo',
    )
  ));
}

add_action('init', 'custom_post_type_cms_header');

//Página com informações gerais do Footer.

function custom_post_type_cms_footer()
{
  register_post_type('Custom Elements Footer', array(
    'label' => 'Custom Elements Footer',
    'description' => 'Informações de Campos personalizados do Footer',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'exclude_from_search' => true,
    'rewrite' => array('slug' => 'Custom Elements Footer', 'with_front' => true),
    'query_var' => true,
    'supports' => array('title', 'editor', 'page-attributes', 'post-formats'),

    'labels' => array(
      'name' => 'Custom Elements Footer',
      'singular_name' => 'CMS Footer',
      'menu_name' => 'CMS Footer',
      'add_new' => 'Adicionar Novo',
      'add_new_item' => 'Adicionar Novo CMS Footer',
      'edit' => 'Editar',
      'edit_item' => 'Editar CMS Footer',
      'new_item' => 'Novo CMS Footer',
      'view' => 'Ver CMS Footer',
      'view_item' => 'Ver CMS Footer',
      'search_items' => 'Procurar CMS Footer',
      'not_found' => 'Nenhum CMS Footer Encontrado',
      'not_found_in_trash' => 'Nenhum CMS Footer Encontrado no Lixo',
    )
  ));
}

add_action('init', 'custom_post_type_cms_footer');


// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $filename, $mimes) {

  global $wp_version;
  if ($wp_version !== '4.7.1') {
    return $data;
  }

  $filetype = wp_check_filetype($filename, $mimes);

  return [
    'ext' => $filetype['ext'],
    'type' => $filetype['type'],
    'proper_filename' => $data['proper_filename']
  ];

}, 10, 4);

function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action('admin_head', 'fix_svg');
?>