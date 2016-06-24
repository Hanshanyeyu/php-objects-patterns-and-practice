<?php
require 'Exception.class.php';

class Conf  {
	private $file;
	private $xml;
	private $lastMatch;

	function __construct ( $file ) {
		$this->file = $file;
		if(! file_exists( $file)){
			throw new FileException(" file '$file' does not exist  ");
		}


		$this->xml = simplexml_load_file( $file, null, LIBXML_NOERROR);
		if(! is_object( $this->xml )){
			throw new XmlException( libxml_get_last_error() );
		}

		print gettype( $this->xml );

		$matches = $this->xml->xpath("/conf");
		if ( ! count( $matches ) ) {
			throw new ConfException( "could not find root element: conf" );
		}
	}

	function write(){

		if( ! is_writable( $this->file )) {
			throw new FileException ("file '{$this->file}' is not writeable ");
		}

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

} catch ( FileException $e ) {
	var_dump( $e->__toString() );
} catch ( XmlException $e ) {
	var_dump( $e->__toString() );
} catch ( ConfException $e ) {
	var_dump( $e->__toString() );
} catch ( Exception $e ) {

	echo ' $e->getMessage() : <br>';
	var_dump( $e->getMessage() );

	echo "<p></p>";

	echo ' $e->__toString() : <br>';
	var_dump( $e->__toString() );

	throw $e;
}


