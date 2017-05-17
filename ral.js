jQuery(document).ready(function(){
	jQuery('.click-me').click(function(){
		jQuery(this).next().toggleClass('show');	
	});
	
});
