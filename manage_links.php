<?php require_once('classes/database.php');?>

<?php if (isset($_POST['update'])){
	echo 'update' ;
	echo $_POST['id'];
}?>
<?php
if (isset ($_POST['delete'])){
	$db->delete('links', $_POST['id']);
}
?>
<?php $links = $db->listLinks();?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Links</title>
</head>

<body>
<div class="page-wrap">
	<header>
		<h2>Manage Homepage Links</h2>
	</header>
	<div class="content">

		<?php foreach ($links as $link) { ?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">		
				<input type="hidden" name="id" value="<?php echo $link->id;?>">
				<input type="text" name="name" value="<?php echo $link->name;?>">
				<input type="text" name="link" value="<?php echo $link->link;?>">
				<input type="text" name="image" value="<?php echo $link->image;?>">
				<input type="text" name="width" value="<?php echo $link->image_width;?>">
				<input type="text" name="height" value="<?php echo $link->image_height;?>">
				<input type="text" name="sort_order" value="<?php echo $link->sort_order;?>">
				
				<button type="submit" name="update">Update</button>
				<button type="submit" name="delete">Delete</button>
			</form>			
		<?php }?>
		

	</div>
	<footer>
		
	</footer>
</div>
</body>
</html>