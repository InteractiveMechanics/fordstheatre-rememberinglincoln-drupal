<?php
/**
 * @file
 * Returns the HTML for the footer region.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728140
 */
 global $base_path;
 
  
 $story_links = menu_load_links('menu-story-footer-links');
 $responses_links = menu_load_links('menu-responses-footer-links');
 $about_links = menu_load_links('menu-about-footer-links');
 $teachers_links = menu_load_links('menu-teachers-footer-links');
 
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
								<?php foreach($story_links as $menu): ?>
									<li>
					                	<a href="<?php print $base_path; ?><?php print drupal_get_path_alias($menu['link_path']) ?>"><?php print $menu['link_title'] ?>
					                	</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</li>

						<li>
							<ul>
								<li class="title">Responses</li>
								<?php foreach($responses_links as $menu): ?>
									<li>
					                	<a href="<?php print $base_path; ?><?php print drupal_get_path_alias($menu['link_path']) ?>"><?php print $menu['link_title'] ?>
					                	</a>
									</li>
								<?php endforeach; ?>
								<br />
								<li class="title">For teachers</li>
								<?php foreach($teachers_links as $menu): ?>
									<li>
					                	<a href="<?php print $base_path; ?><?php print drupal_get_path_alias($menu['link_path']) ?>"><?php print $menu['link_title'] ?>
					                	</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</li>

						<li>
							<ul>
								<li class="title">About the project</li>
								<?php foreach($about_links as $menu): ?>
									
									<?php $path = drupal_get_path_alias($menu['link_path']); ?>
				
									<?php if(strpos($path,'http') !== false): ?>
							    		<li>
							    			<a href="<?php print $menu['link_path']; ?>" target="_blank"><?php print $menu['link_title'] ?></a>
							    		</li>
							    		
							    	<?php else: ?>
							    		<li>
							    			<a href="<?php print $base_path; ?><?php print drupal_get_path_alias($menu['link_path']) ?>"><?php print $menu['link_title'] ?></a>
							    		</li>
							    		
							    	<?php endif; ?>
									
								<?php endforeach; ?>
							</ul>
						</li>
					</ul>

				</div>

			</div>

		</div> <!-- ./container -->

	</div> <!-- ./footer -->
<?php endif; ?>