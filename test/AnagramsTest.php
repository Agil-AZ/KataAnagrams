<?php

require_once (dirname(__FILE__)."/../src/Anagrams.php");

class AnagramsTest extends PHPUnit_Framework_TestCase {

	/**
	* @dataProvider some_anagrams
	*/
	public function test_wordsThatAreAnagrams(
		$aWord,
		$anotherWord
	) {
		$this->assertTrue(
			get::aWord($aWord)->isAnagramOf(
				get::aWord($anotherWord)
			)
		);
	}

	public static function some_anagrams(
	) {
		return array(
			array("a", "a"),
			array("ab", "ba"),
			array("abc", "bca"),
			array("abc", "cba"),
			array("sort", "rots"),
		);
	}

}
