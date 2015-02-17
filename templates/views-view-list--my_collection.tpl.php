<?php
	
	$ids = $_GET['ids'];
	$nodeids = explode(",", $ids);
	
	$nodes = node_load_multiple($nodeids);
	
	
	$email_link = "mailto:&subject=" . urlencode("Remembering Lincoln Response") . "&body=" . urlencode("Check out this response for the remembering lincoln collection, ") . urlencode(lincoln_current_url());
	$twitter_link = "http://twitter.com/share?text=Check out this collection&url=" . lincoln_current_url() . "&hashtags=rememberinglincoln";
	
	$random_curated_nodes = lincoln_get_curated_content();
	
?>

<div class="my-collection-header">
	<div class="container">

		<div class="pull-left">
			<h1>My Collection</h1>
		</div>

		<div class="options pull-right">
			<ul class="list-inline">
				<li>
                    <a href="javascript: window.print();"><span class="glyphicon glyphicon-print"></span> Print</a>
                </li>
				<li>
                    
                    <div class="dropdown">
	          							
                        <a href="javascript: void(0);" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-share-alt" ></span> Share
						</a>
						
						
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php print $email_link ?>">Email my collection</a></li>
                            <li role="presentation" class="divider"></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" target="_blank" href="<?php print $twitter_link ?>">Share on Twitter</a></li>
						</ul>
					</div>
                    
                </li>
			</ul>
		</div>

	</div>
</div>

<div class="browse-items">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="posts" data-columns>
					
					<?php foreach($nodes as $n): ?>
					
						<div class="post">
							<a href="<?php print url('node/' . $n->nid, array('absolute' => TRUE)); ?>">
								<img src="<?php print file_create_url($n->field_file['und'][0]['uri']); ?>" alt="<?php print $n->title;?>" />
							</a>
							<p class="title">
								<a href="<?php print url('node/' . $n->nid, array('absolute' => TRUE)); ?>">
									<?php print $n->title; ?>
								</a>
							</p>
							<p class="date">
								<?php print $n->field_item_type['und'][0]['taxonomy_term']->name;?> from
								<?php print format_date(strtotime($n->field_date['und'][0]['value']), 'custom', 'M. j, Y'); ?>
							</p>
							<div class="save-icon hidden-xs node-<?php print $n->nid ?>" data-nodeId="<?php print $n->nid ?>">
                                <span class="glyphicon glyphicon-remove-circle" title="Save this Object"></span>
        				    </div>
						</div>
						
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="gray-area">
	
	<div class="curated-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12 curated-header">
					<h1>
						Curated collections
                        <small><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=curated-collection" class="view-all">View all &raquo;</a></small>
					</h1>
				</div>
			</div>

			<div class="curated-row row">
				<?php foreach($random_curated_nodes as  $object): ?>
				<div class="col-md-4">
					<div class="curated-row-item">
                        <a href="<?php print url('node/' . $object->nid, array('absolute' => TRUE)); ?>">
    						<img src="<?php print file_create_url($object->field_image["und"][0]["uri"]); ?>" />
    						<h2><?php print $object->title; ?></h2>
    						<h4>Created by Ford's Theatre</h4>
                        </a>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		</div>

	</div>

</div>

<?php foreach($nodes as $n): ?>

<div class="print-view">
	<div class='category'>
	
		<p>
			<?php print $n->field_item_type['und'][0]['taxonomy_term']->name;?>
			from 
			<?php print format_date(strtotime($n->field_date['und'][0]['value']), 'custom', 'M. j, Y');?>
		</p>
		
		<h2>
			<?php print $n->title;?>
		</h2>
	</div>

	<div class="center">
		<div class="print-photo" style="width: 350px; /* text-align: center; */ margin: 20px auto;"> 
			<center>
				<img 
            				src="<?php print file_create_url($n->field_file['und'][0]['uri']); ?>" 
            				alt="<?php print $n->title;?>" 
            				width="325" 
            				class="img-responsive" 
            				alt="<?php print $n->title;?>" 
            			/>
			</center>
		</div>
	</div>

	<div class="details">
		<div class="col-md-6">
  				<ul class="list-inline">
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
	
	<div style="page-break-after:always"></div>
</div>
<?php endforeach; ?>


<script>
	$(document).ready(function(){
		function bookmark_collection() {
			
		}
	});
</script>