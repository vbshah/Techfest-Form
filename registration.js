function loadform(){
	$("#contact-form").slideDown(1500);
}
$(document).ready(function(){
	$('.intro').css({"background":"url(bw5.jpg) no-repeat 50% 50%"});
	setTimeout(loadform(),2500);
    });

	/*$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');
		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');
		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})
	$("#next-page").click(function(){
		var tab_id = $(this).attr('data-tab');
		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');
		var tab = $(this).attr('data-element');
		$('ul.tabs li:eq('+tab+')').addClass('current');
		$("#"+tab_id).addClass('current');
	})
	$("#next-page1").click(function(){
		var tab_id = $(this).attr('data-tab');
		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');
		var tab = $(this).attr('data-element');
		$('ul.tabs li:eq('+tab+')').addClass('current');
		$("#"+tab_id).addClass('current');
	})
	*/
	$('input[type="checkbox"]').bind('change', function() {
	var alsoInterested = '';
		$('input[type="checkbox"]').each(function(index, value) {
			if (this.checked) {
				/*add*/ /*get label text associated with checkbox*/
				alsoInterested += ($('label[for="'+this.name+'"]').html() + ' | ');
			}
		})
		$('#additionalServices').html(alsoInterested);
	});
