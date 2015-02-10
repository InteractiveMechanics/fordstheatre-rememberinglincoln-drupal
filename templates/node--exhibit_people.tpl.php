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
		
		$resources = $wrapper->field_exhibit_people_person[$index]->field_related_resources->value();
		
		$temp['name'] = $wrapper->field_exhibit_people_person[$index]->field_person_name->value();
		$temp['body'] = $wrapper->field_exhibit_people_person[$index]->field_person_body->value();
		
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
	
	
?>

<div class="menu-detail-area">

	<div class="container">

		<div class="row header-row">

			<div class="col-md-12">

				<h4>
					Explore the exhibit
				</h4>

				<h1 class="lead">
					People
				</h1>

			</div>

		</div>

		<div class="row information-row">

			<div class="col-md-8">
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
						<li>
							<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/369">
								3. Places
							</a>
						</li>	
						<li class="active">
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

<div class="view-people-area">

	<div class="people-section-gradient">
		<div class="container">

			<div class="row">
				<?php if($related_resources): ?>
					<?php $j = 0; ?>
					<?php foreach( $related_resources as $res): ?>
					
						
						<div class="col-md-6">
		
							<div class="person">
								<div class="photo">
									<img src="./images/whitman.png" alt="Photo of Walt Whitman" />
								</div>
		
								<div class="about">
									<h2 class="lead">
										<?php print $res['name'] ?>
									</h2>
									<p class="lead">
										<?php print $res['body'] ?>
									</p>
								</div>
		
								<div class="related-info">
									<h4>
										Related Response
									</h4>
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
							</div>
		
						</div>
						
						<?php $j++; ?>
						
						<?php
							if($j >= 2 ) {
								break;
							}
						?>
						
					<?php endforeach; ?>
					
				<?php endif; ?>

			</div>

		</div>
	</div>
	

</div>

<div class="people-sub-section">

	<div class="container">
		
		<div class="row">
		
			<div class="col-md-6">
				
				<div class="people-sub-info">
					<p>
						<?php print $node->field_exhibit_summary['und'][0]['value'];?>
					</p>
				</div>

			</div>

			<div class="col-md-6">
				<?php 
					$call_out = $node->field_exhibit_callout['und'][0]['entity'];
				?>
				
				<?php if ( $call_out->body['und'][0]['value'] ): ?>
					
					<div class="social-card" data-url="<?php print $call_out->field_link['und'][0]['value']; ?>">
						<p class="hashtag">
							#<?php print $call_out->name; ?>
						</p>

						<p class="message">
							<?php print $call_out->body['und'][0]['value']; ?>
						</p>
					</div>
					
				<?php endif; ?>
			</div>

		</div>

	</div>

</div>

<div class="next-section-area">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-left">
					<h4 class="left">
						Previous
					</h4>
					<h2><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/369">&#8592; Places</a></h2>
				</div>

				<div class="pull-right">
					<h4 class="right">
						Next
					</h4>
					<h2><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=browse">Browse responses &#8594;</a></h2>
				</div>
			</div>
		</div>
	</div>

</div>


<script type="text/javascript">
	(function ($) {
	
		$(document).ready(function(){
			$('div.social-card').click(function(){
				var url = $(this).data('url');
				
				window.open(url,'_blank');
				window.open(url);	
			});
		});
		
	}(jQuery));
</script>

