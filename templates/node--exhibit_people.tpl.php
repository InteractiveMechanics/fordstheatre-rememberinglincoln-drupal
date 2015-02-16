<?php
	$node_wrapper = entity_metadata_wrapper('node', $node);
	$timelineData = entity_load('node', array($node->nid) );
	$node_data = $timelineData[ $node->nid ];
	 
	$wrapper = entity_metadata_wrapper('node', $node_data);
	$timelineCollection = field_get_items('node', $node_data, 'field_exhibit_people_person');
	
	$related_resources = array();
 
	if( $timelineCollection ) {
	 
	  foreach( $timelineCollection as $index => $collection ) {
		$wrapper->field_exhibit_people_person[ $index ];
		$temp = array();
        $image = $wrapper->field_exhibit_people_person[$index]->field_person_image->value();
		
		$resources = $wrapper->field_exhibit_people_person[$index]->field_related_resources->value();
		
		$temp['name'] = $wrapper->field_exhibit_people_person[$index]->field_person_name->value();
		$temp['body'] = $wrapper->field_exhibit_people_person[$index]->field_person_body->value();
        $temp['image'] = file_create_url($image['uri']);
		
		$res_arr = array();
		for($i = 0; $i < count($resources); $i++) {
			$temp_arr = array();
			
			$temp_arr['title'] = $resources[$i]->title;
			$temp_arr['node_id'] =$resources[$i]->nid;
			
			array_push($res_arr, $temp_arr);
		}
		
		$temp['resources'] = $res_arr;
		
		array_push($related_resources, $temp);
	  }
	}
    global $base_path;	

?>

<div class="menu-detail-area">
	<div class="container">
		<div class="header row">
            <div class="col-lg-8 col-lg-offset-2">
			    <h4>Explore the Story</h4>
                <h1><?php print $node->title; ?></h1>
            </div>
		</div>

		<div class="row information-row">
			<div class="col-md-8 col-lg-5 col-lg-offset-2">
				<p><?php print $node->body['und'][0]['value'];?></p>
			</div>
			<div class="col-md-4 col-lg-3">
				<div class="menu pull-right">

					<ul>
						<li>
							<a href="<?php print $base_path; ?>exhibit/introduction">1. Introduction</a>
						</li>
						<li>
							<a href="<?php print $base_path; ?>exhibit/events">2. Timeline</a>
						</li>	
						<li>
							<a href="<?php print $base_path; ?>exhibit/places">3. Map of Responses</a>
						</li>	
						<li class="active">
							<a href="<?php print $base_path; ?>exhibit/people">4. People</a>
						</li>		
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="view-people">
    <div class="container">
        <div class="row">

            <?php if($related_resources): ?>
				<?php $j = 0; ?>
				<?php foreach( $related_resources as $res): ?>
					
					<div class="col-md-6">
                        <div class="person">
                            <div class="photo">
                                <img src="<?php print $res['image'] ?>" alt="Photo of <?php print $res['name'] ?>" />
				            </div>
		
							<div class="about">
								<h2 class="lead"><?php print $res['name'] ?></h2>
								<p class="lead"><?php print $res['body'] ?></p>
				            </div>
		
                            <?php if( $res['resources'] ): ?>
    							<div class="related-info">
    								<h4>Related Responses</h4>
    								<ul>
    								    <?php foreach( $res['resources'] as $r): ?>
                                            <li>
                                                <a href="<?php print url('node/' . $r['node_id'], array('absolute' => TRUE)); ?>">
    												<?php print $r['title'] ?>
    								            </a>
                                            </li>
                                        <?php endforeach; ?>
    								</ul>
    				            </div>
                            <?php endif; ?>
				        </div>
					</div>
						
                    <?php $j++; ?>
						
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
					<h4 class="text-left">
						Previous
					</h4>
					<h2><a href="<?php print $base_path; ?>exhibit/places"><span>&#8592;</span> Map of Responses</a></h2>
				</div>

				<div class="pull-right">
					<h4 class="text-right">
						Next
					</h4>
					<h2><a href="<?php print $base_path; ?>browse">Browse responses <span>&#8594;</span></a></h2>
				</div>
			</div>
		</div>
	</div>
</div>
