<?php
	
	$ids = $_GET['ids'];
	$nodeids = explode(",", $ids);
	
	$nodes = node_load_multiple($nodeids);
?>

<?php foreach($nodes as $n): ?>

<div class="browse-header object-header">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4>
					<?php print $n->field_item_type['und'][0]['taxonomy_term']->name;?>
					from 
					<?php print format_date(strtotime($n->field_date['und'][0]['value']), 'custom', 'M. j, Y');?>
				</h4>
			</div>
		</div>

		<div class="row">

			<div class="col-md-12">

				<div class="header-details">
					<div class="title pull-left">
						<h1>
							<?php print $n->title;?>
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
            				src="<?php print file_create_url($n->field_file['und'][0]['uri']); ?>" 
            				alt="<?php print $n->title;?>" 
            				width="405" 
            				class="img-responsive" 
            				alt="Photo" 
            			/>
            			
            		</div>
            		
            	</div>
          	</div>
          
          	<div class="col-md-6 gray-gradient">
          		<div class="row padding-row">

          			<div class="col-md-6">
          				<ul>
          					<?php if( $n->body['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Description
	          						</h4>
			  						
	          						<p>
	          							<?php print $n->body['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>
		  					
		  					<?php if( $n->field_source['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Source
	          						</h4>
	
	          						<p>
	          							<?php print $n->field_source['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>
		  					
		  					<?php if( $n->field_rights['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Rights
	          						</h4>
	
	          						<p>
	          							<?php print $n->field_rights['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>
		  					
		  					<?php if( $n->field_tags['und'][0]['value'] ): ?>
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
          					<?php if( $n->field_subject['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Subject
	          						</h4>
			  						
	          						<p>
	          							<?php print $n->field_subject['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>

          					<?php if( $n->field_publisher['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Publisher
	          						</h4>
			  						
	          						<p>
	          							<?php print $n->field_publisher['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>

          					<?php if( $n->field_date['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Date
	          						</h4>
			  						
	          						<p>
	          							<?php print format_date(strtotime($n->field_date['und'][0]['value']), 'custom', 'F j, Y');?>
	          						</p>
	          					</li>
		  					<?php endif; ?>

          					<?php if( $n->field_material['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Material
	          						</h4>
			  						
	          						<p>
	          							<?php print $n->field_material['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>

          					<?php if( $n->field_object_dimensions['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Dimensions
	          						</h4>
			  						
	          						<p>
	          							<?php print $n->field_object_dimensions['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>
		  					
          					<?php if( $n->field_object_dimensions['und'][0]['value'] ): ?>
	          					<li>
	          						<h4 class="title">
	          							Region
	          						</h4>
			  						
	          						<p>
	          							<?php print $n->field_object_dimensions['und'][0]['value'];?>
	          						</p>
	          					</li>
		  					<?php endif; ?>
		  					
          				</ul>
          			</div>

          		</div>

         	</div>
        </div>
  	</div>

</div> <!--./browse-details-->

<?php endforeach; ?>