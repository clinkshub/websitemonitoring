<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
		<button id="counts">4</button>
		<table class="table">
			<thead>
				<tr>
					<th>SR</th>
					<th>Site</th>
					<th>Last Checked</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td class="checkdomain" id="site-1" data-count-id="1">raja-fashions.com</td>
					<td id="last-checked-1"></td>
					<td id="site-status-1"></td>
				</tr>
				<tr>
					<td>2</td>
					<td class="checkdomain" id="site-2" data-count-id="2">lovebirds.net.in</td>
					<td id="last-checked-2"></td>
					<td id="site-status-2"></td>
				</tr>
				<tr>
					<td>3</td>
					<td class="checkdomain active-domain" id="site-3" data-count-id="3">clinkshub.com</td>
					<td id="last-checked-3"></td>
					<td id="site-status-3"></td>
				</tr>
				<tr>
					<td>4</td>
					<td class="checkdomain" id="site-4" data-count-id="4">healthlynked.com</td>
					<td id="last-checked-4"></td>
					<td id="site-status-4"></td>
				</tr>
			</tbody>
		</table>
		
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : ''; ?></p>
</div>
<script type="text/javascript">
	setInterval(function () {
        console.log('it works' + new Date());
		checkdomain();
    },5000);
	var last_checked='';
	var total_domains=parseInt($('#counts').text());
	function checkdomain(){
		$('#site-status-'+next_check).text('Checking');
		var start_time=new Date();
		var next_check=0;
		next_check=last_checked+1;
		if(last_checked==''){
			next_check=parseInt($('.active-domain').attr('data-count-id'));
		}
		if(next_check>total_domains){
			next_check=1;
		}
		$.ajax({
			type: "GET",
			dataType: 'JSON',
			url: "index.php/welcome/get_check_site/"+$('#site-'+next_check).text(),
			success: function(resp){
				console.log(resp);
				if(resp.status=='success'){
					$('#site-status-'+next_check).html('<span class="text-success">Live</span>');
				}
				else{
					$('#site-status-'+next_check).html('<span class="text-"'+resp.status+'>'+resp.message+'</span>');
				}
			}
		});
		console.log($('#site-'+next_check).text());
		
		var end_time=new Date();
		var time_eclapse=parseInt((end_time-start_time)/ 1000 / 60 / 60);
		$('#last-checked-'+next_check).html(new Date()+'['+time_eclapse+' Sec]');
		last_checked=next_check;
	}
	checkdomain();
</script>
</body>
</html>
