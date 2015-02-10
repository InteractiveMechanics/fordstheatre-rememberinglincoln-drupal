<?php
	$node_wrapper = entity_metadata_wrapper('node', $node);
	$timelineData = entity_load('node', array($node->nid) );
	$node_data = $timelineData[ $node->nid ];
	 
	$wrapper = entity_metadata_wrapper('node', $node_data);
	$timelineCollection = field_get_items('node', $node_data, 'field_external_resources');
	
	$external_items = array();
 
	if( $timelineCollection ) {
	 
	  foreach( $timelineCollection as $index => $collection ) {
		$wrapper->field_external_resources[ $index ];
		$temp = array();
		
		$temp['title']  = $wrapper->field_external_resources[$index]->field_external_resources_title->value();
		$temp['url'] = $wrapper->field_external_resources[$index]->field_external_resources_url->value();
		
		array_push($external_items, $temp);

	  }
	}
?>

<div class="browse-header object-header">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4>
					<?php print $node->field_item_type['und'][0]['taxonomy_term']->name;?>
					from 
					<?php print format_date(strtotime($node->field_date['und'][0]['value']), 'custom', 'M. j, Y');?>
				</h4>
			</div>
		</div>

		<div class="row">

			<div class="col-md-12">

				<div class="header-details">
					<div class="title pull-left">
						<h1>
							<?php print $node->title;?>
						</h1>
					</div>

					<div class="hidden-xs hidden-sm pull-right">
						<div class="content-from-image">
							<img src="./images/washington.jpg" alt="Logo" />
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

</div> <!./browse-header-->

<div class="browse-details">

	<div class="container-fluid">
        <div class="row full-row">
          
        	<div class="col-md-6 dark-gray">
            	<div class="browse-photo">
            		<div class="photo">
            			<img 
            				src="<?php print file_create_url($node->field_file['und'][0]['uri']); ?>" 
            				alt="<?php print $node->title;?>" 
            				width="405" 
            				class="img-responsive" 
            				alt="Photo" 
            			/>
            			
            		</div>

					<?php if( file_create_url($node->field_file['und'][0]['uri']) ): ?>
	            		<div class="download-link pull-right">
	            			<p>
	            				<a href="<?php print file_create_url($node->field_file['und'][0]['uri']); ?>" target="_blank" download>
	            					Download image
	            				</a>
	            			</p>
	            		</div>
            		<?php endif; ?>
            		
            	</div>
          	</div>
          
          	<div class="col-md-6 gray-gradient">
          		<div class="row padding-row">

          			<div class="col-md-6">
          				<ul>
          					<?php if( $node->body['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Description
	          						</h4>
			  						
	          						<p>
	          							<?php print $node->body['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>
		  					
		  					<?php if( $node->field_source['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Source
	          						</h4>
	
	          						<p>
	          							<?php print $node->field_source['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>
		  					
		  					<?php if( $node->field_rights['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Rights
	          						</h4>
	
	          						<p>
	          							<?php print $node->field_rights['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>
		  					
		  					<?php if( $node->field_tags['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Tags
	          						</h4>
	
	          						<ul class="list-inline tags">
          								<li>
          									<h5>
          										<a href="javascript:void(0);">
          											tag name
		  										</a>
		  									</h5>
		  								</li>
	          						</ul>
	          					</li>
		  					<?php endif; ?>
		  				</ul>
          			</div>

          			<div class="col-md-6">
          				<ul>
          					<?php if( $node->field_subject['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Subject
	          						</h4>
			  						
	          						<p>
	          							<?php print $node->field_subject['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>

          					<?php if( $node->field_publisher['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Publisher
	          						</h4>
			  						
	          						<p>
	          							<?php print $node->field_publisher['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>

          					<?php if( $node->field_date['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Date
	          						</h4>
			  						
	          						<p>
	          							<?php print format_date(strtotime($node->field_date['und'][0]['value']), 'custom', 'F j, Y');?>
	          						</p>
	          					</li>
		  					<?php endif; ?>

          					<?php if( $node->field_material['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Material
	          						</h4>
			  						
	          						<p>
	          							<?php print $node->field_material['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>

          					<?php if( $node->field_object_dimensions['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Dimensions
	          						</h4>
			  						
	          						<p>
	          							<?php print $node->field_object_dimensions['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>
		  					
          					<?php if( $node->field_object_dimensions['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Region
	          						</h4>
			  						
	          						<p>
	          							<?php print $node->field_object_dimensions['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>
		  					
          					<li>
          						<div class="options">
          							<p>
          								<a href="javascript: void(0);">
          									Share
          								</a>
          							</p>

          							<p>
          								<a href="javascript: void(0);">
          									Print
          								</a>
          							</p>
          						</div>
          					</li>
          				</ul>
          			</div>

          		</div>

          		<div class="related-content hidden-xs">
          			<hr />

          			<h2>
          				Related resources
          			</h2>

          			<div class="related-items">
          				<ul>
          					<?php if( $external_items ): ?>
          						<?php foreach ($external_items as $item): ?>
	          						<li>
	          							<a href="<?php print $item['url'] ?>" target="_blank"><?php print $item['title'] ?></a>
			  						</li>
			  					<?php endforeach; ?>
			  				<?php endif; ?>
          				</ul>
          			</div>
          		</div>

          		<div class="bottom-from-image visible-xs visible-sm">
          			<div class="container">
          				<hr />
	          			<div class="text-center">
							<div class="content-from-image">
								<img src="./images/washington.jpg" alt="Logo" />
							</div>
						</div>
          			</div>
          		</div>
         	</div>
        </div>
  	</div>

</div> <!--./browse-details-->

<div class="print-view">
	<div class='category'>
	
		<p>
			<?php print $node->field_item_type['und'][0]['taxonomy_term']->name;?>
			from 
			<?php print format_date(strtotime($node->field_date['und'][0]['value']), 'custom', 'M. j, Y');?>
		</p>
		
		<h2>
			<?php print $node->title;?>
		</h2>
	</div>

	<div class="center">
		<div class="print-photo" style="width: 350px; /* text-align: center; */ margin: 20px auto;"> 
			<center>
				<img 
            				src="<?php print file_create_url($node->field_file['und'][0]['uri']); ?>" 
            				alt="<?php print $node->title;?>" 
            				width="325" 
            				class="img-responsive" 
            				alt="<?php print $node->title;?>" 
            			/>
			</center>
		</div>
	</div>

	<div class="details">
		<div class="col-md-6">
  				<ul class="list-inline">
  					<?php if( $node->body['und'][0]['value'] ): ?>
      					<li>
      						<h4 class="title">
      							Description
      						</h4>
	  						
      						<p>
      							<?php print $node->body['und'][0]['value'];?>
      						</p>
      					</li>
  					<?php endif; ?>

  					<?php if( $node->field_source['und'][0]['value'] ): ?>
      					<li>
      						<h4 class="title">
      							Source
      						</h4>

      						<p>
      							<?php print $node->field_source['und'][0]['value'];?>
      						</p>
      					</li>
  					<?php endif; ?>
  					
  					<?php if( $node->field_rights['und'][0]['value'] ): ?>
      					<li>
      						<h4 class="title">
      							Rights
      						</h4>

      						<p>
      							<?php print $node->field_rights['und'][0]['value'];?>
      						</p>
      					</li>
  					<?php endif; ?>

  					<?php if( $node->field_subject['und'][0]['value'] ): ?>
      					<li>
      						<h4 class="title">
      							Subject
      						</h4>
	  						
      						<p>
      							<?php print $node->field_subject['und'][0]['value'];?>
      						</p>
      					</li>
  					<?php endif; ?>

  					<?php if( $node->field_publisher['und'][0]['value'] ): ?>
      					<li>
      						<h4 class="title">
      							Publisher
      						</h4>
	  						
      						<p>
      							<?php print $node->field_publisher['und'][0]['value'];?>
      						</p>
      					</li>
  					<?php endif; ?>

  					<?php if( $node->field_date['und'][0]['value'] ): ?>
      					<li>
      						<h4 class="title">
      							Date
      						</h4>
	  						
      						<p>
      							<?php print format_date(strtotime($node->field_date['und'][0]['value']), 'custom', 'F j, Y');?>
      						</p>
      					</li>
  					<?php endif; ?>

  					<?php if( $node->field_material['und'][0]['value'] ): ?>
      					<li>
      						<h4 class="title">
      							Material
      						</h4>
	  						
      						<p>
      							<?php print $node->field_material['und'][0]['value'];?>
      						</p>
      					</li>
  					<?php endif; ?>

  					<?php if( $node->field_object_dimensions['und'][0]['value'] ): ?>
      					<li>
      						<h4 class="title">
      							Dimensions
      						</h4>
	  						
      						<p>
      							<?php print $node->field_object_dimensions['und'][0]['value'];?>
      						</p>
      					</li>
  					<?php endif; ?>
  					
  					<?php if( $node->field_object_dimensions['und'][0]['value'] ): ?>
      					<li>
      						<h4 class="title">
      							Region
      						</h4>
	  						
      						<p>
      							<?php print $node->field_object_dimensions['und'][0]['value'];?>
      						</p>
      					</li>
  					<?php endif; ?>
  				</ul>
  			</div>

  		</div>
	</div>
	
	<div style="page-break-after:always"></div>
</div>