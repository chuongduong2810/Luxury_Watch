$(document).ready(function(){
	$('.brand-now').slice(0,9).show();
	$('.category-item').click(function(event){

		var categoryItem = document.getElementsByClassName('category-item');

		for (i = 0; i < categoryItem.length; i++) {
			categoryItem[i].className = categoryItem[i].className.replace(" active", "");
		}

		var category = $(this).attr('id');
		$('.product-more').removeClass('brand-now');
		if(category == 'all'){
			$('.product-more').addClass('brand-now');
			// $('.brand-now').show();
		} else{
			$('.product-more').hide();
			$('.'+ category).parent('.product-more').addClass('brand-now');
			// $('brand-now').show();
		}
		$('.brand-now').hide();
		// if(category == 'all'){
		// 	$('.product-more').show();
		// } else{
		// 	$('.product-more').hide();
		// 	$('.'+ category).parent('.product-more').show();
		// }
		// console.log($(this).attr('className'));
		event.currentTarget.className += " active";
		// console.log($('.product-more:visible'));
		// loadMore(category);
		// $(this).className.replace('category-item','category-item active');
		// $('.'+ category).parent('.product-more').slice(0,3).show();
		
		// x = $('.product-more:visible');
		// $('.product-more:visible').hide();
		// x.slice(0,3).show();
		// console.log(x);
		$('.brand-now').slice(0,9).show();
	})
	loadMore();
})

function loadMore(){
	$('#btn-loadmore').on('click', function (e) {
		e.preventDefault();
		$('.brand-now:hidden').slice(0,9).slideDown();
	});
}



