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
			$numGroup = self::findGroup($word, $groups);
			if ($numGroup == -1) {
				$groups []= array($word);
			} else {
				$groups[$numGroup][]= $word;
			}
		}
		return $groups;
	}

	public static function findGroup(
		$word,
		$groups
	) {
		for ($index = 0; $index < count($groups); $index++) {
			$group = $groups[$index];
			if (self::wordIsInGroup($word, $group)) {
				return $index;
			}
		}
		return -1;
	}

	public static function wordIsInGroup(
		$word,
		$group
	) {
		return self::isAnagram($word, $group[0]);
	}

	public static function isAnagram(
		$aWord,
		$anotherWord
	) {
		return Word::theWord($aWord)->orderedChars()
			== Word::theWord($anotherWord)->orderedChars();
	}	

}

class Word {

	private $theWord;
	private $canonical;
	public static $zero_histogram;

	public function __construct(
		$theWord
	) {
		$this->theWord = $theWord;
		$this->canonical = $this->orderChars();
	}

	public static function theWord(
		$theWord
	) {
		return new Word($theWord);
	}

	public function orderedChars(
	) {
		return $this->canonical;
	}

	private function orderChars(
	) {
		$wLength = strlen($this->theWord);
		$histogram = self::$zero_histogram;
		for ($i = 0; $i < $wLength; $i++) {
			$theChar = $this->theWord[$i];
			if (isset($histogram[$theChar])) {
				$histogram[$theChar]++;
			}
		}
		$result = "";
		foreach ($histogram as $char => $count) {
			for (; $count > 0; $count--) {
				$result .= $char;
			}
		}
		return $result;
	}

}

Word::$zero_histogram = array(
	'\'' => 0, '-' => 0,
	'A' => 0, 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0, 
	'F' => 0, 'G' => 0, 'H' => 0, 'I' => 0, 'J' => 0,
	'K' => 0, 'L' => 0, 'M' => 0, 'N' => 0, 'O' => 0, 
	'P' => 0, 'Q' => 0, 'R' => 0, 'S' => 0, 'T' => 0,
	'U' => 0, 'V' => 0, 'W' => 0, 'X' => 0, 'Y' => 0, 'Z' => 0, 
	'a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 
	'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0,
	'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 
	'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0,
	'u' => 0, 'v' => 0, 'w' => 0, 'x' => 0, 'y' => 0, 'z' => 0, 
	'Á' => 0, 'É' => 0, 'Í' => 0, 'Ó' => 0, 'Ú' => 0,
	'á' => 0, 'é' => 0, 'í' => 0, 'ó' => 0, 'ú' => 0,
);
