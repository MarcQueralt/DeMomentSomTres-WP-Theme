<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */
function optionsframework_option_name() {

    // This gets the theme name from the stylesheet (lowercase and without spaces)
    //$themename = get_theme_data(STYLESHEETPATH . '/style.css'); //DeMoMentSomTres Deprecated
    $themename = wp_get_theme(STYLESHEETPATH . '/style.css');
    $themename = $themename['Name'];
    $themename = preg_replace("/\W/", "", strtolower($themename));

    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themename;
    update_option('optionsframework', $optionsframework_settings);

    // echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */
function optionsframework_options() {

    // Background Defaults

    $body_background_defaults = array(
        'color' => '#fcfcfc',
        'image' => 'wp-content/themes/demomentsomtres/images/border_top.png',
        'repeat' => 'repeat-x',
        'position' => 'top center',
        'attachment' => 'fixed');



    // If using image radio buttons, define a directory path
    $imagepath = get_template_directory_uri() . '/images/';

    $options = array();

    $options[] = array("name" => __("Style Options", 'demomentsomtres'),
        "type" => "heading");


    $options[] = array("name" => __("Style Options", 'demomentsomtres'),
        "desc" => __("The following options allow you to apply basic customizations to your theme colors. In some cases however, you will need to edit CSS. <br /> This can be done from <a href=\"theme-editor.php\">stylesheet editor</a> or by navigating to Appearance &rarr; Editor.", 'demomentsomtres'),
        "type" => "info");

    $options[] = array("name" => __("Logo Style", 'demomentsomtres'),
        "desc" => __("Display a custom image/logo image in place of title header.", 'demomentsomtres'),
        "id" => "use_logo_image",
        "type" => "checkbox");


    $options[] = array("name" => __("Header Logo", 'demomentsomtres'),
        "desc" => __("If you prefer to show a graphic logo in place of the header, you can upload or paste the URL here. Set the width and height below. <strong>Your logo should be resized prior to uploading</strong>", 'demomentsomtres'),
        "id" => "header_logo",
        "class" => "hidden",
        "type" => "upload");

    $options[] = array("name" => __("Logo Width", 'demomentsomtres'),
        "desc" => __("Width (in px) of Your logo.", 'demomentsomtres'),
        "id" => "logo_width",
        "std" => "940",
        "class" => "mini hidden",
        "type" => "text");

    $options[] = array("name" => __("Logo Height", 'demomentsomtres'),
        "desc" => __("Height (in px) of Your logo.", 'demomentsomtres'),
        "id" => "logo_height",
        "std" => "94",
        "class" => "mini hidden",
        "type" => "text");

    $options[] = array("name" => __("Hide header images", 'demomentsomtres'),
        "desc" => __("Hide the header", 'demomentsomtres'),
        "id" => "hide_header_images",
        "type" => "checkbox"
    );

    $options[] = array("name" => __("Prevent big featured images to be shown in header", 'demomentsomtres'),
        "desc" => __("Prevents showing whole width featured images on header", 'demomentsomtres'),
        "id" => "hide_big_header_images",
        "type" => "checkbox"
    );

    $options[] = array("name" => __("Hide menu", 'demomentsomtres'),
        "desc" => __("Hide the navigation menu", 'demomentsomtres'),
        "id" => "hide_menu",
        "type" => "checkbox"
    );

    $options[] = array("name" => __("Show breadcrumbs", 'demomentsomtres'),
        "desc" => __("Show breadcrumbs below navigation bar. <br/>Requieres Wordpress SEO by Yoast to have the option actived.", 'demomentsomtres'),
        "id" => "show_breadcrumbs",
        "type" => "checkbox"
    );

    $options[] = array("name" => __("Body Background", 'demomentsomtres'),
        "desc" => __("Change the background CSS.", 'demomentsomtres'),
        "id" => "body_background",
        "std" => $body_background_defaults,
        "type" => "background");

    $options[] = array("name" => __("Sidebar Position", 'demomentsomtres'),
        "desc" => __("Select a sidebar layout position (left or right). You can also select a wide page layout on a per-page basis.", 'demomentsomtres'),
        "id" => "page_layout",
        "std" => "right",
        "type" => "images",
        "options" => array(
            'left' => $imagepath . '2cl.png',
            'right' => $imagepath . '2cr.png')
    );

    $options[] = array("name" => __("Header (text) Color", 'demomentsomtres'),
        "desc" => __("Header Colors.", 'demomentsomtres'),
        "id" => "header_color",
        "std" => "#000000",
        "type" => "color");

    $options[] = array("name" => __("Link Color", 'demomentsomtres'),
        "desc" => __("Default hyperlink colors.", 'demomentsomtres'),
        "id" => "link_color",
        "std" => "#3568A9",
        "type" => "color");

    $options[] = array("name" => __("Main Body Typography", 'demomentsomtres'),
        "desc" => __("Body Typography.", 'demomentsomtres'),
        "id" => "body_typography",
        "std" => array('size' => '11px', 'face' => 'helvetica', 'style' => 'normal', 'color' => '#444444'),
        "type" => "typography");


    $options[] = array("name" => __("(H1) Heading Typography", 'demomentsomtres'),
        "desc" => __("Heading typography.", 'demomentsomtres'),
        "id" => "h1_typography",
        "std" => array('size' => '18px', 'face' => 'helvetica', 'style' => 'normal', 'color' => '#181818'),
        "type" => "typography");

    $options[] = array("name" => __("(H2) Heading Typography", 'demomentsomtres'),
        "desc" => __("Heading Two typography.", 'demomentsomtres'),
        "id" => "h2_typography",
        "std" => array('size' => '16px', 'face' => 'helvetica', 'style' => 'normal', 'color' => '#181818'),
        "type" => "typography");


    $options[] = array("name" => __("(H3) Heading Typography", 'demomentsomtres'),
        "desc" => __("Heading Three typography.", 'demomentsomtres'),
        "id" => "h3_typography",
        "std" => array('size' => '14px', 'face' => 'helvetica', 'style' => 'normal', 'color' => '#181818'),
        "type" => "typography");

    $options[] = array("name" => __("(H4) Heading Typography", 'demomentsomtres'),
        "desc" => __("Heading Four typography.", 'demomentsomtres'),
        "id" => "h4_typography",
        "std" => array('size' => '13px', 'face' => 'helvetica', 'style' => 'bold', 'color' => '#181818'),
        "type" => "typography");

    $options[] = array("name" => __("(H5) Heading Typography", 'demomentsomtres'),
        "desc" => __("Heading Five typography.", 'demomentsomtres'),
        "id" => "h5_typography",
        "std" => array('size' => '12px', 'face' => 'helvetica', 'style' => 'bold', 'color' => '#181818'),
        "type" => "typography");


    $options[] = array("name" => __("Extra Header Text", 'demomentsomtres'),
        "desc" => __("HTML or text can be inserted into the header. You might add twitter icons, badges, or a site announcement here.", 'demomentsomtres'),
        "id" => "header_extra",
        "std" => "",
        "type" => "textarea");


    if (class_exists('jigoshop')) {
        $options[] = array("name" => __("Display Cart", 'demomentsomtres'),
            "desc" => __("Jigoshop is installed. Would you like to show a mini cart here instead?", 'demomentsomtres'),
            "id" => "show_mini_cart",
            "type" => "checkbox");
    }


    $options[] = array("name" => __("Footer Fine Print", 'demomentsomtres'),
        "desc" => __("HTML or text to be inserted into the very bottom after the widgets.", 'demomentsomtres'),
        "id" => "footer_text",
        "std" => "",
        "type" => "textarea");

    $options[] = array("name" => __("Footer Scripts", 'demomentsomtres'),
        "desc" => __("Add custom footer scripts such as Google Analytics. Do not include the &lt;script&gt; tag. This is already done for you.", 'demomentsomtres'),
        "id" => "footer_scripts",
        "std" => "",
        "type" => "textarea");

    return $options;
}