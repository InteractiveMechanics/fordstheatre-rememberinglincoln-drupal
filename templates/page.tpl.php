<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div class="site-wrapper">
	<div class="site-canvas">
			
		<div class="header">
			
			<div class="visible-sm visible-xs">
				<div class="mobile-navbar">
					<span class="glyphicon glyphicon-align-justify toggle-nav" aria-hidden="true"></span>
                    <object type="image/svg+xml" data="<?php print $base_path; ?>/themes/lincoln/assets/images/logo_mobile.svg" class="logo-mobile">
                        Remembering Lincoln
                    </object>
				</div>
				
				<div class="mobile-menu-area">
					<ul class="mobile-menu-list">
						<li class="title">Exhibit</li>
						<li><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/366">Introduction</a></li>
						<li><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/367">Events</a></li>
						<li><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/369">Places</a></li>
						<li><a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/368">People</a></li>

						<li class="title">
							<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=browse">Browse All Responses</a>
						</li>
						<li class="title">
							<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/370">
								Curated Collection
							</a>
						</li>

						<li class="title">About This Project</li>
						<li><a href="javascript:void(0);">Resources</a></li>
						<li><a href="javascript:void(0);">Partners</a></li>
						<li><a href="javascript:void(0);">Documentation</a></li>
						<li><a href="http://fords.org/home/terms-use">Terms of Use</a></li>
						<li><a href="http://blog.fords.org/">Ford's Theatre blog</a></li>
						<li><a href="http://fords.org/contact">Contact Us</a></li>
					</ul>
				</div>
			</div>
			
			<nav class="navbar navbar-inverse hidden-xs hidden-sm" role="navigation">
            	<div class="navbar-header">
			        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
				    <span class="sr-only">Toggle navigation</span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
			        </button>
			        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="navbar-brand scroll-top">
                        <object type="image/svg+xml" data="<?php print $base_path; ?>/themes/lincoln/assets/images/logo_header.svg" class="logo">
                            Remembering Lincoln | A project of Ford's Theatre
                        </object>
                    </a>
            	</div><!--/.navbar-header-->
            	
			    <div id="main-nav" class="collapse navbar-collapse">
			        <ul class="nav navbar-nav pull-right">
		            	<li>
		            		<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=node/366" class="scroll-link" data-id="mission">
		            			Explore the Exhibit
		            		</a>
		            	</li>

				    	<li>
				    		<a href="http://staging.interactivemechanics.com/rememberinglincoln/?q=browse" class="scroll-link" data-id="products">
				    			Browse Responses
				    		</a>
				    	</li>

				    	<li>
				    		<a href="./connect.html" class="scroll-link" data-id="team">
				    			For Teachers
				    		</a>
				    	</li>
				    	<li class="collection-list">
				    		<ul>
				    			<li class="collection-number">
				    				<p>0</p>
				    			</li>
				    			<li class="collection-text">
				    				My <br />
				    				Collection
				    			</li>
				    		</ul>
				    	</li>
			        </ul><!--/#main-nav.navbar-collapse-->
			    </div>
            </nav><!--/.navbar-->
		</div> <!--./header-->
		
		<?php print render($page['content']); ?>
		
		<!-- Footer Area-->
		<?php print render($page['footer']); ?>
		
	</div>
</div>

  
<?php print render($page['bottom']); ?>