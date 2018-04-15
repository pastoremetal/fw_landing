<?php
include "snippeter.php";

class config{	
	private $default_language = 'en';
	private $languages = array(
		'pt' => array("ab"=>"pt", "dir"=>"_pt", "name"=>"portugês"),
		'en' => array("ab"=>"en", "dir"=>"_en", "name"=>"english")
	);
	private $sLanguage;
	public $snippeter;
	
	public function __construct(){
		$uri = explode("/", $_SERVER['REQUEST_URI']);
		
		$lan = $uri[1];
		if($lan===null || !array_key_exists($lan, $this->languages))
			$lan = $this->default_language;
		
		$this->sLanguage = $this->languages[$lan];
		
		$this->snippeter = new snippeter($this->sLanguage);
	}
	
	public function getLanguage(){return $this->sLanguage;}
	
	
}


?>