<?php

class Anagrams {

	public $input_lines;

	public function __construct(
		$fileName
	) {
		$this->input_lines = file($fileName);
	}

	public function getGroups(
	) {
		$groups = array();
		foreach ($this->input_lines as $word) {
			$word = trim($word);
			$theWord = Word::theWord($word);
			$canonical = $theWord->orderedChars();

			if (isset($groups[$canonical])) {
				$groups[$canonical][]= $word;
			} else {
				$groups[$canonical] = array($word);
			}
		}
		return $groups;
	}

}

class Word {

	private $theWord;
	private $canonical;

	public static $zero_histogram;
	private static $instances = array();

	public function __construct(
		$theWord
	) {
		$this->theWord = $theWord;
		$this->canonical = $this->orderChars();
	}

	public static function theWord(
		$theWord
	) {
		if (isset(self::$instances[$theWord])) {
			return self::$instances[$theWord];
		}
		$instance = new Word($theWord);
		self::$instances[$theWord] = $instance;
		return $instance;
	}

	public function orderedChars(
	) {
		return $this->canonical;
	}

	private function orderChars(
	) {
		$result = "";
		foreach ($this->computeHistogram() as $char => $count) {
			for (; $count > 0; $count--) {
				$result .= $char;
			}
		}
		return $result;
	}

	private function computeHistogram(
	) {
		$wLength = strlen($this->theWord);
		$histogram = self::$zero_histogram;
		for ($i = 0; $i < $wLength; $i++) {
			$theChar = $this->theWord[$i];
			if (isset($histogram[$theChar])) {
				$histogram[$theChar]++;
			}
		}
		return $histogram;
	}

}

Word::$zero_histogram = array(
	'\'' => 0, '-' => 0,
	'a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 
	'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0,
	'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 
	'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0,
	'u' => 0, 'v' => 0, 'w' => 0, 'x' => 0, 'y' => 0, 'z' => 0, 
	'á' => 0, 'é' => 0, 'í' => 0, 'ó' => 0, 'ú' => 0,
);
