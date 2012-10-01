<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage skeleton
 * @since skeleton 0.1
 */
get_header();
st_before_content($columns = '');
?>
<h1><?php printf(__('Tag Archives: %s', 'demomentsomtres'), '<span class="bolder">' . single_tag_title('', false) . '</span>'); ?></h1>
<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
$term = get_queried_object();
$types = get_post_types(array('public' => true), 'names');
$args = array(
    'post_type' => $types,
    'tag_id' => $term->term_id,
    'post_status' => 'publish',
    'paged' => $paged,
// 'posts_per_page' => -1,
//    'orderby' => 'title',
//    'order' => 'ASC',
// 'ignore_sticky_posts'=> 1
);
$temp = $wp_query; // assign ordinal query to temp variable for later use  
$wp_query = null;
$wp_query = new WP_Query($args);
get_template_part('loop', 'tag');
$wp_query = $temp;
st_after_content();
get_sidebar();
get_footer();
?>