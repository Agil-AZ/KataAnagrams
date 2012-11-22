<?php

class Anagrams {

	public static $anagrams = array();

	public static function printAnagrams() {
		$ar=fopen(dirname(__FILE__)."/../english-words.95","r") or
    			die("No se pudo abrir el archivo");
  	
		while (!feof($ar))
 		 {
			$setToAnagram = false;
    			$word=fgets($ar);
			foreach (self::$anagrams as $anagram) {
				if ($anagram->acceptWord($word)) {
					$setToAnagram = true;
					break;
				}
			}
			if (!$setToAnagram) {
				self::$anagrams[]= new Anagram($word);
			}
 		 }
  		fclose($ar);

		foreach (self::$anagrams as $anagram) {
			$anagram->toString();
			echo "\n";
		}
	}
}

class Anagram {
	
	private $words = array();

	public function __construct($word) {
		$this->words[]= $word;
	}

	public function acceptWord($word) {
		if (strlen($this->words[0]) != strlen($word)) {
			return false;
		} else {
			for ($i=0; $i<strlen($word)-1; $i++) {
				if (strpos($this->words[0], $word[$i]) === false) {
					return false;
				}
			}
		}
		$this->words[]= $word;
		return true;
	}

	public function toString() {
		foreach ($words as $word) {
			echo $word . " ";
		}
	}

}


$anagram = Anagrams::printAnagrams();
