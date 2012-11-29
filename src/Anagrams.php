<?php

class Word {

	private $word;

	public function __construct(
		$word
	) {
		$this->word = $word;
	}

	public function isAnagramOf(
		$anotherWord
	) {
		return $this->canonical() == $anotherWord->canonical();
	}

	public function canonical(
	) {
		$length = strlen($this->word);
		$letters = array();
		for ($i = 0; $i < $length; $i++) {
			$letters []= $this->word[$i];
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
		$theWord
	) {
		return new Word($theWord);
	}

}
