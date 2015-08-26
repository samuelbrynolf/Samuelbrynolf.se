<?php include("../header.php");

echo '<div class="l-container t-components">';
    echo '<div class="l-span-A12">'; ?>
        <header class="row">
            <h2 class="a-large components__title">Demos: Webfontloader + Bento jQueryplugins</h2>
        </header>

        <?php include('_bentoJs-demo/demo-webfonter.php');
        include('_bentoJs-demo/demo-getActiveMq.php');
        include('_bentoJs-demo/demo-lazyload.php');
        include('_bentoJs-demo/demo-fitvids.php');
        include('_bentoJs-demo/demo-viewportchecker.php');
        include('_bentoJs-demo/demo-smoothscroll.php');
    echo '</div>';
echo '</div>';

include("../footer.php");