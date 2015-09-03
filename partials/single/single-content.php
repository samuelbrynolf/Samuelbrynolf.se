<div class="l-pre-C1 l-span-C10 m-entry-content">
    <?php // the_content(); ?>
<!--    <h1 class="a-xlarge">7 things to know when designing for the Internet of Things</h1>-->
    <p>Srcset är en metod för att välja rätt bildkälla för responsiva bilder med målet att aldrig läsa in för stora filer. Då responsiv design i övrigt är rätt straight forward, har bildhantering och framförallt att enas kring ”best practice” för bildhantering varit en käpphäst. Srcset är nu ett attribut som accepterats i W3C HTML-spec och får därmed ses som en av de lyckade metoder som lyfts till ett mer vanligt sätt att hantera responsiva bilder.</p>
    <h2>Konfiguration av Make it Srcset</h2>
    <p>Srcset handlar enbart om att ladda in rätt bildstorlek. <strong>Oavsett skärmupplösning och visningsbredd</strong> ska bilden vara skarp utan att vara för tung. Srcset handlar inte om layout eller bildformat (Är du intresserad av att också ändra bildformat ska du använda picture istället.).</p>
    <p>Du kommer att <em>använda CSS som vanligt för att få bilderna</em> att hamna och falla ut som du vill. Men du kan vara trygg med att den bild som du stylat inte är större än vad besökaren behöver. Lättare sidor är snabbare sidor.</p>
    <p>I (srcset-)sizes-attributet ingår mediaqueries. Make it Srcset utgår från en mobile-first approach. Därför används min-widths för dessa mediaqueries. Make it Srcset skapar fyra mediaqueries och lämnar därmed fyra breakpoints för dig att justera.</p>
    <p>För egen del vill jag att srcset-mediaqueries ska sammanfalla med övrig (css-) layout för sidan, så jag för helt enkelt in de layout-breakpoints som min gridlayout redan äger. Om fyra breakpoints är för många mot vad jag använt i min css-grid, använder jag populära fabriks-skärmbredder för dessa breakpoints istället.</p>
    <h3>Generera shortcodes via mediabiblioteket (3.2.2)</h3>
    <p>Istället för bild läggs en förpopulerad shortcode in i wysiwyg-editorn när du använder ”Lägg till media”-knappen för att lägga in bilder. Attributen är utskrivna för att kunna laddas med innehåll — om du vill. Lämnar du dem tomma betyder det helt enkelt att de inte ska användas.</p>
    <h4>$mis_attachment_id</h4>
    <p>Attachment-ID för den bild som ska visas (integer). Måste anges.</p>
    <h4>$mis_srcsetSize_firstMq</h4>
    <p>Bildbredd angivet i enheten vw, när bilden befinner sig i den första min-width mediaquery (integer/null). Om inget värde anges / null sätts, används de värden som satts på settings-sidan.</p>
    <h2>Filter: Ge srcset-attribut till wysiwyg-redigerarens bilder</h2>
    <p>Checka checkboxen 3.1 på settings-sidan. Du har nu aktiverat ett filter för the_content() som letar upp bildtaggar och utökar dem med srcset-attributen när besökaren laddar din sida.</p>
    <p>Du arbetar med bilderna som vanligt i WYSIWYG-redigeraren. Det du vinner i enkelhet med filter-funktionen förloras dock i flexibilitet — du kan inte sätta unika argument för sizes eller bestämma egna klasser unikt för varje bild. Srcset-attributen kommer oavkortat att vara så som du bestämt dem på settings-sidan.</p>
</div><!-- .entry-content -->