<?php get_header(); ?>

<main id="js-main" role="main">

    <?php if(is_home()){

        if(is_paged()){
            // Is Blog + Not first page

        } else { // Is Blog + First page ?>
            <section class="m-listitem__section aventyret-about">
                <div id="js-instagram" class="m-prf ratio-1-1 s-is-hidden"></div>
                <h2 class="a-large a-listitem-title">Äventyret</h2>
                <div id="js-aventyret-about-bio" class="l-gutter">
                    <p>Srcset är en metod för att välja rätt bildkälla för responsiva bilder med målet att aldrig läsa in för stora filer. Då responsiv design i övrigt är rätt straight forward, har bildhantering och framförallt att enas kring ”best practice” för bildhantering varit en käpphäst. Srcset är nu ett attribut som accepterats i W3C HTML-spec och får därmed ses som en av de lyckade metoder som lyfts till ett mer vanligt sätt att hantera responsiva bilder.</p>
                    <p>Srcset är en metod för att välja rätt bildkälla för responsiva bilder med målet att aldrig läsa in för stora filer. Då responsiv design i övrigt är rätt straight forward, har bildhantering och framförallt att enas kring ”best practice” för bildhantering varit en käpphäst. Srcset är nu ett attribut som accepterats i W3C HTML-spec och får därmed ses som en av de lyckade metoder som lyfts till ett mer vanligt sätt att hantera responsiva bilder.</p>
                </div>
            </section>

            <?php get_template_part('partials/startpage/start-featured');
        }

    } else {
        // Archive-templates
        get_template_part('partials/global-components/archive-header');
    }


     // -----



    if ( have_posts() ) {
        get_template_part('partials/listitems/loop-listitems');
    }

    if (!have_posts() && is_search() || is_404()) {
        get_template_part('partials/global-components/no-content');
    } ?>

</main>

<?php get_footer();
