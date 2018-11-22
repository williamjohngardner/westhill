<?php
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
function register_theme_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' )
    )
  );
}
add_action( 'init', 'register_theme_menus' );
function dogwood_create_widget ( $name, $id, $description ){
  register_sidebar(array(
    'name' => __( $name ),
    'id' => $id,
    'description' => __( $description ),
    // 'before_widget' => '<div class="widget">',
    // 'after-widget' => '</div>',
    'before_title' => '<h2 class="module-heading">',
    'after_title' => '</h2>'
  ));
}
dogwood_create_widget('Page Sidebar', 'page', 'Displays on the side of pages with a sidebar');
dogwood_create_widget('Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section');
function dogwood_theme_styles(){
  wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Oswald:300,500,700' );
  wp_enqueue_style( 'main_css', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'dogwood_theme_styles' );
function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyAq4eZiz6tdsKPSyS8jbuLvCF4jZndwIuo';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
function esascend_theme_js() {
  wp_enqueue_style('font-awesome', '//use.fontawesome.com/7978a0b803.js');
}
add_action( 'wp_enqueue_scripts', 'dogwood_theme_js' );
class CSS_Menu_Walker extends Walker {
  var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
  function start_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul>\n";
  }
  function end_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    global $wp_query;
    $indent = ($depth) ? str_repeat("\t", $depth) : '';
    $class_names = $value = '';
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    /* Add active class */
    if (in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
      unset($classes['current-menu-item']);
    }
    /* Check for children */
    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    if (!empty($children)) {
      $classes[] = 'has-sub';
    }
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
    $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
    $id = $id ? ' id="' . esc_attr($id) . '"' : '';
    $output .= $indent . '<li' . $id . $value . $class_names .'>';
    $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
    $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
    $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
    $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'><span>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</span></a>';
    $item_output .= $args->after;
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
  function end_el(&$output, $item, $depth = 0, $args = array()) {
    $output .= "</li>\n";
  }
}
?>