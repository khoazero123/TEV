<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Index</title>
		<script src="js/jquery.min.js"></script>
	
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript">
			var maxSecond = <?php echo $config['maxSecond']; ?>;
		</script>
	</head>
	<body>
		<div class="container">
			<form id="my-data" method="POST" action="#">
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Example textarea</label>
					<textarea class="form-control" name="textarea" rows="3"></textarea>
				</div>

				<div class="form-group">
					<label for="exampleFormControlSelect1">Example select</label>
					<select class="form-control" name="select">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					</select>
				</div>
				<div class="form-group">
					<label class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="checkbox">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description">Check this custom checkbox</span>
					</label>
				</div>
				<button type="submit" class="btn btn-primary">Send</button>
			</form>

			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar"
				aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
			</div>

			<div id="result" class="" style="display:block;">
				<div class="panel panel-default">
					<div class="panel-heading">Enter infomation and click button Send</div>
					<div class="panel-body">
						<button type="button" id="btn-download" class="btn btn-primary" disabled>Download</button>
						<button type="button" id="btn-view" class="btn btn-success" disabled>View</button>
					</div>
				</div>
			</div>
		</div>
		<script src="js/script.js?v=<?php echo filemtime(__DIR__ .'/js/script.js');?>"></script>
	</body>
</html>