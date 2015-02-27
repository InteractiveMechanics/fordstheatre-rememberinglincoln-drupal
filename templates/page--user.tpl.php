<style>
    .form-item label { min-width: 240px; }
</style>
<div class="site-wrapper">
	<div class="site-canvas">
			
		<div class="header">
			
			<div class="visible-sm visible-xs">
				<div class="mobile-navbar">
                    <a href="<?php print $front_page; ?>">
                        <object type="image/svg+xml" data="<?php print $base_path; ?>themes/lincoln/assets/images/logo_mobile.svg" class="logo-mobile">
                            Remembering Lincoln
                        </object>
                    </a>
				</div>
			</div>
			
			<nav class="navbar navbar-inverse hidden-xs hidden-sm" role="navigation">
            	<div class="navbar-header">
			        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="navbar-brand scroll-top">
                        <object type="image/svg+xml" data="<?php print $base_path; ?>themes/lincoln/assets/images/logo_header.svg" class="logo">
                            Remembering Lincoln | A project of Ford's Theatre
                        </object>
                    </a>
            	</div><!--/.navbar-header-->
            </nav><!--/.navbar-->
		</div> <!--./header-->
        <div class="container" style="padding: 150px 15px 150px;">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading"><?php if (!$logged_in): echo 'Login to Account'; else: echo 'My Profile'; endif; ?></div>
                        <div class="panel-body">
                            <?php if ($tabs && $logged_in): ?>
                                <?php print render($tabs); ?>
                            <?php endif; ?>
                            <?php print render($page['content']); ?>                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php print render($page['footer']); ?>
    </div>
</div>