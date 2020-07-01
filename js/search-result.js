$(document).ready(function(){
	loadMore();
	$('.filter-btn').click(function(){
		loadMore();
	})
})

function loadMore(){
	$('.search-product').hide();

	$('.search-product').slice(0,6).show();
	// console.log($('.search-product:hidden'));

	$('#btn-loadmore').on('click', function (e) {
		e.preventDefault();
		console.log('ok');
		$('.search-product:hidden').slice(0,6).slideDown();
	});
}