<?php
$tags = get_tags();

if ($tags) { ?>
    <ul class="a-ul-large o-taglist">
        <li id="js-listhead">
            <h2 class="a-xlarge a-icon close">Etiketter<br/>A&mdash;&Ouml;</h2>
        </li>
       <?php foreach ($tags as $tag) { ?>
            <li>
                <a href="<?php echo get_tag_link( $tag->term_id ); ?>" title="<?php echo sprintf( __( "Se allt inom &auml;mnet %s" ), $tag->name ); ?>" rel="nofollow">
                    <h3 class="a-medium"><?php echo $tag->name ?> <span class="a-ul-large__span">[<?php echo $tag->count ?>]</span></h3>
                </a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>