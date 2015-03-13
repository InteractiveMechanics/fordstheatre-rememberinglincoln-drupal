<?php
    $userid = $_GET['uid'];
    $user_info = user_load($userid);
  
    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'node')
	  ->entityCondition('bundle', 'object')
	  ->propertyCondition('uid', $userid)
	  ->propertyCondition('status', 1);
	      
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
						<img src="<?php print file_create_url($user_info->picture->uri); ?>" class="img-responsive hidden-xs" alt="<?php print $user_info->field_institution["und"][0]["value"]; ?>" />
					<?php endif; ?>
					<a href="<?php print $base_path; ?>contributors" class="back-link">
						&laquo; Return to Contributor List
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
									<a href="//<?php print $user_info->field_website_url["und"][0]["value"]; ?>" target="_blank">
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
                    <h2>Contributed Responses</h2>
					<div id="posts" data-columns>
					
						<?php foreach($obj_nodes as $key => $object): ?>
							
                            <?php $n = $obj_nodes[$key]; include('includes/inc-object-post.php'); ?>

						<?php endforeach; ?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>