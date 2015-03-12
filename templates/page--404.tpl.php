<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
 global $base_path; 
?>

<div class="site-wrapper">
	<div class="site-canvas">
			
		<div class="header">
			
			<div class="visible-sm visible-xs">
				<div class="mobile-navbar">
					<span class="glyphicon glyphicon-align-justify toggle-nav" aria-hidden="true"></span>
                    <a href="<?php print $front_page; ?>">
                        <object type="image/svg+xml" data="<?php print $base_path; ?>themes/lincoln/assets/images/logo_mobile.svg" class="logo-mobile">
                            Remembering Lincoln
                        </object>
                    </a>
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
                        <object type="image/svg+xml" data="<?php print $base_path; ?>themes/lincoln/assets/images/logo_header.svg" class="logo">
                            Remembering Lincoln | A project of Ford's Theatre
                        </object>
                    </a>
            	</div><!--/.navbar-header-->
            	
			    <div id="main-nav" class="collapse navbar-collapse">
			        <ul class="nav navbar-nav pull-right">
		            	<li>
		            		<a href="<?php print $base_path; ?>exhibit/introduction" class="scroll-link" data-id="mission">
		            			Explore the Story
		            		</a>
		            	</li>

				    	<li>
				    		<a href="<?php print $base_path; ?>browse" class="scroll-link" data-id="products">
				    			Browse Responses
				    		</a>
				    	</li>

				    	<li>
				    		<a href="<?php print $base_path; ?>teaching-modules" class="scroll-link" data-id="team">
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
        <div class="hero-unit error">
        	<div class="jumbotron">
    			<div class="container">
    				<div class="row">
    					<div class="col-md-6">
    						<h1>404</h1>
                            <h3>"Remember in the depth and even the agony of despondency, that very shortly you are to feel well again."</h3>
    					</div>
    				</div>
        		</div>
        	</div><!--./jumbotron-->
        </div> <!--./hero-->


		<?php print render($page['footer']); ?>
		
	</div>
    <div class="mobile-menu-area">
    	<ul class="mobile-menu-list">
            <li class="title">
    			<a href="<?php print $front_page; ?>">Homepage</a>
    		</li>
    		<li class="title">
                <a href="<?php print $base_path; ?>exhibit/introduction">Explore the Story</a>
            </li>
    		<li class="title">
    			<a href="<?php print $base_path; ?>browse">Browse All Responses</a>
    		</li>
    		<li class="title">
    			<a href="<?php print $base_path; ?>curated-collection">Curated Collections</a>
    		</li>
    		<li class="title">
                <a>About This Project</a>
            </li>
    		<li><a href="<?php print $base_path; ?>partners">Contributors</a></li>
    		<li><a href="http://fords.org/home/terms-use">Terms of Use</a></li>
    		<li><a href="http://blog.fords.org/">Ford's Theatre Blog</a></li>
    		<li><a href="http://fords.org/contact">Contact Us</a></li>
    	</ul>
    </div>
</div>
  
<?php print render($page['bottom']); ?>