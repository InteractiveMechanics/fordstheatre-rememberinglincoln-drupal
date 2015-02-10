<?php

?>
<pre>
	<?php
		 $subjects = array();
		 $objects = array();
		 foreach ($view->result as $delta => $item)
		 {
		 	$browse_obj = $view->result[$delta]->field_field_item_type[0]['raw']['taxonomy_term']->name;
		 	$subject = $view->result[$delta]->_field_data['nid']['entity']->field_subject['und'][0]['value'];
		 	
		 	array_push($subjects, $subject);
		 	array_push($objects, $browse_obj);
		 }
		 
		 $subjects = array_unique($subjects);
		 $objects = array_unique($objects);
	?>
</pre>

<div class="browse-header">
	<div class="browse-search-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Browse responses</h1>
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
						    	<input autocomplete="off" type="text" class="form-control" id="exampleInputEmail2" placeholder="Search collection">
						  	</div>
						  
						  	<div class="form-group">
						  		<select class="form-control" style="width:125px; text-align:center;" >
									<option value="-1">Object Type</option>
									<?php foreach($objects as $o): ?>
										<?php if($o): ?>
											<option value="<?php print $o ?>"><?php print $o ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
						  	</div>
	
						  	<div class="form-group hidden-xs">
						   		<select class="form-control" style="width:100px; text-align:center;" >
						   			<option value="-1">Region</option>
						   		</select>
						  	</div>
	
						  	<div class="form-group hidden-xs">
						    	<select class="form-control" style="width:100px; text-align:center;" >
									<option value="-1">Subject</option>
									<?php foreach($subjects as $s): ?>
										<?php if($s): ?>
											<option value="<?php print $s; ?>"><?php print $s; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
						  	</div>
						  
						  	<button type="submit" class="btn hidden-xs btn-reset">Reset filters</button>
	
						</form>
	
					</div>
	
					<div class="pull-right">
	
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
					
						<?php foreach ($view->result as $delta => $item): ?>
							<div class="post">
								<a href="<?php print url('node/' . $view->result[$delta]->_field_data['nid']['entity']->nid, array('absolute' => TRUE)); ?>">
									
									<?php if( isset($view->result[$delta]->_field_data['nid']['entity']->field_file['und'])): ?>
										<!--<img 
											src="<?php print file_create_url($view->result[$delta]->_field_data['nid']['entity']->field_file['und'][0]['uri']); ?>" 
				            				alt="<?php print $view->result[$delta]->_field_data['nid']['entity']->title;?>" 
				            				width="331" 
				            				class="img-responsive" 
				            				alt="<?php print $view->result[$delta]->_field_data['nid']['entity']->title;?>"
										/>-->
										<img src="http://placehold.it/380x300" alt="<?php print $view->result[$delta]->_field_data['nid']['entity']->title;?>" />
									<?php else: ?>
										<img src="http://placehold.it/380x300" alt="<?php print $view->result[$delta]->_field_data['nid']['entity']->title;?>" />
									<?php endif; ?>
								</a>
								
								<p class="title">
									<a href="<?php print url('node/' . $view->result[$delta]->_field_data['nid']['entity']->nid, array('absolute' => TRUE)); ?>">
										<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>
									</a>
								</p>
								<p class="date">
									from
									<?php print format_date(strtotime($view->result[$delta]->_field_data['nid']['entity']->field_date['und'][0]['value']), 'custom', 'M. j, Y'); ?>
								</p>
								<div class="save-icon hidden-xs" data-nodeId="<?php print $view->result[$delta]->_field_data['nid']['entity']->nid ?>">
									<img style="width:20px; height:20px;" src="/rememberinglincoln/themes/lincoln/assets/images/save-icon.png" alt="Save Icon" />
								</div>
							</div>
						<?php endforeach; ?>
					
					</div>

				</div>

			</div>

		</div>
	</div>

	<div class="text-center">
		<div class="load-more" style="position: relative; bottom: -106px;">
			<a href="" class="btn btn-outline btn-gray"><em>Load more resources</em></a>
		</div>
	</div>
</div>

<script type="text/javascript">

	/*function addToStorage(node_id) {

	    if ("localStorage" in window) {
	    	var json = localStorage.getItem('remembering_lincoln');
	    	var arr = [];
	    	
	    	if(json) {
	    		arr = JSON.parse(json);
	    		arr.push(node_id);
	    	} else {
	    		var arr = new Array();
	    		arr.push(node_id);
	    	}

	        localStorage.setItem('remembering_lincoln', JSON.stringify(arr));
	        updateCollectionHTML(arr);
	    }

	}

	function removeFromStorage(node_id) {
	    
	    if ("localStorage" in window) {
	        if (localStorage.length > 0) {
	        	var json = localStorage.getItem('remembering_lincoln');
	        	
	        	if(json) {
	        		var arr = new Array();
	        		
	        		arr = JSON.parse(json);
	        		arr.pop(node_id);

		            localStorage.setItem('remembering_lincoln', JSON.stringify(arr));
	        	}

	        	
	        }
	    }
	
	}
	
	function updateCollectionHTML(arr) {
		var collection_count = arr.length;
		
		if(collection_count > 0){
			$('.collection-number').html("<p>" + collection_count + "</p>");
			$('.collection-list').addClass('collection-has-items');
		}
		
		updateLinks();
	}
	
	function updateLinks(arr) {
		var ids = arr.join(",")
		var url = "http://staging.interactivemechanics.com/rememberinglincoln/?q=my-collection&id=" + ids;
		
		$('.collection-has-items').attr("data-url", url);
	}

	$(document).ready(function(){
		
		$('div.post .save-icon').click(function(){
			var type = $(this).data('nodeid');
			console.log(type);

			addToStorage(type);
		});
		
		$('collection-has-items').click(function(){
			var url = $(this).data(url);
			window.location.href = url;
		});
		
	});*/
	
</script>

