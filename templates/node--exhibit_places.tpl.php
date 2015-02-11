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
        $temp['link']  = $wrapper->field_exhibit_place_historypin[$index]->field_historypin_link->value();
		
		array_push($places_arrary, $temp);

	  }
	}
	
	global $base_path;
?>

<div class="menu-detail-area">
	<div class="container">
		<div class="header row">
            <div class="col-lg-8 col-lg-offset-2">
			    <h4>Explore the Exhibit</h4>
                <h1>Places</h1>
            </div>
		</div>
	
		<div class="row information-row">
			<div class="col-md-6 col-lg-5 col-lg-offset-2">
				<p><?php print $node->body['und'][0]['value'];?></p>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="menu pull-right">

					<ul>
						<li>
							<a href="<?php print $base_path; ?>exhibit/introduction">1. Introduction</a>
						</li>
						<li>
							<a href="<?php print $base_path; ?>exhibit/events">2. Events</a>
						</li>	
						<li class="active">
							<a href="<?php print $base_path; ?>exhibit/places">3. Places</a>
						</li>	
						<li>
							<a href="<?php print $base_path; ?>exhibit/people">4. People</a>
						</li>		
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>
	
<div class="map">
	<div id="leaflet"></div>
</div>
	
<div class="introduction-sub-section">
	<div class="container">
		<div class="row">
		
			<?php if ($places_arrary): ?>
				<?php foreach ($places_arrary as $place): ?>

					<div class="col-md-4">
						<a class="sub-section-item" href="<?php print $place['link'] ?>" target="_blank">
							<div class="sub-section-image">
								<img class="img-responsive" src="<?php print $place['image'] ?>" alt="<?php print $place['title'] ?> Image" />
							</div>
							<h2><?php print $place['title'] ?></h2>
							<p><?php print $place['body'] ?></p>
						</a>
			
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
					<h4 class="text-left">PREVIOUS</h4>
					<h2><a href="<?php print $base_path; ?>exhibit/events"><span>&#8592;</span> Events</a></h2>
				</div>
	
				<div class="pull-right">
					<h4 class="text-right">NEXT</h4>
					<h2><a href="<?php print $base_path; ?>exhibit/people">People <span>&#8594;</span></a></h2>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    $(document).ready(function(){
        L.mapbox.accessToken = 'pk.eyJ1IjoiaW50ZXJhY3RpdmVtZWNoIiwiYSI6InJlcUtqSk0ifQ.RUwHuEkBbXoJ6SgOnXmYFg';
        var mapboxTiles = L.tileLayer('https://{s}.tiles.mapbox.com/v4/interactivemech.l6d62e93/{z}/{x}/{y}.png?access_token=' + L.mapbox.accessToken, {
                attribution: '<a href="http://www.mapbox.com/about/maps/" target="_blank">Terms &amp; Feedback</a>'
            });

        var map = L.map('leaflet')
            .addLayer(mapboxTiles)
            .setView([39.7786249, -97.665032], 5);
        map.scrollWheelZoom.disable();
	});

</script>
