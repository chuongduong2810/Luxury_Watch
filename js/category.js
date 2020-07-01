$(document).ready(function(){
	$('.category-item').click(function(event){
		var categoryItem = document.getElementsByClassName('category-item');

		for (i = 0; i < categoryItem.length; i++) {
			categoryItem[i].className = categoryItem[i].className.replace(" active", "");
		}

		var category = $(this).attr('id');
		
		if(category == 'all'){
			$('.product-grid').parent().show();
		} else{
			$('.product-grid').parent().hide();
			$('.'+ category).parent().show();
		}
		console.log($(this).attr('className'));
		event.currentTarget.className += " active";
		//$(this).className.replace('category-item','category-item active');
	})
})