<?php

class Word {

	private $string;

	public function __construct(
		$string
	) {
		$this->string = $string;
	}

	public function isAnagramOf(
		$anotherWord
	) {
		return $this->canonical() == $anotherWord->canonical();
	}

	public function canonical(
	) {
		$length = strlen($this->string);
		$letters = array();
		for ($i = 0; $i < $length; $i++) {
			$letters []= $this->string[$i];
		}
		sort($letters);
		$result = "";
		foreach ($letters as $letter) {
			$result .= $letter;
		}
		return $result;
	}

}

class get {

	public static function aWord(
		$theString
	) {
		return new Word($theString);
	}

}
