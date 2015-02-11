<?php
	/** 
	*
	* Homepage Content type
	*
	*/
	
	$num_responses = lincoln_get_node_count('object');
	$random_curated_node = lincoln_get_random_node_type('curated_collection');
	$random_callout = lincoln_get_random_node_type('call_out');
	
?>

<div class="hero-unit homepage">
	<div class="jumbotron">
		<div class="hero-unit-message">
			<div class="row">
				<div class="col-md-6 pull-right">
					<h1>
						Exploring the <em>life</em>, <em>legacy</em>, and <em>memory</em> of Abraham Lincoln.
					</h1>
				</div>
			</div>
		</div> <!--./hero-unit-message-->
        <a href="#" class="scroll-down">&#8594;</a>
	</div><!--./jumbotron-->

    <div class="object fade-left-up"></div>
</div> <!--./hero-->


<div class="about-info">
    <div class="row">
    	<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
    		<p><?php print $node->field_homepage_message['und'][0]['value'];?></p>
    	</div>
    </div>
    <div class="text-center">
    	<a href="<?php global $base_path; print $base_path; ?>exhibit/introduction" class="btn btn-outline">
            Explore the Exhibit <span>&#8594;</span>
        </a>
    </div>
</div> <!--./about-info -->


<div class="blocks clearfix">
    <div class="block two">
	    
    </div>
    <div class="block"></div>
    <div class="block"></div>
    <div class="block hide-xs"></div>
    <div class="block hide-xs"></div>
    <div class="block hide-xs hide-md"></div>
    <div class="block hide-xs hide-sm hide-md"></div>
    <div class="block hide-xs hide-sm hide-md hide-lg"></div>
    <div class="block hide-xs hide-sm hide-md hide-lg"></div>
    <div class="block two"></div>
    <div class="block hide-xs hide-sm hide-md"></div>
    <div class="block two hide-xs hide-sm"></div>
    <div class="block hide-xs hide-sm"></div>
    <div class="block hide-xs hide-sm"></div>
    <div class="block hide-xs hide-sm hide-md hide-lg"></div>
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
