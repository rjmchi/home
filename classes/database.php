<?php
class HomeDB extends SQLite3 {
	private $error_msg = array();
	private $image_dir = '/home/images/';

	function __construct() {		
		$dbname = $_SERVER['DOCUMENT_ROOT'] . "/home/home.db";
		try {
			parent::__construct($dbname,SQLITE3_OPEN_READWRITE );	
		}
		catch (Exception $e){
			parent::__construct($dbname);
			$this->createTable();
		}
	}

	function createTable() {
		$this->exec( 'drop table if exists `links`' );

		$sql = "
		CREATE TABLE `links` 
		( `id` INTEGER PRIMARY KEY, 
		 `name` VARCHAR(255) NOT NULL , 
		 `link` VARCHAR(255) NOT NULL , 
		 `image` VARCHAR(255) ,
		 'image_width' VARCHAR(50),
		 'image_height' VARCHAR(50),
		 `sort_order` INTEGER NOT NULL DEFAULT '0')";
		
		$ret = $this->exec( $sql );
		if ( !$ret ) {
			$error_msg[] = $this->lastErrorMsg();
			return false;
		} else {
			return true;
		}
	}

	public function addLink( $name, $link, $image, $width=null, $height=null, $sort_order = 0 ) {

		try {
			$stmt = $this->prepare( "insert into `links` (`name`, `link`, `image`, `sort_order`)values(:name, :link, :image, :sort_order)" );
			$stmt->bindValue( ':name', $name );
			$stmt->bindValue( ':link', $link );
			$stmt->bindValue( ':image', $image );
			$stmt->bindValue( ':sort_order', $sort_order );

			$stmt->execute();

			return true;
		} catch ( Exception $e ) {
			die( $e->getMessage() );
		}
	}

	public function insert ($table, $params) {
		$delim = '';
		$cols = '';
		$values='';
		
		foreach ($params as $col=>$value){
			$cols .= $delim;
			$cols .= $col;
			$values .= $delim;
			$col = ':'.$col;
			$values .= $col;
			$delim=', ';
		}
		$sql = "insert into {$table} ({$cols}) values ({$values})";
		
		try {
			$stmt = $this->prepare( $sql );
			foreach ($params as $col=>$value) {
				$stmt->bindValue(':'.$col, $value);
			}

			$stmt->execute();

			return true;
		} catch ( Exception $e ) {
			die( $e->getMessage() );
		}
	}
	
	function delete($table, $id) {
		$sql = "delete from {$table} where id=:id";
		$stmt = $this->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
	}
	
	function get_errors() {
		if ( sizeof( $errors ) > 0 ) {
			$lst = '<ul>';
			foreach ( $errors as $error ) {
				$lst += '<li>' . $error . '</li>';
			}
			$lst += '</ul>';
			return $lst;
		}
		return false;
	}
	
	function getLinks() {
		$ret = $this->query( 'select * from `links` order by `sort_order` ' );
		if ($ret) { ?>
			<ul>
			<?php 
				   while ( $row = $ret->fetchArray( SQLITE3_ASSOC ) ) {
						$objRow= (object) $row;
					  	if ($objRow->image!= null) {
							$img = "<img src=\"{$this->image_dir}{$objRow->image}\" {$objRow->image_width} {$objRow->image_height} alt=\"{$objRow->name}\" title=\"{$objRow->name}\">";
						}
			?>
				   <li>
				   	<a href="http://<?php echo $objRow->link;?>">
				   		<?php echo $objRow->image?$img:$objRow->name;?>
				   	</a>
				   </li>
			<?php 	} ?>
	</ul>
<?php
		}
	}
	function listLinks() {
		$ret = $this->query( 'select * from `links` order by `sort_order` ' );
		$links = array();
		if ($ret) {
			while ( $row = $ret->fetchArray( SQLITE3_ASSOC ) ) {
				$links[]= (object) $row;
			}
		}
		return $links;
	}
}

$db = new HomeDB();
if ( !$db ) {
	echo $db->get_errors();
	die('abort');
}
