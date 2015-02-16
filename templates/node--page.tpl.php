<?php
	global $base_path; 
?>
<div class="about-page-header">
    <div class="container">
        <h1><?php print $title; ?></h1>
    </div>
</div>
<div class="about-page-info">
    <div class="container">
        <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            print render($content);
          ?>
    </div>
</div>