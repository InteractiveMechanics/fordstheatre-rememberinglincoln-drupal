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
				<h1><?php print $node->title; ?></h1>
			</div>

		</div>

	</div>

</div>

<div class="browse-items">
	<div class="light-gray-gradients">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="posts" data-columns>
					
						<?php foreach( $node->field_objects["und"] as $obj): ?>
						
                            <?php if( isset($obj["entity"]->field_file['und'][0]['filename'])): ?>
                            	
    							<div class="post">
    								<a href="<?php print url('node/' . $obj["entity"]->nid, array('absolute' => TRUE)); ?>">
                                        <?php
                                            $preset = 'square';
                                            $src = $obj["entity"]->field_file['und'][0]['uri'];
                                            $dst = image_style_path($preset, $src);
                                            $success = file_exists($dst) || image_style_create_derivative(image_style_load($preset), $src, $dst);
                                        ?>
                                        
										<img src="<?php print file_create_url($dst); ?>" alt="<?php print $obj["entity"]->title; ?>" />    									
    								</a>
    								
    								<p class="title">
    									<a href="<?php print url('node/' . $obj["entity"]->nid, array('absolute' => TRUE)); ?>">
    										<?php print $obj["entity"]->title; ?>
    									</a>
    								</p>
    								<p class="date">
                                        <?php $term = taxonomy_term_load($obj["entity"]->field_item_type['und'][0]['tid']); print $term->name; ?><span>|</span> 
    									<?php print format_date(strtotime($obj["entity"]->field_date['und'][0]['value']), 'custom', 'M. j, Y'); ?>
    								</p>
                                    <div class="save-icon hidden-xs" data-nodeId="<?php print $obj["entity"]->nid ?>">
                                        <span class="glyphicon glyphicon-remove-circle" title="Save this Object"></span>
    								</div>
    							</div>
                            <?php endif; ?>
                            
						<?php endforeach; ?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--<div class="my-collection-header">

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

-->