<?php
	 $subjects = array();
	 $tags = array();
	 
	 $objects = array();
	 $node_arr = lincoln_get_all_of_type('object');
	 
	 $vocabulary = taxonomy_vocabulary_machine_name_load('Tags');
     $terms = taxonomy_get_tree($vocabulary->vid, 0, NULL, FALSE);
	 
	 foreach($terms as $term) {
		 array_push($tags, $term->name);
	 }

	 foreach ($node_arr as $value) {
	 	$browse_obj = lincoln_taxonomy_term_load($value->field_item_type['und'][0]['tid']) . "|" . $value->field_item_type['und'][0]['tid'];
	 	array_push($objects, $browse_obj);
	 }
	 
	 $tags = array_unique($tags);
	 $objects = array_unique($objects);
	 
	 $vocabulary = taxonomy_vocabulary_machine_name_load('Regions');
	 $regions = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));

    global $base_path;
?>

<div class="browse-header">
	<div class="browse-search-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Browse Responses 
                        <small><a href="<?php print $base_path; ?>curated-collection" class="view-all">View Curated Collections &raquo;</a></small>
                    </h1>
				</div>
			</div>
		</div>
	</div>
	
	<div class="browse-search">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<div class="pull-left">
	
						<form class="form-inline">
						  
						  	<div class="form-group">
						    	<input autocomplete="off" type="text" class="form-control title_input" id="exampleInputEmail2" placeholder="Search responses">
						  	</div>
						  
						  	<div class="form-group hidden-xs">
						  		<select class="form-control item_type_drop_down form-control-select">
									<option value="" class="all item-type-select" name="item_type[]">All Item Types</option>
									<!--<?php foreach($objects as $o): ?>
										<?php if($o): ?>
											<?php $elements = explode("|", $o); ?>
											<?php if($elements[0]): ?>
												<option value="<?php print $elements[1] ?>"><?php print $elements[0] ?></option>
											<?php endif; ?>
										<?php endif; ?>
									<?php endforeach; ?>-->
								</select>
						  	</div>
	
						  	<div class="form-group hidden-xs hidden-sm">
						   		<select class="form-control region_drop_down form-control-select">
						   			<option value="" class="all">All Regions</option>
						   			<!--<?php foreach($regions as $r): ?>
						   				<option value="<?php print $r->tid; ?>"><?php print $r->name; ?></option>
						   			<?php endforeach; ?>-->
						   		</select>
						  	</div>
	
						  	<div class="form-group hidden-xs">
						    	<select class="form-control subject_drop_down form-control-select">
									<option value="" class="all">All Tags</option>
									<!--<?php foreach($tags as $t): ?>
										<?php if($t && (($t == 'Topic') || ($t == 'Person'))): ?>
											<option value="<?php print $t; ?>" class="header"><?php print $t; ?></option>
                                        <?php else: ?>
                                            <option value="<?php print $t; ?>">&nbsp;&nbsp;<?php print $t; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>-->
								</select>
						  	</div>
						  
						  	<button class="btn btn-go">Search</button>
						  	
						  	<button class="btn hidden-xs btn-reset">Reset</button>
	
						</form>
	
					</div>
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
					    <?php if ($view->result): ?>
    						<?php foreach ($view->result as $delta => $item): ?>
                                <?php $n = $view->result[$delta]->_field_data['nid']['entity']; include('includes/inc-object-post.php'); ?>
    						<?php endforeach; ?>
                        <?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="text-center hidden">
		<div class="load-more" >
			<a href="" class="btn btn-outline btn-gray"><em>Load more resources</em></a>
		</div>
	</div>
</div>


<script type="text/javascript">
	$('.site-wrapper .navbar-inverse.navbar .navbar-nav > li:eq(1)').addClass('active');	
</script>