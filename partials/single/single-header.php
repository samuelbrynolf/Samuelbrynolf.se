<header class="m-entry-header row">
    <?php the_title( '<h1 class="a-xlarge entry-title">', '</h1>' ); ?>
    <div class="m-preamble entry-preamble">
        <h2>Make it Srcset optimerar bilder med srcset-attributet. Snabbare responsiva webbplatser ftw!</h2>
    </div>

    <p class="a-fineprint a-entry-meta">
        <?php if (has_tag()) {
            the_tags('',' &#183 ');
            //echo '<br/>' .strip_tags(get_the_tag_list('', ' + ', ''));
        } ?>
    </p><!-- .entry-meta -->
</header><!-- .entry-header -->