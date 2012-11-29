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

	private function canonical(
	) {
		$result = "";
		foreach ($this->getOrderedLetters() as $letter) {
			$result .= $letter;
		}
		return $result;
	}

	private function getOrderedLetters(
	) {
		$letters = $this->getLetters();
		sort($letters);
		return $letters;
	}

	private function getLetters(
	) {
		$length = strlen($this->string);
		$letters = array();
		for ($i = 0; $i < $length; $i++) {
			$letters []= $this->string[$i];
		}
		return $letters;
	}

}

class get {

	public static function aWord(
		$theString
	) {
		return new Word($theString);
	}

}
