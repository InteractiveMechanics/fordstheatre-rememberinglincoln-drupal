<?php
	
	$ids = $_GET['ids'];
	$nodeids = explode(",", $ids);
	
	$nodes = node_load_multiple($nodeids);
?>

<div class="my-collection-header">

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="pull-left">
					<h1>My Collection</h1>
				</div>

				<div class="options pull-right">
					<ul class="list-inline">
						<li>
							<p><a href="javascript: void(0);">Print &nbsp;</a></p>
						</li>
						<li class="vertical-divider">&nbsp;</li>
						<li>
							<p><a href="javascript: void(0);">Share</a></p>
						</li>
					</ul>
				</div>
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
						
						<?php foreach($nodes as $n): ?>
						
							<div class="post">
								<a href="<?php print url('node/' . $n->nid, array('absolute' => TRUE)); ?>">
									<img src="http://placehold.it/280x400" />
								</a>
								<p class="title">
									<a href="<?php print url('node/' . $n->nid, array('absolute' => TRUE)); ?>">
										<?php print $n->title; ?>
									</a>
								</p>
								<p class="date">
									Flyer from
									<?php print format_date(strtotime($n->field_date['und'][0]['value']), 'custom', 'M. j, Y'); ?>
								</p>
								<div class="save-icon hidden-xs ">
									<img style="width:20px; height:20px;" src="/rememberinglincoln/themes/lincoln/assets/images/save-icon.png" alt="Save Icon" />
								</div>
							</div>
							
						<?php endforeach; ?>
					</div>

				</div>

			</div>

		</div>
	</div>

	<!--<div class="text-center">
		<div class="load-more" style="position: relative; bottom: -106px;">
			<a href="" class="btn btn-outline btn-gray"><em>Load more resources</em></a>
		</div>
	</div>-->
</div>

<div class="gray-area">

	<div class="curated-content">

		<div class="container">

			<div class="row">
				<div class="col-md-12 curated-header">
					<h1>
						Curated collections
					</h1>
					<p>
						<a href="javascript: void(0);">View all &raquo;</a>
					</p>
				</div>
			</div>

			<div class="curated-row row">
				<div class="col-md-4">
					<div class="curated-row-item">
						<img src="http://placehold.it/375x260" />
						<h2>Funeral Procession Artifacts</h2>
						<h4>
							Created by Ford's Theatre
						</h4>
					</div>
				</div>

				<div class="col-md-4">
					<div class="curated-row-item">
						<img src="http://placehold.it/375x260" />
						<h2>Funeral Procession Artifacts</h2>
						<h4>
							Created by Ford's Theatre
						</h4>
					</div>
				</div>

				<div class="col-md-4">
					<div class="curated-row-item">
						<img src="http://placehold.it/375x260" />
						<h2>Funeral Procession Artifacts</h2>
						<h4>
							Created by Ford's Theatre
						</h4>
					</div>
				</div>
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