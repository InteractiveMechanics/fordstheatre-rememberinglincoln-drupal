var lincolnURL = '/rememberinglincoln';

function containsQuestionMark(str) {
	return str.indexOf("?") > 0;
}


function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function populateParams() {
	var title = getParameterByName('searchterm');
	var object = getParameterByName('type');
	var region = getParameterByName('region');
	var tag = getParameterByName('tags');
	
	if(title) {
		$('.title_input').val(title);
	}
	
	if(object) {
		$(".item_type_drop_down option[value='" + object +"']").attr('selected', 'selected');
	}
	
	if(region) {
		$(".region_drop_down option[value='" + region +"']").attr('selected', 'selected');
	}
	
	if(tag) {
		console.log($(".subject_drop_down option[value='" + tag +"']").attr('selected', 'selected'));
	}
}

function geturl() {

	var url = window.location.origin + lincolnURL + '/browse';
	
	if(endsWith(url, '/')) {
		return url;
	} else {
		return url + '/';
	}
}

function endsWith(str, suffix) {
	return str.indexOf(suffix, str.length - suffix.length) !== -1;
}
	
$(document).ready(function(){
	
	$('.btn-go').click(function(e){
		e.stopPropagation();
		e.preventDefault();
		e.stopImmediatePropagation();
		
		var path = geturl();
		
		
		var title = $('.title_input').val();
		var type = $('.item_type_drop_down').val();
		var region = $('.region_drop_down').val();
		var subject = $('.subject_drop_down').val();
		
		if(region) {
			path += region + '/';
		} else {
			path += 'all/';
		}
		
		if(type) {
			path += type + '/';
		} else {
			path += 'all/';
		}
		
		if(type) {
			if (containsQuestionMark(path)) {
				path += "&type=" + type;
			} else {
				path += "?type=" + type;
			}
		}
		
		if(region) {
			if (containsQuestionMark(path)) {
				path += "&region=" + region;
			} else {
				path += "?region=" + region;
			}
		}
		
		if(title) {
			if (containsQuestionMark(path)) {
				path += "&searchterm=" + title;
			} else {
				path += "?searchterm=" + title;
			}
		}
		
		
		
		if(subject) {
			if (containsQuestionMark(path)) {
				path += "&tags=" + subject;
			} else {
				path += "?tags=" + subject;
			}
		}
		
		window.location.href = path;
		
	});
	
	$('.btn-reset').click(function(e){
		e.stopPropagation();
		e.preventDefault();
		e.stopImmediatePropagation();
		
		var path = window.location.origin + lincolnURL +'/browse';
		window.location.href = path;
	});	
});

$(document).ready(function(){
	
	
	$.getJSON( window.location.origin + lincolnURL + "/json/browse-data", function( data ) {
	  var region_items = [];
	  var tags_items = [];
	  var objs_items = [];
	  
	  
	  var itemSelect = $('.item_type_drop_down');
	  $.each( data.objects, function( key, val ) {
	  	var item = data.objects[key].split("|");
	  	itemSelect.append(
	  		$('<option></option>').val(item[1]).html(item[0])
	  	);
	  });
	  
	  var regionSelect = $('.region_drop_down');
	  $.each( data.regions, function( key, val ) {
	  	regionSelect.append(
	  		$('<option></option>').val(data.regions[key].tid).html(data.regions[key].name)
	  	);
	  });
	  
	  var tagsSelect = $('.subject_drop_down');
	  $.each( data.tags, function( key, val ) {
	  
	  	if(val && (val == 'Topic' || val == 'Person')) {
		  	tagsSelect.append(
	  			$('<option></option>').val(val).html(val)
	  		);
	  	} else {
		  	tagsSelect.append(
	  			$('<option></option>').val(val).html('&nbsp;&nbsp;' + val)
	  		);
	  	}
	  });
	  
	  if( containsQuestionMark( window.location.href ) ) {
	  	console.log($('.region_drop_down'));
		populateParams();
	  }
	 
	 
	});
	
});
