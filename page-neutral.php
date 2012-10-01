<?php
/**
 * Template Name: Pagina neutra
*/

get_header('neutral');
st_before_content($columns='sixteen');
get_template_part( 'loop', 'neutral' );
st_after_content();
get_footer();
?>
