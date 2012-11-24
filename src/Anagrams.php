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
		$theChars = array();
		for ($i = 0; $i < $wLength; $i++) {
			$theChars []= $this->theWord[$i];
		}
		sort($theChars);
		$theResult = "";
		foreach ($theChars as $aChar) {
			$theResult .= $aChar;
		}
		return $theResult;
	}

}
