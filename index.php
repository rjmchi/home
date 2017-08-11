<?php require_once('classes/class.reminder.php');?>
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
		<?php $reminders->showReminders(); ?>
	</div>
	<nav class="menu">
		<ul>
			<li><a href="http://www.unstoppableguitarsystem.com/categories/74607">Guitar Lessons</a></a></li>
		<li><a href="http://connect.jujama.com/NGLCC17">nglcc17</a></li>
			<li><a href="http://duckduckgo.com"><img src="images/duckduckgo.jpg" width="150" height="99"></a> </li>
			<li><a href="http://google.com"><img src="images/google.jpg" width="150" height="53"></a> </li>
			<li><a href="http://youtube.com"><img src="images/youtube.jpg" width="150" height="106" alt="YouTube"></a> </li>
			<li> <a href="http://dvd.netflix.com/Queue?lnkctr=mhbque&qtype=DD"><img src="images/netflix.png" width="150" height="40" alt="Netflix"></a> </li>
			<li><a href="http://www.hulu.com"><img src="images/hulu.svg" alt="Hulu" width="150" height="40"></a></li>
			<li><a href="https://www.tdameritrade.com"><img src="images/tdameritrade.png" width="150" height="40" alt="TD Ameritrade"></a> </li>
			<li><a href="http://facebook.com"><img src="images/facebook.png" width="150" height="43" alt="Facebook"></a> </li>
			<il><a href="http://chicagopotters.com"><img src="images/chicagopotters.jpg" alt="ChicagoPotters" width="150" height="64"></a> </il>
			<li><a href="http://www.skolnik.com"><img src="images/skolnik.jpg" alt="Skolnik Industries" width="150" height="42"></a> </li>
			<li><a href="http://www.skolnik.com/blog/wp-admin">Skolnik Wordpress</a> </li>
			
			<li><a href="https://www.linkedin.com/"><img src="images/linkedin.jpg" width="150" height="48" alt="LinkedIn"></a> </li>
			
			<li><a href="http://imdb.com"><img src="images/imdb.jpg" width="150" height="72" alt="IMDB"></a> </li>
			
			 <li>
			 	<a href="http://www.rjmchicago.com"><img src="images/rjmchicagologo.jpg" alt="RJMChicago.com" width="150"></a>
			 </li>
			<li><a href="http://www.rjmprogramming.com">RJMProgramming.com</a> </li>
			<li><a href="http://rjmprogramming.com/get_comments.php">RJMProgramming.com Comments</a> </li>
			
			<li>
				<a href="http://www.rjmprogramming.com/cpanel">RJMProgramming CPanel</a>
			</li>
			<li><a href="http://constantcontact.com/login"><img src="images/constant-contact.png" alt="constant contact" width="150" height="25"></a> </li>
			<li><a href="http://127.0.0.1/phpmyadmin">Local PHPMyAdmin</a> </li>
			
			<li>
			 	<a href="http://layerstyles.org/">Layer Styles</a>
			 </li>
			 
			<li><a href="http://primercss.com/index.php">Primer CSS</a> </li>
			
			<li>
				<a href="https://pixlr.com/">Pixlr</a> </li>
				
				<li>
					<a href="http://www.spritecow.com/">Sprite Cow</a>
				</li>
			<li><a href="http://127.0.0.1/wordpress">Local Wordpress</a> </li>
			
			<li>
				<a href="http://www.myprimemail.com"><img src="images/primemail.gif" alt="prime mail" width="150" height="16"></a>
			</li>
			<li><a href="http://astrolibrary.org/lessons/">Astrology Lessons</a> </li>
			
			 <li>
			 	<a href="https://www.google.com/webmasters/tools/home?hl=en">Webmaster Tools</a>
			 </li>
			<li><a href="http://tutorial-index.com/">Tutorial Index</a> </li>
			
			<li>
			 	<a href="https://www.youtube.com/watch?v=LIqwpwZJlMo">Tarot Documentary</a>
			 </li>
			 <li><a href="http://fitbay.com">FitBay</a></li>
			 <li><a href="http://www.colorzilla.com/gradient-editor/">CSS Gradient Generator</a></li>
			 <li><a href="https://github.com/"><img src="images/github.png" alt="GitHub" width="150" height="38"></a></li>
			 <li><a href="https://bitbucket.org/"><img src="images/bitbucket.png" alt="Bitbucket" width="150"></a></li>
			 <li><a href="http://www.digitalartsonline.co.uk/features/typography/best-free-fonts-30-free-typefaces-every-designer-should-have/">Free fonts</a></li>
			 <li><a href="http://localhost/search-replace-db/">Search Replace Database (move wordpress)</a></li>
			 <li><a href="https://css-tricks.com/snippets/css/a-guide-to-flexbox/">Flexbox</a></li>
		</ul>
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