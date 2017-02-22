<?php
class ManageLinks{
	
	private $fileName;
	private $handle;
	
	function __construct()
	{
		$this->fileName = 'mylinks.txt';
		$this->handle = fopen ($this->fileName, "a+");
		fclose($this->handle);
	}
	function __destruct() {
//		fclose($this->handle);
	}

	
	function add($name, $link) {
		$l = array ($name, $link);
		$record = serialize(array ($name, $link));
		$this->handle = fopen ($this->fileName, "a+");
		fwrite($this->handle, $record);
		fwrite($this->handle, "\r\n");
		fclose($this->handle);	
	}
	
	function get(){
		$result = '<ul>';
		$this->handle = fopen($this->fileName, "r");
		while (!feof($this->handle)) {
			$record = fgets($this->handle);
			if ($record)
			{
				$lnk = unserialize($record);
				$line = '<li><a href="http://'.$lnk[1]. '">'. $lnk[0].'</a></li>';
				$result .= $line;
			}
		}
		$result .= '</ul>';
		fclose($this->handle);
		return $result;
	}
}

$l = new ManageLinks;
$l->add('rjmprogramming', 'rjmprogramming.com');
$l->add('BitBucket', 'bitbucket.com');
$l->add('FaceBook', 'facebook.com');


