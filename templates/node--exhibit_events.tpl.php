<?php
 global $base_path;
?>

<div class="menu-detail-area">
	<div class="container">
		<div class="header row">
            <div class="col-lg-8 col-lg-offset-2">
			    <h4>Explore the Exhibit</h4>
                <h1>Events</h1>
            </div>
		</div>
	
		<div class="row information-row">
			<div class="col-md-6 col-lg-5 col-lg-offset-2">
				<p><?php print $node->body['und'][0]['value'];?></p>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="menu pull-right">
					<ul>
						<li>
							<a href="<?php print $base_path; ?>exhibit/introduction">1. Introduction</a>
						</li>
						<li class="active">
							<a href="<?php print $base_path; ?>exhibit/events">2. Events</a>
						</li>	
						<li>
							<a href="<?php print $base_path; ?>exhibit/places">3. Places</a>
						</li>	
						<li>
							<a href="<?php print $base_path; ?>exhibit/people">4. People</a>
						</li>		
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>
	
<div class="timeline">
	<iframe src='http://cdn.knightlab.com/libs/timeline/latest/embed/index.html?source=0Agl_Dv6iEbDadHdKcHlHcTB5bzhvbF9iTWwyMmJHdkE&font=Bevan-PotanoSans&maptype=toner&lang=en&height=650' width='100%' height='650' frameborder='0'></iframe>
</div>
	

<div class="exhibit-sub-section">
	<div class="container">
		<div class="row">
		
			<div class="col-md-6">
				<div class="exhibit-sub-info">
					<p><?php print $node->field_exhibit_summary['und'][0]['value'];?></p>
				</div>
			</div>
			<div class="col-md-6">
				<?php 
                    $call_out = $node->field_exhibit_callout['und'][0]['entity'];
                    $call_out_type = $call_out->field_type['und'][0]['value'];
                ?>
				<?php if ( $call_out->body['und'][0]['value'] ): ?>
					
					<div class="callout pull-right" data-url="<?php print $call_out->field_link['und'][0]['value']; ?>">
						<p class="hashtag">
                            <?php if ( $call_out_type === 'twitter' ): ?>
                                <span class="glyphicon glyphicon-comment"></span> #rememberinglincoln
                            <?php elseif ( $call_out_type === 'youtube' ): ?>
                                <span class="glyphicon glyphicon-facetime-video"></span> Ford's Theatre on YouTube
                            <?php else: ?>
                                <span class="glyphicon glyphicon-book"></span> Ford's Theatre Blog
                            <?php endif; ?>
                        </p>
						<p class="message"><?php print $call_out->body['und'][0]['value']; ?></p>
					</div>
					
				<?php endif; ?>
			</div>

		</div>
	</div>
</div>
	
<div class="next-section-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-left">
					<h4 class="text-left">
						PREVIOUS
					</h4>
					<h2><a href="<?php print $base_path; ?>exhibit/introduction"><span>&#8592;</span> Introduction</a></h2>
				</div>
	
				<div class="pull-right">
					<h4 class="text-right">
						NEXT
					</h4>
					<h2><a href="<?php print $base_path; ?>exhibit/places">Places <span>&#8594;</span></a></h2>
				</div>
			</div>
		</div>
	</div>
</div>
	
