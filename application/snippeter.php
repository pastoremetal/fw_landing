<?php
class snippeter{
	private $textFile;
	
	public function __construct(array $lan){
		$textFile = "application/contents/{$lan['dir']}/texts.json";
		
		if(file_exists($textFile))
			$this->textFile = json_decode(file_get_contents($textFile), true);
			//json_decode(json_encode((array)simplexml_load_string($xml)),1);
			//print_r($this->textFile);exit;
	}
	
	public function getTexts(){
		return $this->textFile;
	}
	
}

?>