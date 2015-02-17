<?php
	$node_wrapper = entity_metadata_wrapper('node', $node);
	$timelineData = entity_load('node', array($node->nid) );
	$node_data = $timelineData[ $node->nid ];
	 
	$wrapper = entity_metadata_wrapper('node', $node_data);
	$downloadsCollection = field_get_items('node', $node_data, 'field_downloads');
	
	$downloads = array();
	
	if( $downloadsCollection ) {
	 
	  foreach( $downloadsCollection as $index => $collection ) {
		$temp = array();
		$file = $wrapper->field_downloads[$index]->field_downloads_file->value();
		
		$temp['title'] = $wrapper->field_downloads[$index]->field_downloads_title->value();
		$temp['file'] = file_create_url($file['uri']);
		
		$path_data = pathinfo($temp['file']);
		
		$temp['file_extension'] = $path_data['extension'];
		
		array_push($downloads, $temp);
	  }
	}
	
?>


<div class="module-page-header">

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=teaching-modules" class="back-link">&laquo; Return to Teaching Modules</a>
				<br />
				<h1><?php print $node->title; ?></h1>
			</div>

		</div>

	</div>

</div>

<div class="module-page">

	<div class="container">

		<div class="row">

			<div class="col-md-9">
				<p class="lead"><?php print $node->body['und'][0]['value']; ?></p>

                <?php if ($node->field_connections['und'][0]['value']): ?>
				    <h3>Contemporary Connections</h3>
                    <p class="information"><?php print $node->field_connections['und'][0]['value']; ?></p>
                <?php endif; ?>

                <?php if ($downloads): ?>
				    <h3>Downloads</h3>
                    <ul class="downloads">
				
						<?php foreach ($downloads as $download): ?>
							<li>
								<p>
									<a href="<?php print $download['file']; ?>" target="_blank" download>
									<?php print $download['title']; ?>
									</a> (.<?php print $download['file_extension']; ?>)
								</p>
							</li>
						<?php endforeach; ?>
				    </ul>
                <?php endif; ?>
			</div>

			<div class="col-md-3">
				<ul class="details">
                    <?php if ($node->field_grade_level['und'][0]['value']): ?>
					<li>
						<h4 class="header">Grade Level</h4>
						<p class="detail"><?php print $node->field_grade_level['und'][0]['value']; ?></p>
					</li>
                    <?php endif; ?>					
                    <?php if ($node->field_timeframe['und'][0]['value']): ?>
					<li>
						<h4 class="header">Timeframe</h4>
						<p class="detail"><?php print $node->field_timeframe['und'][0]['value']; ?></p>
					</li>
					<?php endif; ?>
                    <?php if ($node->field_class_subject['und'][0]['value']): ?>
					<li>
						<h4 class="header">Class Subject</h4>
						<p class="detail"><?php print $node->field_class_subject['und'][0]['value']; ?></p>
					</li>
					<?php endif; ?>
                    <?php if ($node->field_class_standards['und'][0]['value']): ?>
					<li>
						<h4 class="header">Class Standards</h4>
						<p class="detail"><?php print $node->field_class_standards['und'][0]['value']; ?></p>
					</li>
					<?php endif; ?>
                    <?php if ($node->field_skills['und'][0]['value']): ?>
					<li>
						<h4 class="header">Skills</h4>
						<p class="detail"><?php print $node->field_skills['und'][0]['value']; ?></p>
					</li>
					<?php endif; ?>
                    <?php if ($node->field_region['und'][0]['value']): ?>
					<li>
						<h4 class="header">Regions</h4>
						<p class="detail"><?php print $node->field_region['und'][0]['value']; ?></p>
					</li>
                    <?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="browse-items partner-items">
	
	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<div id="posts" data-columns>
					
					<?php foreach($field_objects as $obj): ?>

						<div class="post">
							<?php if( isset($obj["entity"]->field_file['und'])): ?>
								<a href="<?php print url('node/' . $obj["entity"]->nid, array('absolute' => TRUE)); ?>">
									<img 
										src="<?php print file_create_url($obj["entity"]->field_file['und'][0]['uri']); ?>" 
			            				alt="<?php print $obj["entity"]->title;?>" 
			            				width="331" 
			            				class="img-responsive" 
			            				alt="<?php print $obj["entity"]->title;?>"
									/>
								</a>
							<?php else: ?>
								<img src="http://placehold.it/331x217" class="img-responsive" />
							<?php endif; ?>
							
							<p class="title">
								<a href="<?php print url('node/' . $obj["entity"]->nid, array('absolute' => TRUE)); ?>">
									<?php print $obj["entity"]->title;?>
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
					
					<?php endforeach; ?>
					
					
					
				</div>

			</div>

		</div>

	</div>
</div>