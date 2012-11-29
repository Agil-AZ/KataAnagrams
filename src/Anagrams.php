<?php

class Word {

	private $string;

	private $canonical;

	public function __construct(
		$string
	) {
		$this->string = $string;
		$this->canonical = $this->computeCanonical();
	}

	public function isAnagramOf(
		$anotherWord
	) {
		return $this->canonical() == $anotherWord->canonical();
	}

	public function canonical(
	) {
		return $this->canonical;
	}

	private function computeCanonical(
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

	public static function groups(
		$words_list
	) {
		$groups = array();
		foreach ($words_list as $string) {
			$canonical = get::aWord($string)->canonical();
			if (isset($groups[$canonical])) {
				$groups[$canonical][]= $string;
			} else {
				$groups[$canonical]= array($string);
			}
		}
		return $groups;
	}

}
