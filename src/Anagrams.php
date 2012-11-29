<?php

class CanonicalExpressionForWord {

	public $canonical;

	public function __construct(
		$string
	) {
		$this->canonical = $this->buildCanonical($string);
	}

	private function buildCanonical(
		$string
	) {
		$result = "";
		foreach ($this->getOrderedLetters($string) as $letter) {
			$result .= $letter;
		}
		return $result;
	}

	private function getOrderedLetters(
		$string
	) {
		$letters = $this->getLetters($string);
		sort($letters);
		return $letters;
	}

	private function getLetters(
		$string
	) {
		$length = strlen($string);
		$letters = array();
		for ($i = 0; $i < $length; $i++) {
			$letters []= $string[$i];
		}
		return $letters;
	}

}

class get {

	public static function canonical(
		$theString
	) {
		return new CanonicalExpressionForWord($theString);
	}

	public static function groups(
		$words_list
	) {
		$groups = array();
		foreach ($words_list as $string) {
			$canonical = get::canonical($string)->canonical;
			if (isset($groups[$canonical])) {
				$groups[$canonical][]= $string;
			} else {
				$groups[$canonical]= array($string);
			}
		}
		return $groups;
	}

}
