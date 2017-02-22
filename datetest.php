<?php require_once('classes/class.reminder.php');?>

<?php

$reminders  = new ManageReminders;
if (isset($_POST['submit']))
{
	if (isset($_POST['date']))
	{
			$test_date = str_replace('-', '/', $_POST['date']);
			if (strlen($test_date) > 7)
			{
				$test_arr  = explode('/', $test_date);

				$strdate = $test_arr[2] .'-'. $test_arr[0] .'-'. $test_arr[1];
				if (checkdate($test_arr[0], $test_arr[1], $test_arr[2])) 
				{
					$duedate = strtotime($strdate);	
					$reminders->addReminder($duedate, 'test ' . $strdate . ' '. $duedate);
				}
			}
	}
}
$r = $reminders->getReminders();
?>
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
		<?php if (isset($duedate)) { ?>
			<p><?php echo $duedate;?></p>
			<p><?php echo date( 'm-d-Y', $duedate );?></p>
			<?php $strdate = date( 'm-d-Y', $duedate );?>
			<p><?php echo $strdate;?></p>
		<?php } ?>
<?php
	date_default_timezone_set('America/Chicago');
	$localtime = localtime(time(), true);
	$m = $localtime['tm_mon']+1;
	$y = $localtime['tm_year']+1900;
	$d = $localtime['tm_mday'];
	
	echo 'Today is ' . $m . '/'. $d .'/' . $y;
	
	foreach ($r as $rem) {
		echo '<p>'. $rem->due_date . '--'.date('m-d-Y', (int)$rem->due_date).'</p>';
		if ($rem->due_date === $duedate)
		{
			echo 'equal';
		}
		echo gettype($duedate);
		echo ' ';
		echo gettype($rem->due_date);
	}
		
?>
		<form name="form1" method="post" action="datetest.php"><input name="date" type="text">
			<input type="submit" name="submit" id="submit" value="Submit">
		</form>
		</section>
		<footer>
			<p>&copy; Copyright 2015-<?php echo date('Y');?> by  , All Rights Reserved.</p>
		</footer>
	</div>
</body>
</html>