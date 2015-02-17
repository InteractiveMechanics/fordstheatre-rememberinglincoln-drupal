<?php
		$userid = $_GET['uid'];
		$user_info = user_load($userid);
	  
	  /*$nodeQuery = new EntityFieldQuery();

	  $entities = $nodeQuery->entityCondition('entity_type', 'node')
  ->entityCondition('bundle', 'object') 
  ->fieldCondition('','tid', $user_info->name, '=')
  ->execute();*/
  
  $query = new EntityFieldQuery();

  $query
  	->entityCondition('entity_type', 'node', '=')
  	->propertyCondition('type', 'object', '=')
  	->fieldCondition('field_contributor', 'target_id', $user_info->uid, '=');

  $entities = $query->execute();

  $obj_nodes = node_load_multiple(array_keys($entities['node']));
	  
?>

<?php if($user_info): ?>

	<div class="partner-page-header" style="padding-top:140px;">

		
		<div class="container">

			<div class="row">

				<div class="col-md-12">
					<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=partners" class="back-link">
						&laquo; Return to Partners List
					</a>
					<br />
					<?php if($user_info->picture): ?>
						<img src="<?php print file_create_url($user_info->picture->uri); ?>" width="75" class="img-responsive" alt="Partner" />
					<?php endif; ?>
				</div>

			</div>

		</div>

	</div>


	<div class="partner-page">
	
		<div class="container">
	
			<div class="row">
	
				<div class="col-md-9">
					<p class="information">
					
						<?php print $user_info->field_description["und"][0]["value"]; ?>
				
					</p>
				</div>
	
				<div class="col-md-3">
					<ul>
						<?php if($user_info->field_website_url["und"][0]["value"]): ?>
							<li>
								<p class="header" style="line-height:20px">
									Website
								</p>
								<p class="detail">
									<a href="<?php print $user_info->field_website_url["und"][0]["value"]; ?>">
										<?php print $user_info->field_website_url["und"][0]["value"]; ?>
									</a>
								</p>
							</li>
						<?php endif ?>	
						<li>
							<p class="header" style="line-height:20px">
								Contact Information
							</p>
							<p class="detail">
								
								<?php print $user_info->field_contact_name["und"][0]["value"]; ?> <br /> 
								<?php print $user_info->field_contact_email["und"][0]["value"]; ?> <br />
							</p>
						</li>
	
						<!--<li>
							<p class="header" style="line-height:20px">
								Address
							</p>
							<p class="detail">
								<address>
									801 K Street NW <br /> 
									Washington D.C., 20001
								</address>
							</p>
						</li>-->
					</ul>
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
						
							<?php foreach($obj_nodes as $key => $object): ?>
								
								
								<?php if( isset($obj_nodes[$key]->field_file['und'][0]['filename'])): ?>
	                            	
	    							<div class="post">
	    								<a href="<?php print url('node/' . $obj_nodes[$key]->nid, array('absolute' => TRUE)); ?>">
	                                        <?php
	                                            $presetname = 'square'; //presetname
	                                            $src = file_build_uri($obj_nodes[$key]->field_file['und'][0]['filename']);
	                                            $dst = image_style_path($presetname, $src);
	                                            //$success = file_exists($dst) || image_style_create_derivative($presetname, $src, $dst);
	                                   
	                                        ?>
	                                        
											<img src="<?php print file_create_url($dst); ?>" alt="<?php print $obj_nodes[$key]->title; ?>" />    									
	    								</a>
	    								
	    								<p class="title">
	    									<a href="<?php print url('node/' . $obj_nodes[$key]->nid, array('absolute' => TRUE)); ?>">
	    										<?php print $obj_nodes[$key]->title; ?>
	    									</a>
	    								</p>
	    								<p class="date">
	                                        <?php $term = taxonomy_term_load($obj_nodes[$key]->field_item_type['und'][0]['tid']); print $term->name; ?><span>|</span> 
	    									<?php print format_date(strtotime($obj_nodes[$key]->field_date['und'][0]['value']), 'custom', 'M. j, Y'); ?>
	    								</p>
	                                    <div class="save-icon hidden-xs node-<?php print $obj_nodes[$key]->nid ?>" data-nodeId="<?php print $obj_nodes[$key]->nid ?>">
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
	
<?php endif; ?>