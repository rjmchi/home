<?php require_once('classes/class.reminder.php');?>
<?php require_once('classes/database.php');?>
<?php 
	$reminders  = new ManageReminders;

	if (isset($_POST['delete_x']))
	{
		$reminders->deleteReminder($_POST['id']);
	}
	
	if (isset($_POST['add']))
	{
		$duedate = 2147483647;
		
		if (isset ($_POST['date']))
		{
			$test_date = str_replace('-', '/', $_POST['date']);
			if (strlen($test_date) > 7)
			{
				$test_arr  = explode('/', $test_date);

				$strdate = $test_arr[2] .'-'. $test_arr[0] .'-'. $test_arr[1];
				if (checkdate($test_arr[0], $test_arr[1], $test_arr[2])) 
				{
					$duedate = mktime(0,0,0,$test_arr[0], $test_arr[1], $test_arr[2]);	
				}
			}
				
		}
		$reminders->addReminder($duedate, $_POST['message']);
	}


	if (isset($_POST['addlink'])){
		$db->insert ('links', array("name"=>$_POST['name'], "link"=>$_POST['link'], "image"=>$_POST['image'], "image_width"=>$_POST['width'], "image_height"=>$_POST['height'])  );
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Robert's Home Page</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="/home/favicon.png">
<link href="classes/reminder.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="page-wrap">
	<div class="sidebar">
		<form method="post" class="addlink" id="addlink" name="addlink" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="name">Name: </label>
			<input type="text" name="name">
			<label for="link">Link: </label>
			<input type="text" name="link">
			<label for="image">Image: </label>
			<input type="text" name="image">
			<label for="width">Image Width:</label>
			<input type="text" name="width">
			<label for="height">Image Height:</label>
			<input type="text" name="height">			
			<button type="submit" name="addlink">AddLink</button>
		</form>
		<?php $reminders->showReminders(); ?>
	</div>
	<nav class="menu">
		<?php $db->getLinks();?>
	</nav>
	<div class="clients">
		<h1>Clients</h1>
		<div class="client">
			<h2><a href="http://skolnik.com">Skolnik</a></h2>
			<p><a href="http://skolnik.rjm">Skolnik.rjm (local)</a></p>
			<p><a href="http://skolnik.com">Skolnik.com</a></p>
			<p><a href="http://skolnik.com/cpanel">skolnik.com/cpanel</a></p>
			<p><a href="https://server6.sherwoodhosting.com:2083/cpsess3467537177/3rdparty/phpMyAdmin/index.php#PMAURL-1:sql.php?db=skolnik_skolnik&table=webideas&server=1&target=&token=3c05041c4fcf54b595e75f8ccda5b9a8">skolnik.com/phpmyadmin</a></p>
			<p><a href="http://www.skolnik.com/blog/wp-login.php">skolnik.com/blog</a></p>
			<p><a href="http://skolnik.rjm/admin/newnewsletter.php">New Newsletter</a></p>
			<p><a href="http://skolnik.rjm/makenewsletter.php">Make Newsletter</a></p>
		</div>
		<div class="client">
			<h2><a href="http://www.skolnikwine.com">skolnikwine.com</a></h2>
			<p><a href="http://skolnikwine.com/cpanel">skolnikwine.com/cpanel</a></p>
			<p><a href="https://server2.sherwoodhosting.com:2083/cpsess5027170468/3rdparty/phpMyAdmin/index.php#PMAURL-0:index.php?db=&table=&server=1&target=&lang=en&collation_connection=utf8_general_ci&token=5e699c49b5e3b9bbc49f78db1c4d5406">skolnikwine.com/phpmyadmin</a></p>
			<p><a href="http://www.skolnikwine.com/rjlogin">skolnikwine.com/blog</a></p>
			<p><a href="http://skolnikwine.rjm">skolnikwine.rjm (local)</a></p>
		</div>
		<div class="client">
			<h2><a href="http://www.homestagingbyvivian.com">Homestaging By Vivian</a></h2>
			<p><a href="http://www.homestagingbyvivian.com/admincp">admin control panel</a></p>
			<p><a href="http:///homestagingbyvivian.rjm/">newviv.rjm  (local)</a></p>
			<p><a href="http://homestagingbyvivian.rjm//admincp">newviv.rjm/admincp (rjmilano/kether1330)</a></p>
		</div>
		<div class="client">
			<h2><a href="http://dgta.org">DGTA</a></h2>
			<p><a href="http://dgta.org/cpanel">DGTA CPanel</a></p>
			<p><a href="http://dgta.rjm/home.php">DGTA Local</a></p>
			<p><a href="http://dgta.rjmprogramming.com">DGTA Test</a></p>
			<p><a href="http://dgta.rjmprogramming.com/rjlogin">DGTA Test wordpress login</a></p>
			<p><a href="/dgta-wp">DGTA Development</a></p>
			<p><a href="/dgta-wp/wp-admin">DGTA Development wordpress login</a></p>
		</div>
		<div class="client">
			<h2><a href="http://www.wetrainconsulting.com">WE Train</a></h2>
			<p><a href="http://www.wetrainconsulting.com/blog/wp-admin">WE Train wordpress login</a></p>
			<p><a href="http://wetrain.rjm">WE Train local</a></p>
		</div>
		<div class="client">
			<h2><a href="http://executive-coach-for-lawyers.com/">Executive Coach for Lawyers</a></h2>
			<p><a href="http://coachforexecutives.rjm">Executive Coach for Lawyers Local</a></p>
		</div>
		<div class="client">
			<h2><a href="http://hmf2.com/">HMF2</a></h2>
			<p><a href="http://hmf2.rjm/">HMF2 Local</a></p>
		</div>
	</div>
	<h2>Wordpress</h2>
	<p><a href="http://codex.wordpress.org/Plugin_API/Filter_Reference">Filters</a></p>
</div>
<p><a href="http://skolnik.rjm/formmail/TEST.PHP">test</a></p>
</body>
</html>