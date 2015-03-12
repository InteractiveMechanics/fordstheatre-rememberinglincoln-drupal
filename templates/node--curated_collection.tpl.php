<?php
	/*
	*
	*
	*
	*/
?>

<div class="my-collection-header">

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<h1><?php print $node->title; ?></h1>
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
					
						<?php foreach( $node->field_objects["und"] as $obj): ?>
						
                            <?php $n = $obj["entity"]; include('includes/inc-object-post.php'); ?>
                            
						<?php endforeach; ?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>