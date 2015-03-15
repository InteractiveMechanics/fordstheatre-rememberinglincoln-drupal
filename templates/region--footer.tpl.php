<?php
/**
 * @file
 * Returns the HTML for the footer region.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728140
 */
 global $base_path;
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

				<div class="col-md-8 col-lg-7 col-lg-offset-1 hidden-sm hidden-xs">

					<ul class="footer-links">
						<li>
							<ul>
								<li class="title">Story</li>
								<li><a href="<?php print $base_path; ?>exhibit/introduction">Introduction</a></li>
								<li><a href="<?php print $base_path; ?>exhibit/events">Timeline</a></li>
								<li><a href="<?php print $base_path; ?>exhibit/places">Map of Responses</a></li>
								<li><a href="<?php print $base_path; ?>exhibit/people">People</a></li>
							</ul>
						</li>

						<li>
							<ul>
								<li class="title">Responses</li>
								<li><a href="<?php print $base_path; ?>browse">Browse all items</a></li>
								<li><a href="<?php print $base_path; ?>curated-collection">View collections</a></li>
								<li><a href="javascript:void(0);">Submit an item</a></li>
								<br />
								<li class="title">For teachers</li>
								<li><a href="<?php print $base_path; ?>teaching-modules">Teaching modules</a></li>
								<li><a href="javascript:void(0);">Submit a module</a></li>
							</ul>
						</li>

						<li>
							<ul>
								<li class="title">About the project</li>
                                <li><a href="<?php print $base_path; ?>about-remembering-lincoln">About Remembering Lincoln</a></li>
                                <li><a href="<?php print $base_path; ?>about-fords-theatre">About Ford's Theatre</a></li>
								<li><a href="<?php print $base_path; ?>contributors">Contributors</a></li>
								<li><a href="http://fords.org/home/terms-use" target="_blank">Terms of Use</a></li>
								<li><a href="http://blog.fords.org/" target="_blank">Ford's Theatre Blog</a></li>
								<li><a href="http://fords.org/contact" target="_blank">Contact us</a></li>
							</ul>
						</li>
					</ul>

				</div>

			</div>

		</div> <!-- ./container -->

	</div> <!-- ./footer -->
<?php endif; ?>