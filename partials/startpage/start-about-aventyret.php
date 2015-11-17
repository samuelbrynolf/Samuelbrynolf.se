<?php if(function_exists('get_field') && get_field('options_about-aventyret-ID', 'option')) {

$args = array(
    'include' => get_field('options_about-aventyret-ID', 'option'),
    'post_type' => 'page',
    'post_status' => 'publish'
);
$aventyret_page = get_pages($args);

if($aventyret_page) {
    global $post; ?>

    <section class="m-listitem__section aventyret-about">
        <div id="js-instagram" class="m-prf ratio-1-1 s-is-hidden"></div>
        <?php foreach ($aventyret_page as $post){
            setup_postdata($post); ?>
            <h2 class="a-large a-listitem-title"><?php the_title(); ?></h2>
            <div id="js-aventyret-about-bio" class="l-gutter o-entry-content">
                <?php the_content(); ?>
            </div>
        <?php } ?>
    </section>

    <?php }
}