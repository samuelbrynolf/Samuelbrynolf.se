<?php include("../header.php");

echo '<div class="t-components">'; ?>

    <div class="row">
        <section class="l-container">
            <div class="l-span-A12">
                <h2 class="a-large components__title">Library</h2>
                <p>This is a showcase for your projects atoms. Following classes could be totally ignored and should never be used in production,  (they are used for demonstration purposes for library/demo-pages only:</p>
                <ul class="a-ul">
                    <li>*component*</li>
                    <li>*lib*</li>
                </ul>
                <p>The concept of library/component pages are under construction and will extend to fulfill their goals: (1) To serve as client handovers (2) Serve as an overview for your projects buildblocks. (3) Let you debug each buildblocks individually without other errors or visual clutter for template layouts</p>
                <p>For now, let's focus on (2) --</p>
        </section>
    </div>

    <?php include('_atoms/logos.php');
	include('_atoms/colors.php');
	include('_atoms/gradients.php');
	include('_atoms/text.php');
	include('_atoms/lists.php');
	include('_atoms/form-all.php');
	include('_atoms/buttons.php');
echo '</div>';

include("../footer.php"); ?>

<div class="l-container">
    <div class="l-span-A12">
        <div class="l-container"></div>
            <div class="l-span-B6"></div>
            <div class="l-span-B6"></div>
        </div>
    </div>
</div>
