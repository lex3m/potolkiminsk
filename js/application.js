jQuery(document).ready(function($){
$('#pwebcontact135_field-phone').inputmask('+7(999)999-9999');
$('#pwebcontact139_field-phone').inputmask('+7(999)999-9999');
$('#zakazat_telephon').inputmask('+7(999)999-9999');
$('#zamershik_phone').inputmask('+7(999)999-9999');
$('#sdelay_phone').inputmask('+7(999)999-9999');

$(".block_vwerh").hide();

$(function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('.block_vwerh').fadeIn();
		} else {
			$('.block_vwerh').fadeOut();
		}
	});

	$('.block_vwerh a').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
});
});





