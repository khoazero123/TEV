
$(document).ready(function() {
	var myForm = $('#my-data');

	myForm.submit(function(e) {
		e.preventDefault();
		$('#result .panel-heading').text('Server đang xử lý. Xin vui lòng đợi trong giây lát.');
		$('button[type="submit"]',myForm).prop('disabled', true);
		$('#result').find('button').attr('disabled','disabled');
		$('#result #btn-download a').removeAttr("href");
		$('#result #btn-view a').removeAttr("href");

		$('.progress-bar').removeClass().addClass("progress-bar progress-bar-striped active");

		var i = 0;
		var maxPercent = 90;
		var step = 100 * maxSecond;
		(function loop() {
			i++;
			var percent = i*10;
			$('.progress-bar.active').css('width', percent+'%').attr('aria-valuenow', percent).text(percent+'%');
			if (percent < maxPercent) {
				setTimeout(loop, step);
			}
		})();

		$.post('ajax.php', myForm.serialize(), function(data) {
			$('.progress-bar').css('width', '100%').attr('aria-valuenow', 100).text('100%');
			
			var html = ``;
			if(!data.success) {
				$('#result .panel').removeClass().addClass("panel panel-danger");
				$('#btn-download, #btn-view',myForm).prop('disabled', true);

				$('#result .panel-heading').text('Có lỗi xảy ra. File chưa được tạo.');

				$('.progress-bar').removeClass().addClass("progress-bar progress-bar-danger progress-bar-striped");
			} else {
				$('#result .panel').removeClass().addClass("panel panel-success");
				$('#result .panel-heading').text('File đã tạo xong, nhấn nút Download hoặc View để xem.');

				$('#btn-download, #btn-view',myForm).removeAttr('disabled');

				$('.progress-bar').removeClass().addClass("progress-bar progress-bar-success progress-bar-striped");

				var win;
				if(data.urldownload) {
					$('#result #btn-download').prop('disabled', false).html('<a href="'+ data.urldownload +'" target="_blank">Download</a>');
				}
				if(data.urlview) {
					$('#result #btn-view').prop('disabled', false).html('<a href="'+ data.urlview +'" target="_blank">View</a>');
				}
			}
			$('button[type="submit"]',myForm).prop('disabled', false);
		});
	});
});