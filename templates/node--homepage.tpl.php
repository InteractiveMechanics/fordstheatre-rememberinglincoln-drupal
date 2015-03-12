<?php
	/** 
	*
	* Homepage Content type
	*
	*/
	
	$num_responses = lincoln_get_node_count('object');
	$random_curated_node = lincoln_get_random_node_type('curated_collection', 1);
	$random_callout = lincoln_get_random_node_type('call_out', 1);
	
	$random_objects = lincoln_get_random_objects();
	
	shuffle($random_objects);
	shuffle($random_curated_node);
	
	global $base_path; 
?>

<div class="hero-unit homepage">
	<div class="jumbotron">
		<div class="hero-unit-message">
			<div class="row">
				<div class="col-md-6 pull-right">
					<h1>
						<?php print $node->field_hero_unit_message['und'][0]['value'];?>
					</h1>
				</div>
			</div>
		</div> <!--./hero-unit-message-->
	</div><!--./jumbotron-->
    <a href="#explore-the-story" class="scroll-down">&#8594;</a>
    <div class="overlay"></div>

    <div class="object object-letter"><img src="<?php print $base_path; ?>themes/lincoln/assets/images/homepage_letter.png" /></div>
    <div class="object object-diary"><img src="<?php print $base_path; ?>themes/lincoln/assets/images/homepage_diary.png" /></div>
    <div class="object object-newspaper"><img src="<?php print $base_path; ?>themes/lincoln/assets/images/homepage_newspaper.png" /></div>
    <div class="object object-ribbon"><img src="<?php print $base_path; ?>themes/lincoln/assets/images/homepage_ribbon.png" /></div>
    <div class="object object-poster"><img src="<?php print $base_path; ?>themes/lincoln/assets/images/homepage_poster.png" /></div>
</div> <!--./hero-->


<div id="explore-the-story" class="about-info">
    <div class="row">
    	<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
    		<p><?php print $node->field_homepage_message['und'][0]['value'];?></p>
    	</div>
    </div>
    <div class="text-center">
    	<a href="<?php print $base_path; ?>exhibit/introduction" class="btn btn-outline">
            Explore the Story <span>&#8594;</span>
        </a>
    </div>
</div> <!--./about-info -->



<div class="blocks clearfix">
    <div class="block two block-number" data-url="<?php print url('browse'); ?>">
	    <h2><?php print $num_responses; ?></h2>
	    <p>Responses</p>
        <div class="overlay"></div>
    </div>
    
    <?php foreach($random_objects as $key => $object): ?>
        <?php if( $key < 12 ): ?>
            <?php
                $preset = 'square';
                $src = $random_objects[$key]->field_file['und'][0]['uri'];
                $dst = image_style_path($preset, $src);
                $success = file_exists($dst) || image_style_create_derivative(image_style_load($preset), $src, $dst);
            ?>        	

        	<div 
                class="block 
                    <?php if ($key > 1){ echo ' hide-xs'; } ?>
                    <?php if ($key > 4){ echo ' hide-sm'; } ?>
                    <?php if (($key > 3 && $key < 9) || ($key == 11)){ echo ' hide-md'; } ?>
                    <?php if (($key > 5 && $key < 8) || ($key == 11)){ echo ' hide-lg'; } ?>
                " 
                style="background: url(<?php print file_create_url($dst); ?>); background-size: cover;" 
                data-url="<?php print url('node/' . $random_objects[$key]->nid, array('absolute' => TRUE)); ?>">
                <h2 class="hidden"><?php print format_date(strtotime($random_objects[$key]->field_date['und'][0]['value']), 'custom', 'Y'); ?></h2>
    	   		<p class="hidden"><?php print lincoln_taxonomy_term_load($random_objects[$key]->field_item_type['und'][0]['tid']); ?></p>
                <div class="save-icon hidden-xs node-<?php print $random_objects[$key]->nid ?>" data-nodeId="<?php print $random_objects[$key]->nid ?>">
                    <span class="glyphicon glyphicon-remove-circle" title="Save this Object"></span>
                </div>
                <div class="overlay"></div>
            </div>
            <?php if ($key == 7): ?>
                <?php if($random_callout): ?>
            		<?php $call_out_type = $random_callout->field_callout_type['und'][0]['value']; ?> 
            	    <div class="block two block-callout" data-url="<?php print $random_callout->field_link['und'][0]['value']; ?>">
                        <p class="hashtag">
                			<?php if ( $call_out_type === 'twitter' ): ?>
                	            <span class="glyphicon glyphicon-comment"></span> #rememberinglincoln
                	        <?php elseif ( $call_out_type === 'youtube' ): ?>
                	            <span class="glyphicon glyphicon-facetime-video"></span> Ford's Theatre on YouTube
                	        <?php else: ?>
                	            <span class="glyphicon glyphicon-book"></span> Ford's Theatre Blog
                	        <?php endif; ?>
                        </p>
            			<p class="message"><?php print $random_callout->body['und'][0]['value']; ?></p>    
            	    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($key == 8): ?>
                <div class="block two block-curated hide-xs hide-sm" data-url="<?php print url('node/' . $random_curated_node->nid, array('absolute' => TRUE)); ?>">
        	    	<h2>Curated Collection</h2>  
        			<p><?php print $random_curated_node->title; ?></p>
            	</div>
            <?php endif; ?> 
        <?php endif; ?>
    <?php endforeach; ?>
    
</div> <!--./blocks -->


<div class="homepage-blog-section">
	<div class="container">
		
		<h2>From the Blog 
            <small><a href="http://blog.fords.org/category/remembering-lincoln/" class="view-all" target="_blank">View all &raquo;</a></small>
        </h2>
        <div class="row">
            <?php
                $feed = file_get_contents('http://blog.fords.org/category/remembering-lincoln/feed/');
                $feed_array = new SimpleXmlElement($feed);
                $f = 0;
            ?>
            <?php foreach ($feed_array->channel->item as $blog): $f++; ?>
                <?php if ($f <= 3): ?>

                    <div class="col-sm-6 col-md-4 <?php if ($f > 1){ echo 'hidden-xs '; } ?><?php if ($f > 2){ echo 'hidden-sm'; } ?>">
                        <div class="recent-blog-item">
                            <h4 class="date"><?php echo date("F j, Y", strtotime($blog->pubDate)); ?></h4>
                            <p class="lead">
                                <a href="<?php echo $blog->link; ?>" target="_blank">
                                    <?php echo $blog->title; ?>
						        </a>
					        </p>
                            <a href="<?php echo $blog->link; ?>" target="_blank">Read article &raquo;</a>
				        </div>
			        </div>

                <?php endif; ?>
            <?php endforeach; ?>
		</div>

	</div> <!--./container -->
</div> <!--./homepage-blog-section -->


<script type="text/javascript">

	$(document).ready(function(){
		$('.blocks .block').click(function(){
			window.location.href = $(this).data('url');
		}).find('.save-icon').click(function(e){
            return false;
        });
	});

</script>
