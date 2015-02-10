<?php
	
?>

<div class="menu-detail-area">

	<div class="container">
	
		<div class="row header-row">
	
			<div class="col-md-12">
	
				<h4>
					Explore the exhibit
				</h4>
	
				<h1 class="lead">
					Events
				</h1>
	
			</div>
	
		</div>
	
		<div class="row information-row">
	
			<div class="col-md-8 ">
				<p>
					<?php print $node->body['und'][0]['value'];?>
				</p>
			</div>
	
			<div class="col-md-4">
	
				<div class="menu">
	
					<ul>
						<li>
							<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/366">
								1. Introduction
							</a>
						</li>
						<li class="active">
							<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/367">
								2. Events
							</a>
						</li>	
						<li>
							<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/369">
								3. Places
							</a>
						</li>	
						<li>
							<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/368">
								4. People
							</a>
						</li>		
					</ul>
	
				</div>
	
			</div>
	
		</div>
	
	</div>
	
	</div>
	
	<div class="map-area">
	
	<div id="map"></div>
	
	
	</div>
	

<div class="people-sub-section">

	<div class="container">
		
		<div class="row">
		
			<div class="col-md-6">
				
				<div class="people-sub-info">
					<p>
						<?php print $node->field_exhibit_summary['und'][0]['value'];?>
					</p>
				</div>

			</div>

			<div class="col-md-6">
				<?php 
					$call_out = $node->field_exhibit_callout['und'][0]['entity'];
				?>
				
				<?php if ( $call_out->body['und'][0]['value'] ): ?>
					
					<div class="social-card" data-url="<?php print $call_out->field_link['und'][0]['value']; ?>">
						<p class="hashtag">
							#<?php print $call_out->name; ?>
						</p>

						<p class="message">
							<?php print $call_out->body['und'][0]['value']; ?>
						</p>
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
					<h4 class="left">
						PREVIOUS
					</h4>
					<h2><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/366">&#8592; Introduction</a></h2>
				</div>
	
				<div class="pull-right">
					<h4 class="right">
						NEXT
					</h4>
					<h2><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/369">Places &#8594;</a></h2>
				</div>
			</div>
		</div>
	</div>
	
	</div>
	
