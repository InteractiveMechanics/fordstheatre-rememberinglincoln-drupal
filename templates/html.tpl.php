<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 */
?><!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>

  <?php if ($default_mobile_metatags): ?>
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width">
  <?php endif; ?>
  <meta http-equiv="cleartype" content="on">

  <?php print $styles; ?>
  <?php print $scripts; ?>
  
 
  <?php if ($add_html5_shim and !$add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5.js"></script>
    <![endif]-->
  <?php elseif ($add_html5_shim and $add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5-respond.js"></script>
    <![endif]-->
  <?php elseif ($add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/respond.js"></script>
    <![endif]-->
  <?php endif; ?>
  <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php if ($skip_link_text && $skip_link_anchor): ?>
    <p id="skip-link">
      <a href="#<?php print $skip_link_anchor; ?>" class="element-invisible element-focusable"><?php print $skip_link_text; ?></a>
    </p>
  <?php endif; ?>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  
   <script src="http://staging.interactivemechanics.com/frontendcode/rememberinglincoln/js/salvattore.js"></script>
   <script type="text/javascript">
		$(function() {
			$('.toggle-nav').click(function() {
				toggleNav();
			});
			
			if(localStorage.getItem('remembering_lincoln')) {
				var arr = JSON.parse(localStorage.getItem('remembering_lincoln'));
				updateCollectionHTML(arr);
			}
		});
		
		$(document).ready(function(){
		
			$('div.post .save-icon').click(function(){
				var type = $(this).data('nodeid');
				console.log(type);
	
				addToStorage(type);
			});
			
			$('.collection-has-items').click(function(){
				var url = $(this).data('url');
				
				if(url){ window.location.href = url; }
			});
			
		});

		function toggleNav() {
			if ($('.site-wrapper').hasClass('show-nav')) {
				// Do things on Nav Close
				$('.site-wrapper').removeClass('show-nav');
			} else {
				// Do things on Nav Open
				$('.site-wrapper').addClass('show-nav');
			}
		}
		
		function addToStorage(node_id) {

		    if ("localStorage" in window) {
		    	var json = localStorage.getItem('remembering_lincoln');
		    	var arr = [];
		    	
		    	if(json) {
		    		arr = JSON.parse(json);
		    		
		    		if($.inArray(node_id, arr) == -1 ) {
			    		arr.push(node_id);	
		    		} else {
		    			arr.pop(node_id);
			    		console.log('removed');
		    		}
		    		
		    	} else {
		    		var arr = new Array();
		    		arr.push(node_id);
		    	}
	
		        localStorage.setItem('remembering_lincoln', JSON.stringify(arr));
		        updateCollectionHTML(arr);
		    }
	
		}
	
		function removeFromStorage(node_id) {
		    
		    if ("localStorage" in window) {
		        if (localStorage.length > 0) {
		        	var json = localStorage.getItem('remembering_lincoln');
		        	
		        	if(json) {
		        		var arr = new Array();
		        		
		        		arr = JSON.parse(json);
		        		arr.pop(node_id);
						console.log(arr);
			            localStorage.setItem('remembering_lincoln', JSON.stringify(arr));
		        	}
	
		        	
		        }
		    }
		
		}
		
		function updateCollectionHTML(arr) {
			var collection_count = arr.length;
			
			if(collection_count > 0){
				$('.collection-number').html("<p>" + collection_count + "</p>");
				$('.collection-list').addClass('collection-has-items');
			} else {
				$('.collection-number').html("<p>" + collection_count + "</p>");
				$('.collection-list').removeClass('collection-has-items');
			}
			
			updateLinks(arr);
		}
		
		function updateLinks(arr) {
			var ids = arr.join(",")
			
			if(arr.length > 0) {
				var url = "http://staging.interactivemechanics.com/rememberinglincoln/?q=my-collection&ids=" + ids;
		
				$('.collection-has-items').attr("data-url", url);
				$('.my-collection-footer-link').attr('href', url);
			} else {
				$('.collection-has-items').attr("data-url", "");
			}
		}
	</script>
</body>
</html>
