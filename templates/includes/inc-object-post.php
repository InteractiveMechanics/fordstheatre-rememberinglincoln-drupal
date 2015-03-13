<div class="post post-<?php print $n->nid ?>">
    <a href="<?php print url('node/' . $n->nid, array('absolute' => TRUE)); ?>">
        <?php
            $preset = 'square';
            $src = $n->field_file['und'][0]['uri'];
            $dst = image_style_path($preset, $src);
            $success = file_exists($dst) || image_style_create_derivative(image_style_load($preset), $src, $dst);
        ?>
        
		<img src="<?php print file_create_url($dst); ?>" class="lazy" alt="<?php print $n->title; ?>" />
	</a>
	<p class="title">
		<a href="<?php print url('node/' . $n->nid, array('absolute' => TRUE)); ?>">
			<?php print $n->title; ?>
		</a>
	</p>
	<p class="date">
		<?php $term = taxonomy_term_load($n->field_item_type['und'][0]['tid']); print $term->name; ?> from
		<?php print format_date(strtotime($n->field_date['und'][0]['value']), 'custom', 'M. j, Y'); ?>
	</p>
	<div class="save-icon hidden-xs hidden-sm node-<?php print $n->nid ?>" data-nodeId="<?php print $n->nid ?>">
        <span class="glyphicon glyphicon-remove-circle" title="Save this Object"></span>
    </div>
</div>