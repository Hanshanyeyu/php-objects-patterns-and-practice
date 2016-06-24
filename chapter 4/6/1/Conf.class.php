<?php

class Conf  {
	private $file;
	private $xml;
	private $lastMatch;

	function __construct ( $file ) {
		$this->file = $file;
		$this->xml = simplexml_load_file($file);
	}

	function write(){
		file_put_contents( $this->file , $this->xml->asXml() );
	}

	function get( $str ){
		$matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
		if( count( $matches )  ){
			$this->lastMatch = $matches[0];
			return (string) $matches[0];
		}
		return null;		
	}

	function set ( $key , $value ) {
		if( ! is_null ( $this->get( $key ) ) ) {
			$this->lastMatch[0] = $value;
			return ;
		}
		$conf = $this->xml->conf;
		$this->xml->addChild('item' , $value )->addAttribute ( ' name' , $key );
	}
}

try{
	$filename = "Simple.xml";
	$conf = new Conf( $filename );


	print "User : ". $conf->get("user") ;
	echo "<p></p>";
	print "Host : ". $conf->get("host") ;
	echo "<p></p>";
	$conf->set( "pass" , "newpass" );
	$conf->write();

	echo '<pre>';
	var_dump($conf);
	echo '<pre>';

}catch(Exception $e){
	var_dump( $e->getMessage() );
}

