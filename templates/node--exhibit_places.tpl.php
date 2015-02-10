<?php
	$node_wrapper = entity_metadata_wrapper('node', $node);
	$timelineData = entity_load('node', array($node->nid) );
	$node_data = $timelineData[ $node->nid ];
	 
	$wrapper = entity_metadata_wrapper('node', $node_data);
	$timelineCollection = field_get_items('node', $node_data, 'field_exhibit_place_historypin');
	
	$places_arrary = array();
 
	if( $timelineCollection ) {
	 
	  foreach( $timelineCollection as $index => $collection ) {
		$wrapper->field_exhibit_place_historypin[ $index ];
		$temp = array();
		$image = $wrapper->field_exhibit_place_historypin[0]->field_historypin_image->value();
		
		$temp['title'] = $wrapper->field_exhibit_place_historypin[$index]->field_historypin_title->value();
		$temp['image'] = file_create_url($image['uri']);
		$temp['body']  = $wrapper->field_exhibit_place_historypin[$index]->field_historypin_body->value();
		
		array_push($places_arrary, $temp);

	  }
	}
	
	
?>

<div class="menu-detail-area">

	<div class="container">
	
		<div class="row header-row">
	
			<div class="col-md-12">
	
				<h4>
					Explore the exhibit
				</h4>
	
				<h1 class="lead">
					Places
				</h1>
	
			</div>
	
		</div>
	
		<div class="row information-row">
	
			<div class="col-md-8 ">
				<p>
					<?php print $node->body['und'][0]['value'];?>
				</p>
			</div>
	
			<div class="col-md-4">
	
				<div class="menu">
	
					<ul>
						<li>
							<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/366">
								1. Introduction
							</a>
						</li>
						<li
							<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/367">
								2. Events
							</a>
						</li>	
						<li class="active">
							<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/369">
								3. Places
							</a>
						</li>	
						<li>
							<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/368">
								4. People
							</a>
						</li>		
					</ul>
	
				</div>
	
			</div>
	
		</div>
	
	</div>
	
	</div>
	
	<div class="map-area">
	
	<div id="map"></div>
	
	
	</div>
	
	<div class="introduction-sub-section">
	
	<div class="container">
		
		<div class="row">
		
			<?php if ($places_arrary): ?>
				
				<?php foreach ($places_arrary as $place): ?>
					<div class="col-md-4">
					
						<div class="sub-section-item">
							
							<div class="sub-section-image">
								<img class="img-responsive" src="<?php print $place['image'] ?>" alt="<?php print $place['title'] ?> Image" />
							</div>
			
							<h2>
								<a href="javascript: void(0);">
									<?php print $place['title'] ?>
								</a>
							</h2>
			
							<p>
								<?php print $place['body'] ?>
							</p>
						</div>
			
					</div>
				<?php endforeach; ?>
			
			<?php endif; ?>
			
			
		</div>
	
	</div>
	
	</div>
	
	<div class="next-section-area">
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-left">
					<h4 class="left">
						PREVIOUS
					</h4>
					<h2><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/367">&#8592; Events</a></h2>
				</div>
	
				<div class="pull-right">
					<h4 class="right">
						NEXT
					</h4>
					<h2><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/368">People &#8594;</a></h2>
				</div>
			</div>
		</div>
	</div>
	
	</div>
	
