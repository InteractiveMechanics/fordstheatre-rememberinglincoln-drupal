<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
 global $base_path; 
 
 
 $main_mobile_links = menu_load_links('menu-main-mobile-menu');
 $sub_mobile_links = menu_load_links('menu-sub-mobile-menu-links');
 $story_links = menu_load_links('menu-story-footer-links');
 
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
		            	<li class="exhibit">
		            		<a href="<?php print $base_path; ?>exhibit/introduction" class="scroll-link" data-id="mission">
		            			Explore the Story
		            		</a>
                            <ul class="dropdown-menu" role="menu">
                            	<?php foreach($story_links as $menu): ?>
									<li>
					                	<a href="<?php print $base_path; ?><?php print drupal_get_path_alias($menu['link_path']) ?>"><?php print $menu['link_title'] ?>
					                	</a>
									</li>
								<?php endforeach; ?>
                            </ul>
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
				    	<li class="collection-list" onclick="MyCollectionClicked();">
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
		<?php print render($page['footer']); ?>
		
	</div>
    <div class="mobile-menu-area">
    	<ul class="mobile-menu-list">
            <li class="title">
    			<a href="<?php print $front_page; ?>">Homepage</a>
    		</li>
    		<?php foreach($main_mobile_links as $menu): ?>
				<li class="title">
                	<a href="<?php print $base_path; ?><?php print drupal_get_path_alias($menu['link_path']) ?>"><?php print $menu['link_title'] ?>
                	</a>
				</li>
			<?php endforeach; ?>
			
			<?php foreach($sub_mobile_links as $menu): ?>
				<?php $path = drupal_get_path_alias($menu['link_path']); ?>
				
				<?php if(strpos($path,'http') !== false): ?>
		    		<li><a href="<?php print $menu['link_path']; ?>" target="_blank"><?php print $menu['link_title'] ?></a></li>
		    		
		    	<?php else: ?>
		    		<li>
		    			<a href="<?php print $base_path; ?><?php print drupal_get_path_alias($menu['link_path']) ?>"><?php print $menu['link_title'] ?></a>
		    		</li>
		    	<?php endif; ?>
    		<?php endforeach; ?>
    	</ul>
    </div>
</div>
  
<?php print render($page['bottom']); ?>