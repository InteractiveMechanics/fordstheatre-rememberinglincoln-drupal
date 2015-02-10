<?php

?>
<div class="hero">

	<div class="jumbotron">

		<div class="hero-unit-message">
			<div class="container">
				<div class="row">
					<div class="col-md-6 pull-right">
						<h1>
							Exploring the <em>life</em>, <em>legacy</em>, and <em>memory</em> of Abraham Lincoln.
						</h1>
					</div>
				</div>
			</div>
		</div> <!--./herp-unit-message-->
		
	</div><!--./jumbotron-->
	
</div> <!--./hero-->

<div class="introduction-info">

	<div class="container">
		
		<div class="row">

			<div class="col-md-6">
				<p>
					<?php print $node->body['und'][0]['value'];?>
				</p>
			</div>

			<div class="col-md-6">
				<blockquote>
					<?php print $node->field_exhibit_intro_quote['und'][0]['value'];?>
				</blockquote>
			</div>

		</div>

	</div>

</div>

<div class="introduction-sub-section">

	<div class="container">
		
		<div class="row text-center">
			<div class="col-md-4 text-left">
				
				<div class="sub-section-item">
					
					<div class="sub-section-image">
						<img src="<?php print file_create_url($node->field_exhibit_intro_event_image['und'][0]['uri']); ?>" alt="Intro Image" />
					</div>

					<h2 class="lead">
						<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/367">
							Events
						</a>
					</h2>

					<p>
						<?php print $node->field_exhibit_intro_event_body['und'][0]['value'];?>
					</p>
				</div>

			</div>

			<div class="col-md-4 text-left">
				
				<div class="sub-section-item">
					
					<div class="sub-section-image">
						<img src="<?php print file_create_url($node->field_exhibit_intro_place_image['und'][0]['uri']); ?>" alt="Places Image" />
					</div>

					<h2 class="lead">
						<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/369">
							Places
						</a>
					</h2>

					<p>
						<?php print $node->field_exhibit_intro_place_body['und'][0]['value'];?>
					</p>
				</div>
				
			</div>

			<div class="col-md-4 text-left">
				
				<div class="sub-section-item">
					
					<div class="sub-section-image">
						<img src="<?php print file_create_url($node->field_exhibit_intro_people_image['und'][0]['uri']); ?>" alt="People Image" />
					</div>

					<h2 class="lead">
						<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/368">
							People
						</a>
					</h2>

					<p>
						<?php print $node->field_exhibit_intro_people_body['und'][0]['value'];?>
					</p>
				</div>
				
			</div>
		</div>

	</div>

</div>

<div class="next-section-area">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-right">
					<h4 class="right">
						NEXT
					</h4>
					<h2><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/367">Events &#8594;</a></h2>
				</div>
			</div>
		</div>
	</div>

</div>

