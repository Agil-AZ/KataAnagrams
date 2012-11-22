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
			$numGroup = self::findGroup($word, $groups);
			if ($numGroup == -1) {
				$groups []= $word;
			} else {
				$groups[$numGroup] .= " ".$word;
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
		$wordsInGroup = explode(" ", $group);
		foreach ($wordsInGroup as $existingWord) {
			if (self::isAnagram($word, $existingWord)) {
				return true;
			}
		}
		return false;
	}

	public static function isAnagram(
		$aWord,
		$anotherWord
	) {
		if (strlen($aWord) != strlen($anotherWord)) {
			return false;
		}
		for ($i = 0; $i < strlen($aWord); $i++) {
			$theChar = $aWord[$i];
			if (strpos($anotherWord, $theChar) === false)
				return false;
		}
		return true;
	}

}
