<?php
 global $base_path;
?>
<div class="hero-unit exhibit">
	<div class="jumbotron">
		<div class="hero-unit-message">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
                        <h4>Explore the Story</h4>
						<h1><?php print $node->title;?></h1>
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
				<blockquote><?php print $node->field_exhibit_intro_quote['und'][0]['value'];?></blockquote>
			</div>

		</div>
	</div>
</div>

<div class="introduction-sub-section">
	<div class="container">
		<div class="row">

			<div class="col-md-4">
				<a class="sub-section-item" href="<?php print $base_path; ?>exhibit/events">
					<div class="sub-section-image">
						<img src="<?php print file_create_url($node->field_exhibit_intro_event_image['und'][0]['uri']); ?>" alt="Events" />
					</div>
					<h2>Timeline</h2>
					<p><?php print $node->field_exhibit_intro_event_body['und'][0]['value'];?></p>
				</a>
			</div>

			<div class="col-md-4">
				<a class="sub-section-item" href="<?php print $base_path; ?>exhibit/places">
					<div class="sub-section-image">
						<img src="<?php print file_create_url($node->field_exhibit_intro_place_image['und'][0]['uri']); ?>" alt="Places" />
					</div>
					<h2>Map of Responses</h2>
					<p><?php print $node->field_exhibit_intro_place_body['und'][0]['value'];?></p>
				</a>
			</div>

			<div class="col-md-4">
				<a class="sub-section-item" href="<?php print $base_path; ?>exhibit/people">
					<div class="sub-section-image">
						<img src="<?php print file_create_url($node->field_exhibit_intro_people_image['und'][0]['uri']); ?>" alt="People" />
					</div>
					<h2>People</h2>
					<p><?php print $node->field_exhibit_intro_people_body['und'][0]['value'];?></p>
				</a>
			</div>

		</div>
	</div>
</div>

<div class="next-section-area">
	<div class="container">
		<div class="pull-right">
			<h4 class="text-right">
				NEXT
			</h4>
			<h2><a href="<?php print $base_path; ?>exhibit/events">Timeline <span>&#8594;</span></a></h2>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		
		$('.site-wrapper .navbar-inverse.navbar .navbar-nav li:eq(0)').addClass('active');
		
	});
</script>

