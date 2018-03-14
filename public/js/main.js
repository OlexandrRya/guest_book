$(function (){
    $('#button-preview').click(function(){
		var html = $('#input-user_name').val();
		$('#user_name').html(html);

		var html = $('#input-email').val();
		$('#email').html(html);

		var html = $('#input-homepage').val();
		$('#homepage').html(html);

		var html = $('#input-text').val();
		$('#text').html(html);

		var html = $('#input-file').val();
		$('#file').attr("src",html);
    });
});

document.querySelector("#input-file").addEventListener("change", function () {
	if (this.files[0]) {
		
		var fr = new FileReader();

		fr.addEventListener("load", function () {
			document.querySelector("label").style.backgroundImage = "url(" + fr.result + ")";
		}, false);

		fr.readAsDataURL(this.files[0]);
	}
});

$('#refresh').on('click',function(){
    var captcha = $('img.captcha-img');
    var config = captcha.data('refresh-config');
    $.ajax({
        method: 'GET',
        url: '/get_captcha/' + config,
    }).done(function (response) {
        captcha.prop('src', response);
    });
});