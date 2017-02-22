<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div class="wrap">
		<header>
		</header>
		<section class="content">
	<?php
		$duedate = strtotime('2016-2-29');
		$strdate = date( 'm-d-Y', $duedate );
		$mktime = mktime(0,0,0,2,29,2016);
	?>
	<p><?php echo $strdate;?></p>
	<p><?php echo $duedate;?></p>
	<p><?php echo $mktime;?></p>
		</section>
		<footer>
				<p>&copy; Copyright 2015-<?php echo date('Y');?> by  , All Rights Reserved.</p>
		</footer>
	</div>
</body>
</html>