<?php
	global $base_path;
?>
<div class="partner-page-header">
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>
					Contributors
				</h1>
			</div>
		</div>
    </div>
</div>
<div class="partners">
    <div class="container">
		<div class="row">
			<?php foreach ($view->result as $delta => $item): ?>
                <?php if ($view->result[$delta]->_field_data['uid']['entity']->uid != 29): ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
					<div class="partner">
                        <?php $uid = $view->result[$delta]->_field_data['uid']['entity']->uid; ?>
                        <a href="<?php print $base_path; ?>contributor?uid=<?php print $uid ?>">
                            <?php if($view->result[$delta]->_field_data['uid']['entity']->picture): ?>
        						<img src="<?php print file_create_url($view->result[$delta]->_field_data['uid']['entity']->picture->uri); ?>" class="img-responsive" alt="<?php print $view->result[$delta]->_field_data['uid']['entity']->field_institution["und"][0]["value"]; ?>" />
                            <?php else: ?>
                                <img src="<?php print $base_path; ?>/themes/lincoln/assets/images/placeholder.png" class="img-responsive" alt="<?php print $view->result[$delta]->_field_data['uid']['entity']->field_institution["und"][0]["value"]; ?>" />
        					<?php endif; ?>
                            <p><?php print $view->result[$delta]->_field_data['uid']['entity']->field_institution['und'][0]['value']; ?></p>
				        </a>
					</div>
				</div>
                <?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>
