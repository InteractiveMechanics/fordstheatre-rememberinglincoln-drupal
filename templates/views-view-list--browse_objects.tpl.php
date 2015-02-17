<?php
	 $subjects = array();
	 $objects = array();
	 $node_arr = lincoln_get_all_of_type('object');
	 
	 foreach ($node_arr as $value) {
	 	$browse_obj = lincoln_taxonomy_term_load($value->field_item_type['und'][0]['tid']) . "|" . $value->field_item_type['und'][0]['tid'];
	 	$subject = $value->field_subject['und'][0]['value'];
	 	
	 	array_push($subjects, $subject);
	 	array_push($objects, $browse_obj);
	 }
	 
	 $subjects = array_unique($subjects);
	 $objects = array_unique($objects);
	 
	 $vocabulary = taxonomy_vocabulary_machine_name_load('Regions');
	 $regions = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));
?>

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
						    	<input autocomplete="off" type="text" class="form-control title_input" id="exampleInputEmail2" placeholder="Search collection">
						  	</div>
						  
						  	<div class="form-group">
						  		<select class="form-control item_type_drop_down" style="width:125px; text-align:center;" >
									<option value="">Object Type</option>
									<?php foreach($objects as $o): ?>
										<?php if($o): ?>
											<?php $elements = explode("|", $o); ?>
											<?php if($elements[0]): ?>
												<option value="<?php print $elements[1] ?>"><?php print $elements[0] ?></option>
											<?php endif; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
						  	</div>
	
						  	<div class="form-group hidden-xs">
						   		<select class="form-control region_drop_down" style="width:100px; text-align:center;" >
						   			<option value="">Region</option>
						   			<?php foreach($regions as $r): ?>
						   				<option value="<?php print $r->tid; ?>"><?php print $r->name; ?></option>
						   			<?php endforeach; ?>
						   		</select>
						  	</div>
	
						  	<div class="form-group hidden-xs">
						    	<select class="form-control subject_drop_down" style="width:100px; text-align:center;" >
									<option value="">Subject</option>
									<?php foreach($subjects as $s): ?>
										<?php if($s): ?>
											<option value="<?php print $s; ?>"><?php print $s; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
						  	</div>
						  
						  	<button class="btn btn-reset btn-go">Filter</button>
						  	
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
					
						<?php foreach ($view->result as $delta => $item): ?>
                            <?php if( isset($view->result[$delta]->_field_data['nid']['entity']->field_file['und'][0]['uri'])): ?>
                            	
    							<div class="post">
    								<a href="<?php print url('node/' . $view->result[$delta]->_field_data['nid']['entity']->nid, array('absolute' => TRUE)); ?>">
                                        <?php
                                            $preset = 'square';
                                            $src = $view->result[$delta]->_field_data['nid']['entity']->field_file['und'][0]['uri'];
                                            $dst = image_style_path($preset, $src);
                                            $success = file_exists($dst) || image_style_create_derivative(image_style_load($preset), $src, $dst);
                                        ?>
                                        
										<img src="<?php print file_create_url($dst); ?>" alt="<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>" />    									
    								</a>
    								
    								<p class="title">
    									<a href="<?php print url('node/' . $view->result[$delta]->_field_data['nid']['entity']->nid, array('absolute' => TRUE)); ?>">
    										<?php print $view->result[$delta]->_field_data['nid']['entity']->title; ?>
    									</a>
    								</p>
    								<p class="date">
                                        <?php $term = taxonomy_term_load($view->result[$delta]->_field_data['nid']['entity']->field_item_type['und'][0]['tid']); print $term->name; ?><span>|</span> 
    									<?php print format_date(strtotime($view->result[$delta]->_field_data['nid']['entity']->field_date['und'][0]['value']), 'custom', 'M. j, Y'); ?>
    								</p>
                                    <div class="save-icon hidden-xs" data-nodeId="<?php print $view->result[$delta]->_field_data['nid']['entity']->nid ?>">
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

	<div class="text-center">
		<div class="load-more" style="position: relative; bottom: -106px;">
			<a href="" class="btn btn-outline btn-gray"><em>Load more resources</em></a>
		</div>
	</div>
</div>


<script type="text/javascript">
	
	$(document).ready(function(){
		
		/*$('.item_type_drop_down').on('change', function() {
			var path = window.location.origin + window.location.pathname + "?item_type[]=" + this.value;
			window.location.href = path;
		});
		
		$('.subject_drop_down').on('change', function() {
			var path = window.location.origin + window.location.pathname + "?subject=" + this.value;
			window.location.href = path;
		});*/
		
		$('.btn-go').click(function(e){
			e.stopPropagation();
			e.preventDefault();
			e.stopImmediatePropagation();
			
			var path = window.location.origin + window.location.pathname;
			
			var title = $('.title_input').val();
			var object = $('.item_type_drop_down').val();
			var region = $('.region_drop_down').val();
			var subject = $('.subject_drop_down').val();
			
			if(title) {
				if (containsQuestionMark(path)) {
					path += "&title=" + title;
				} else {
					path += "?title=" + title;
				}
			}
			
			if(object) {
				if (containsQuestionMark(path)) {
					path += "&item_type[]=" + object;
				} else {
					path += "?item_type[]=" + object;
				}
			}
			
			if(region) {
				if (containsQuestionMark(path)) {
					path += "&region[]=" + region;
				} else {
					path += "?region[]=" + region;
				}
			}
			
			if(subject) {
				if (containsQuestionMark(path)) {
					path += "&subject=" + subject;
				} else {
					path += "?subject=" + subject;
				}
			}
			
			window.location.href = path;
			
		});
		
		$('.btn-reset').click(function(e){
			e.stopPropagation();
			e.preventDefault();
			e.stopImmediatePropagation();
			
			var path = window.location.origin + window.location.pathname;
			window.location.href = path;
		});	
		
		function containsQuestionMark(str) {
			return str.indexOf("?") > 0;
		}
	
		
		function getParameterByName(name) {
		    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		        results = regex.exec(location.search);
		    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
		}
		
		function populateParams() {
			var title = getParameterByName('title');
			var object = getParameterByName('item_type[]');
			var region = getParameterByName('region[]');
			var subject = getParameterByName('subject');
			
			if(title) {
				$('.title_input').val(title);
			}
			
			if(object) {
				$(".item_type_drop_down option[value='" + object +"']").attr('selected', 'selected');
			}
			
			if(region) {
				$(".region_drop_down option[value='" + region +"']").attr('selected', 'selected');
			}
			
			if(subject) {
				console.log($(".subject_drop_down option[value='" + subject +"']").attr('selected', 'selected'));
			}
		}
		
		if( containsQuestionMark( window.location.href ) ) {
			populateParams();
		}
	});
	
</script>