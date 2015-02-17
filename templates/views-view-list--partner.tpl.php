<?php
    $userid = $_GET['uid'];
    $user_info = user_load($userid);
  
    $query = new EntityFieldQuery();
    $query
    	->entityCondition('entity_type', 'node', '=')
    	->propertyCondition('type', 'object', '=')
    	->fieldCondition('field_contributor', 'target_id', $user_info->uid, '=');
    
    $entities = $query->execute();
    
    $obj_nodes = node_load_multiple(array_keys($entities['node']));
    global $base_path;
?>

<?php if($user_info): ?>

	<div class="partner-page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
                    <?php if($user_info->picture): ?>
						<img src="<?php print file_create_url($user_info->picture->uri); ?>" class="img-responsive" alt="<?php print $user_info->field_institution["und"][0]["value"]; ?>" />
					<?php endif; ?>
					<a href="<?php print $base_path; ?>partners" class="back-link">
						&laquo; Return to Partners List
					</a>
                    <h2><?php print $user_info->field_institution["und"][0]["value"]; ?></h2>
				</div>
			</div>
		</div>
	</div>


	<div class="partner-page">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<p class="lead">
						<?php print $user_info->field_description["und"][0]["value"]; ?>
					</p>
				</div>
	
				<div class="col-md-4">
					<ul>
						<?php if($user_info->field_website_url["und"][0]["value"]): ?>
							<li>
								<p class="header">
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
							<p class="header">
								Contact Information
							</p>
							<p class="detail"><?php print $user_info->field_contact_name["und"][0]["value"]; ?></p>
							<p class="detail"><?php print $user_info->field_contact_email["und"][0]["value"]; ?></p>
                            <p class="detail"><?php print $user_info->field_contact_phone["und"][0]["value"]; ?></p>
						</li>
                        <?php if($user_info->field_contact_address["und"][0]["value"]): ?>
                        <li>
							<p class="header">
								Address
							</p>
							<p class="detail"><?php print $user_info->field_contact_address["und"][0]["value"]; ?></p>
						</li>
                        <?php endif ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
    <?php if ($obj_nodes): ?>
	<div class="browse-items partner-items">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="posts" data-columns>
					
						<?php foreach($obj_nodes as $key => $object): ?>
							<?php if( isset($obj_nodes[$key]->field_file['und'][0]['filename'])): ?>
                            	
    							<div class="post">
    								<a href="<?php print url('node/' . $obj_nodes[$key]->nid, array('absolute' => TRUE)); ?>">
                                        <?php
                                            $preset = 'square';
                                            $src = $obj_nodes[$key]->field_file['und'][0]['uri'];
                                            $dst = image_style_path($preset, $src);
                                            $success = file_exists($dst) || image_style_create_derivative(image_style_load($preset), $src, $dst);
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
	<?php endif; ?>
<?php endif; ?>