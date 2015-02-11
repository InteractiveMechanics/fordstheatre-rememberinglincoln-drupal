<?php
/**
 * @file
 * Returns the HTML for the footer region.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728140
 */
?>
<?php if ($content): ?>
	<div class="footer">
		<div class="container">

			<div class="row">
				<div class="col-md-4 col-xs-12 left-footer-col">
					<div class="logo-image">
						<object type="image/svg+xml" data="<?php global $base_path; print $base_path; ?>/themes/lincoln/assets/images/logo_footer.svg">
                            Remembering Lincoln
                        </object>
					</div>
					<p class="small">
						Copyright 2014 <a href="http://www.fords.org/">Ford's Theatre</a>.
						<br />
						All Objects and images copyright their respective instutitions.
					</p>
					
					<p class="small">
						This project was made possible in part by the <a href="http://www.imls.gov/">Institute of Museum and Library Services</a>, grant number MA-10-13-0274-13
					</p>
				</div>

				<div class="col-md-8 col-lg-6 col-lg-offset-2 hidden-sm hidden-xs">

					<ul class="footer-links">
						<li>
							<ul>
								<li class="title">Exhibit</li>
								<li><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/366">Introduction</a></li>
								<li><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/367">Events</a></li>
								<li><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/369">Places</a></li>
								<li><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/368">People</a></li>
							</ul>
						</li>

						<li>
							<ul>
								<li class="title">Responses</li>
								<li><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=browse">Browse all items</a></li>
								<li><a class="my-collection-footer-link" href="javascript:void(0);">View collections</a></li>
								<li><a href="javascript:void(0);">Submit an item</a></li>
								<br />
								<li class="title">For teachers</li>
								<li><a href="javascript:void(0);">Teaching modules</a></li>
								<li><a href="javascript:void(0);">Submit a module</a></li>
							</ul>
						</li>

						<li>
							<ul>
								<li class="title">About the project</li>
								<li><a href="javascript:void(0);">Resources</a></li>
								<li><a href="javascript:void(0);">Partners</a></li>
								<li><a href="javascript:void(0);">Documentation</a></li>
								<li><a href="http://fords.org/home/terms-use">Terms of Use</a></li>
								<li><a href="http://blog.fords.org/">Ford's Theatre Blog</a></li>
								<li><a href="http://fords.org/contact">Contact us</a></li>
							</ul>
						</li>
					</ul>

				</div>

			</div>

		</div> <!-- ./container -->

	</div> <!-- ./footer -->
<?php endif; ?>