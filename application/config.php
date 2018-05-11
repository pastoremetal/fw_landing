	<?php
include "snippeter.php";
include "database.php";

class config{
	private $default_language = 'en';
	private $default_snippet = 'main';
	private $languages = array(
		'pt' => array("ab"=>"pt", "dir"=>"_pt", "name"=>"portugês"),
		'en' => array("ab"=>"en", "dir"=>"_en", "name"=>"english")
	);
	private $sLanguage;
	public $snippeter;
	private $controller;

	public function __construct(){
		$uri = (isset($_SERVER['REDIRECT_URL']))?explode("/", $_SERVER['REDIRECT_URL']):array(1=>$this->default_language, 2=>$this->default_snippet);
		$uri[1] = (!isset($uri[1]))?$_SESSION['language']:$uri[1];
		$uri[2] = (!isset($uri[2]))?$this->default_snippet:$uri[2];
		$lan = $uri[1];
		if($lan===null || !array_key_exists($lan, $this->languages))
			$lan = $this->default_language;

		$_SESSION['language'] = $lan;
		$this->controller = ($uri[2]===null || !is_file("application/snippets/{$this->default_snippet}.php"))?$this->default_snippet:$uri[2];
		$snp = "application/snippets/{$this->controller}.php";
		/*$snp = "application/snippets/{$uri[2]}.php";
		$this->controller = $uri[2];
		if($uri[2]===null || !is_file($snp))
			$snp = "application/snippets/{$this->default_snippet}.php";
		*/

		$this->sLanguage = $this->languages[$lan];
		$db = new database();
		$this->snippeter = new snippeter($snp, $this->sLanguage, $db);
	}

	public function getLanguage(){return $this->sLanguage;}
	public function getController(){return $this->controller;}

}


?>
