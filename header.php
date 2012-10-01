<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage skeleton
 * @since skeleton 0.1
 */
?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->

    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php
// Detect Yoast SEO Plugin
if (defined('WPSEO_VERSION')) {
    wp_title('');
} else {
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title('|', true, 'right');

    // Add the blog name.
    bloginfo('name');

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() ))
        echo " | $site_description";

    // Add a page number if necessary:
    if ($paged >= 2 || $page >= 2)
        echo ' | ' . sprintf(__('Page %s', 'demomentsomtres'), max($paged, $page));
}
?>
        </title>

        <link rel="profile" href="http://gmpg.org/xfn/11" />

        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Mobile Specific Metas
        ================================================== -->

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 

        <?php if (!defined('AIOFAVICON_PLUGIN_BASENAME')): //DMST-FaviconIntegration-Inital?>
            <!-- Favicons
            ================================================== -->
            <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico">

            <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-touch-icon.png">

            <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-touch-icon-72x72.png" />

            <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-touch-icon-114x114.png" />
        <?php endif; //DMST-FaviconIntegration-End?>

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" id="custom" href="<?php echo get_bloginfo(url) . '/?get_styles=css'; ?>" type="text/css" media="all" />

        <?php
        /*
         * enqueue threaded comments support.
         */
        if (is_singular() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');
        // Load head elements
        wp_head();
        ?>

    </head>
    <body <?php body_class(); ?>>
        <div id="wrap" class="container">
            <?php
            st_above_header();
            st_header();
            st_below_header();
            ?>
            <?php
            // DeMomentSomTres - menu hide - inici
            if (of_get_option('hide_menu')):
            // Do Nothing
            else:
                st_navbar();
            endif;
            // DeMomentSomTres - menu hide - final
            ?>
            <?php
            // DeMomentSomTres - breadcrumbs -inici
            if (of_get_option('show_breadcrumbs')):
                if (function_exists('yoast_breadcrumb')):
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                endif;
            endif;
            // DeMomentSomTres - breadcrumbs -fi
            // DeMomentSomTres - header image - inici
            if (of_get_option('hide_header_images')):
            // Do nothing
            else:
                // DeMomentSomTres - imatge destacada - inici
                if (of_get_option('hide_big_header_images')):
                    // Check if this is a post or page, if it has a thumbnail, and if it exceeds defined HEADER_IMAGE_WIDTH
                    if (is_singular() && current_theme_supports('post-thumbnails') && has_post_thumbnail($post->ID)
                            && ( /* $src, $width, $height */
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-thumbnail'))
                            &&
                            $image[1] >= HEADER_IMAGE_WIDTH) :
                        // Houston, we have a new header image!
                        $image_attr = array(
                            'class' => "scale-with-grid",
                            'alt' => trim(strip_tags($attachment->post_excerpt)),
                            'title' => trim(strip_tags($attachment->post_title))
                        );
                        echo '<div id="header_image" class="row sixteen columns">' . get_the_post_thumbnail($post->ID, array("HEADER_IMAGE_WIDTH", "HEADER_IMAGE_HEIGHT"), $image_attr) . '</div>';
                    elseif (get_header_image()) :
                        ?>
                        <div id="header_image" class="row sixteen columns"><img class="scale-with-grid round" src="<?php header_image(); ?>" alt="" /></div>
                        <?php
                    endif;
                elseif (get_header_image()) :
                    ?>
                    <div id="header_image" class="row sixteen columns"><img class="scale-with-grid round" src="<?php header_image(); ?>" alt="" /></div>
                    <?php
                endif;
            // DeMomentSomTres - imatge destacada - fi
            endif;
            // DeMomentSomTres - header image - final
            ?>