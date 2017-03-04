<?php
class ManageReminders{
	public $dbh;
	
	function __construct()
	{
		date_default_timezone_set('America/Chicago');
		$now = localtime(time(), true);
		$m = $now['tm_mon']+1;
		$y = $now['tm_year']+1900;
		$d = $now['tm_mday'];
		$this->today = mktime(0,0,0,$m, $d, $y);	
		
		$dbname = "reminders";
		$user = "root";
		$pw = "";
		$server = "localhost";
		
		try {
			$this->dbh = new PDO("mysql:host=$server;dbname=$dbname", $user, $pw);
		}
		catch (PDOException $e)
		{
			die ($e->getMessage());
		}
		
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$this->dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
	}
	
	function getReminders() {
		try 
		{
			$sth = $this->dbh->prepare("select * from reminders order by due_date");
			$sth->execute();
			$rsReminders = $sth->fetchAll(PDO::FETCH_OBJ);
		}
		catch (PDOException $e)
		{
			die ($e->getMessage());
		}
		return $rsReminders;
	}
	
	function addReminder($date, $message)
	{
		try 
		{
			$sth = $this->dbh->prepare("insert into reminders(due_date, message) values(:date, :message)");
			$sth->bindParam(':date', $date);
			$sth->bindParam(':message', $message);
			$c = $sth->execute();
		}
		catch (PDOException $e)
		{
			die ($e->getMessage());
		}
		return $this->dbh->lastInsertId(); 
	}
	
	function deleteReminder($id){
		try 
		{
			$sth = $this->dbh->prepare("delete from reminders where id=:id");
			$sth->bindParam(':id', $id);
			$c = $sth->execute();
		}
		catch (PDOException $e)
		{
			die ($e->getMessage());
		}
	}
	

	function showReminders() {
?>
		<table>
<?php
		$Reminders = $this->getReminders();
		$odd = true;
		foreach ($Reminders as $reminder)
		{
			$odd = !$odd;
			if ($reminder->due_date)
			{
				if ($reminder->due_date == '2147483647')
				{
					$strdate = '';
				}
				else
				{
					$strdate = date( 'm-d-Y', $reminder->due_date );
				}
			}
			else
			{
				$strdate = '';
			}
			$class = $odd?'odd':'even';
			if ($reminder->due_date == $this->today)
			{
				$class .= ' today';
			}
			if ($reminder->due_date < $this->today)
			{
				$class = 'past';
			}
			
?>
			<tr class="<?php echo $class;?>">
				<td><?php echo $strdate;?></td>
				<td><?php echo $reminder->message;?></td>
				<td>
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
						<input name="delete" type="image" value="delete" src="images/del.png" alt="Delete">
						<input name="id" type="hidden" value="<?php echo $reminder->id;?>">
					</form>
				</td>
			</tr>
<?php
		}
?>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			<tr>
				<td> <input name="date" type="text"></td>
				<td><input name="message" type="text"></td>
				<td><input name="add" type="submit" value="Add"></td>
			</tr>		
			</form>
			
		</table>
<?php
	}
}

//$reminders  = new ManageReminders;
//$duedate = strtotime('2016-2-28');
//$reminders->addReminder($duedate, 'test');
//$reminders->printDates();


