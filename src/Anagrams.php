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
		$wLength = strlen($aWord);
		if ($wLength != strlen($anotherWord)) {
			return false;
		}
		for ($i = 0; $i < $wLength; $i++) {
			$theChar = $aWord[$i];
			if (strpos($anotherWord, $theChar) === false)
				return false;
		}
		return true;
	}	

}
