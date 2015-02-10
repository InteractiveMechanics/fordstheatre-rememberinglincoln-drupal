<?php
	/*
	*
	*
	*
	*/
?>

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

		<?php foreach( $node->field_objects["und"] as $obj): ?>
			
			<div class="row curated-row-item">
	
				<div class="col-md-3">
					<div class="curated-image">
						<a href="<?php print url('node/' . $obj["entity"]->nid, array('absolute' => TRUE)); ?>">
							<?php if( isset($obj["entity"]->field_file['und'])): ?>
								<img 
									src="<?php print file_create_url($obj["entity"]->field_file['und'][0]['uri']); ?>" 
		            				alt="<?php print $obj["entity"]->title;?>" 
		            				width="331" 
		            				class="img-responsive" 
		            				alt="<?php print $obj["entity"]->title;?>"
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
							<a href="<?php print url('node/' . $obj["entity"]->nid, array('absolute' => TRUE)); ?>">
								<?php print $obj["entity"]->title ?>
							</a>
						</h3>
						<p class="description">
							<?php print $obj["entity"]->body["und"][0]["value"] ?>
						</p>
					</div>
				</div>
	
			</div>
			
		<?php endforeach; ?>

	</div>

</div>