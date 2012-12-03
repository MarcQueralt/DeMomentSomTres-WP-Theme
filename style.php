<?php

/**
 * Converts from font attribute to its css font-family
 * @param string $typography the typography attribute
 * @return string the font-family css
 * @since 1.4
 */
function dmst_font_style($typography) {
    $fontstack='sans-serif';
    if ($typography == "helvetica") {
        $fontstack = $helvetica;
    } elseif ($typography == "opensans") {
        $fontstack = $opensans;
    } elseif ($typography == "permanent") {
        $fontstack = $permanent;
    } elseif ($typography == "arimo") {
        $fontstack = $arimo;
    } elseif ($typography == "josefin") {
        $fontstack = $josefin;
    } elseif ($typography == "italiana") {
        $fontstack = $italiana;
    } elseif ($typography == "questrial") {
        $fontstack = $questrial;
    } elseif ($typography == "bangers") {
        $fontstack = $bangers;
    } elseif ($typography == "portlligat") {
        $fontstack = $portlligat;
    } elseif ($typography == "portlligatsans") {
        $fontstack = $portlligatsans;
    } elseif ($typography == "arial") {
        $fontstack = $arial;
    } elseif ($typography == "georgia") {
        $fontstack = $georgia;
    } elseif ($typography == "cambria") {
        $fontstack = $cambria;
    } elseif ($typography == "tahoma") {
        $fontstack = $tahoma;
    } elseif ($typography == "palatino") {
        $fontstack = $palatino;
    }    
    return $fontstack;
}
// Modificacions per afegir-hi les fonts necessàries
if (extension_loaded('zlib')) {
    ob_start('ob_gzhandler');
}

header("Content-type: text/css; charset: UTF-8");
header("Cache-Control: must-revalidate");
$offset = 60 * 60;
$ExpStr = "Expires: " .
        gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
header($ExpStr);

// Declare CSS Font Stacks for reuse

$helvetica = '"HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif';
$arial = 'Arial, Helvetica, sans-serif';
$georgia = 'Constantia, "Lucida Bright", Lucidabright, "Lucida Serif", Lucida, "DejaVu Serif", "Bitstream Vera Serif", "Liberation Serif", Georgia, serif';
$cambria = 'Cambria, "Hoefler Text", Utopia, "Liberation Serif", "Nimbus Roman No9 L Regular", Times, "Times New Roman", serif';
$tahoma = 'Tahoma, Verdana, Segoe, sans-serif';
$palatino = '"Palatino Linotype", Palatino, Baskerville, Georgia, serif';
$arimo = 'Arimo, Helvetica, sans-serif';
$opensans = '"Open Sans", Helvetica, Arial, sans-serif';
$permanent = '"Permanent Marker", Helvetica, Arial, sans-serif';
$josefin = "'Josefin Sans', sans-serif";
$italiana = "'Italiana', serif";
$questrial = "'Questrial', sans-serif";
$bangers = "'Bangers', cursive";
$portlligatsans="'Port Lligat Sans', sans-serif";
$portlligat="'Port Lligat Slab', serif";
$opensanscondensed = '"Open Sans Condensed", Helvetica, Arial, sans-serif';
$carme='"Carme", sans-serif';
$muli='"Muli", sans-serif';

// Begin theme options
$body_background = of_get_option('body_background');
$typography = of_get_option('body_typography');
// Main Body Styles
echo 'body {';
if ($typography) {
    $fontstack = dmst_font_style($typography[face]);
    echo 'color:' . $typography[color] . ';';
    echo 'font-size:' . $typography[size] . ';';
    echo 'font-family:' . $fontstack . ';';
    echo 'font-weight:' . $typography[style] . ';';
    echo 'font-style:' . $typography[style] . ';';
}

// Custom Background
if ($body_background) {
    if ($body_background['image']) {
        echo 'background:' . $body_background[color] . ' url(' . $body_background[image] . ') ' . $body_background[repeat] . ' ' . $body_background[position] . ' ' . $body_background[scroll] . '';
    } elseif ($body_background['color']) {
        echo 'background-color:' . $body_background[color] . ';';
    }
}
// End Body Styles
echo '}';

// H1 Settings
$h1 = of_get_option('h1_typography');

echo 'h1 {';
if ($h1) {
    $fontstack=  dmst_font_style($h1['face']);
    echo 'color:' . $h1[color] . ';';
    echo 'font-size:' . $h1[size] . ';';
    echo 'font-family:' . $fontstack . ';';
    echo 'font-weight:' . $h1[style] . ';';
    echo 'font-style:' . $h1[style] . ';';
}
echo '}';

// H2 Settings
$h2 = of_get_option('h2_typography');

echo 'h2 {';
if ($h2) {
    $fontstack=  dmst_font_style($h2['face']);
    echo 'color:' . $h2[color] . ';';
    echo 'font-size:' . $h2[size] . ';';
    echo 'font-family:' . $fontstack . ';';
    echo 'font-weight:' . $h2[style] . ';';
    echo 'font-style:' . $h2[style] . ';';
}
echo '}';

// H3 Settings
$h3 = of_get_option('h3_typography');

echo 'h3 {';
if ($h3) {
    $fontstack=  dmst_font_style($h3['face']);
    echo 'color:' . $h3[color] . ';';
    echo 'font-size:' . $h3[size] . ';';
    echo 'font-family:' . $fontstack . ';';
    echo 'font-weight:' . $h3[style] . ';';
    echo 'font-style:' . $h3[style] . ';';
}
echo '}';

// H4 Settings
$h4 = of_get_option('h4_typography');

echo 'h4 {';
if ($h4) {
    $fontstack=  dmst_font_style($h4['face']);
    echo 'color:' . $h4[color] . ';';
    echo 'font-size:' . $h4[size] . ';';
    echo 'font-family:' . $fontstack . ';';
    echo 'font-weight:' . $h4[style] . ';';
    echo 'font-style:' . $h4[style] . ';';
}
echo '}';

// h5 Settings
$h5 = of_get_option('h5_typography');

echo 'h5 {';
if ($h5) {
    $fontstack=  dmst_font_style($h5['face']);
    echo 'color:' . $h5[color] . ';';
    echo 'font-size:' . $h5[size] . ';';
    echo 'font-family:' . $fontstack . ';';
    echo 'font-weight:' . $h5[style] . ';';
    echo 'font-style:' . $h5[style] . ';';
}
echo '}';
?>

a,a:link,a:visited,a:active,#content .gist .gist-file .gist-meta a:visited {color: <?php echo of_get_option('link_color', '#000'); ?>;}

<?php
$sidebar_position = of_get_option('page_layout');
$content_position = ($sidebar_position == "right" ? "left" : "right");
$sidebar_margin = ($sidebar_position == "right" ? "left" : "right");
?>
#wrap #content {float:<?php echo $content_position; ?>;}
#wrap #sidebar {float:<?php echo $sidebar_position; ?>;}
#wrap #sidebar .widget-container {margin-<?php echo $sidebar_margin; ?>: 20px;margin-<?php echo $sidebar_position; ?>: 0px;}
#site-title a {
color: <?php echo of_get_option('header_color'); ?>;
}
<?php
if (extension_loaded('zlib')) {
    ob_end_flush();
}
?>