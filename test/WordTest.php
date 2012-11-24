<?php

require_once (dirname(__FILE__)."/../src/Anagrams.php");

class WordTest extends PHPUnit_Framework_TestCase {

	/**
	* @dataProvider some_words
	*/
	public function test_theWord_construction_utility(
		$aWord
	) {
		$this->assertEquals(
			new Word($aWord),
			Word::theWord($aWord)
		);
	}

	/**
	* @dataProvider some_words
	*/
	public function test_ordered_chars(
		$aWord,
		$correspondingOrderedChars
	) {
		$this->assertEquals(
			$correspondingOrderedChars,
			Word::theWord($aWord)->orderedChars()
		);
	}

	public static function some_words(
	) {
		return array(
			array("house",   "ehosu"),
			array("dog",     "dgo"),
			array("dogs",    "dgos"),
			array("hot-dog", "-dghoot"),
			array("skinny",  "iknnsy"),
			array("stress",  "erssst"),
			array("treses",  "eersst"),
		);
	}

}
