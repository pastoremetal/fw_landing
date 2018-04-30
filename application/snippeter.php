<?php
class snippeter{
	private $textFile;
	private $snippet;
	private $language;
	private $database;

	public function __construct($snippet, array $lan, database $db){
		$textFile = "application/contents/{$lan['dir']}/texts.json";
		$this->snippet = $snippet;
		$this->language = $lan;
		if(file_exists($textFile))
			$this->textFile = json_decode(file_get_contents($textFile), true);

		$this->database = $db;

	}

	public function getTexts(){return $this->textFile;}
	public function getSnippet(){include $this->snippet;}

}

?>
