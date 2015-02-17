
<div class="my-collection-header">

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<h1>Curated Collections</h1>
			</div>

		</div>

	</div>

</div>

<div class="curated-collection-list">

	<div class="container">

		<?php foreach ($view->result as $delta => $item): ?>
			
			<div class="row curated-row-item">
	
				<div class="col-md-3">
					<div class="curated-image">
						<a href="<?php print url('node/' . $view->result[$delta]->_field_data['nid']['entity']->nid, array('absolute' => TRUE)); ?>">
							<?php if( isset($view->result[$delta]->_field_data['nid']['entity']->field_image['und'])): ?>
								<img 
									src="<?php print file_create_url($view->result[$delta]->_field_data['nid']['entity']->field_image['und'][0]['uri']); ?>" 
		            				alt="<?php print $view->result[$delta]->_field_data['nid']['entity']->title;?>" 
		            				width="331" 
		            				class="img-responsive" 
		            				alt="<?php print $view->result[$delta]->_field_data['nid']['entity']->title;?>"
								/>
							<?php else: ?>
								<img src="http://placehold.it/331x217" class="img-responsive" />
							<?php endif; ?>
						</a>
					</div>
				</div>
	
				<div class='col-md-9'>
					<div class="curated-info">
						<h4 class="author">
							Created by Ford's Theatre
						</h4>
						<h3 class="title">
							<a href="<?php print url('node/' . $view->result[$delta]->_field_data['nid']['entity']->nid, array('absolute' => TRUE)); ?>">
								<?php print $view->result[$delta]->_field_data['nid']['entity']->title ?>
							</a>
						</h3>
						<p class="description">
							<?php if( strlen( $view->result[$delta]->_field_data['nid']['entity']->body["und"][0]["value"] ) > 400): ?>
							
								<?php 
									print substr($view->result[$delta]->_field_data['nid']['entity']->body["und"][0]["value"], 0, 399) . "..."; 
								?>
								
							<?php else: ?>
							
								<?php 
									print $view->result[$delta]->_field_data['nid']['entity']->body["und"][0]["value"];
								?>
								
							<?php endif; ?>
						</p>
					</div>
				</div>
	
			</div>
			
		<?php endforeach; ?>

	</div>

</div>
