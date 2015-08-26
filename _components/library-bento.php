<?php include("../header.php");

    echo '<div class="l-container t-components">';
        echo '<div class="l-span-A12">'; ?>

            <h2 class="a-large components__title">Bento Components</h2>
            <p>Bento components are included via master.scss in src-folder. Style them in your own project-files (src/patternlab/*.scss). Use this page to get their markup — ready for copy- paste. Original styling are very functional and basic: find them in src/bento/components/*.scss.</p>

            <p>Some of them need corresponding jQuery plugins to work. They reside in src/js/plugins-bento/*.js. Use src/js/scripts to include them in your project.--</p>

            <?php include('_bento-components/mediablock.php');
            include('_bento-components/alerts.php');
            include('_bento-components/modal.php');
            include('_bento-components/toggler.php');
            include('_bento-components/expandsection.php');
            include('_bento-components/checkboxes_radiobuttons.php');
            include('_bento-components/dropdown.php');
            include('_bento-components/gridview.php');
            include('_bento-components/contentslider.php');
        echo '</div>';
    echo '</div>';

include("../footer.php"); ?>