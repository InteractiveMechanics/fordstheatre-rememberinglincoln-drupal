<?php
	//
?>

<div class="browse-header">
	<div class="browse-search-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Browse Teaching Modules</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="module-items">
	<div class="container">
		<div class="row">
			
			<?php foreach ($view->result as $delta => $item): ?>
				<div class="col-md-6">
					<div class="module-item">
	
						<h4 class="for">
							Grade <?php print $view->result[$delta]->_field_data['nid']['entity']->field_grade_level['und'][0]['value'];?>
							<?php print $view->result[$delta]->_field_data['nid']['entity']->field_class_subject['und'][0]['value'];?>
						</h4>
						<h3 class="title">
							<a href="<?php print url('node/' . $view->result[$delta]->_field_data['nid']['entity']->nid, array('absolute' => TRUE)); ?>">
								<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>
							</a>
						</h3>
						<p class="description">
							<?php if( trim(strlen($view->result[$delta]->_field_data['nid']['entity']->body['und'][0]['value']) > 300)): ?>
								<?php print substr($view->result[$delta]->_field_data['nid']['entity']->body['und'][0]['value'], 0, 299) . "..."; ?>
							<?php else: ?>
								<?php print $view->result[$delta]->_field_data['nid']['entity']->body['und'][0]['value']; ?>
							<?php endif; ?>
						</p>
	
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
</div>