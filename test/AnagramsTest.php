<?php

require_once (dirname(__FILE__)."/../src/Anagrams.php");

class AnagramsTest extends PHPUnit_Framework_TestCase {

	private $anagrams;

	public function setUp(
	) {
		$this->anagrams = new Anagrams(dirname(__FILE__)."/../english-words.96");
	}

	/* ACCEPTANCE TESTS */

	public function test_we_get_array_of_groups(
	) {
		$this->assertTrue(is_array($this->anagrams->getGroups()));
	}

	public function test_we_get_known_result(
	) {
		$result = $this->anagrams->getGroups();
		$this->assertTrue(
			in_array("rots sort", $result)
		);
	}

	/* ENDOF ACCEPTANCE TESTS */

	public function test_we_store_the_input_lines(
	) {
		$this->assertTrue(is_array($this->anagrams->input_lines));
		$this->assertEquals(
			17,
			count($this->anagrams->input_lines)
		);
	}

	public function test_word_is_anagram(
	) {
		$this->assertTrue(Anagrams::isAnagram("sort", "sort"));
		$this->assertTrue(Anagrams::isAnagram("sort", "rots"));
		$this->assertFalse(Anagrams::isAnagram("sort", "ots"));
		$this->assertFalse(Anagrams::isAnagram("sort", "a"));
	}

	public function test_word_is_in_group(
	) {
		$this->assertTrue(Anagrams::wordIsInGroup("sort", "a b sort"));
		$this->assertTrue(Anagrams::wordIsInGroup("sort", "sort"));
		$this->assertTrue(Anagrams::wordIsInGroup("sort", "rots sort"));
		$this->assertFalse(Anagrams::wordIsInGroup("sort", "ots sot"));
		$this->assertFalse(Anagrams::wordIsInGroup("sort", "a"));
	}

	/**
	* @dataProvider groups_and_words
	*/
	public function test_find_group(
		$expectedIndex,
		$word,
		$groups
	) {
		$this->assertEquals(
			$expectedIndex,
			Anagrams::findGroup($word, $groups)
		);
	}
 
	public static function groups_and_words(
	) {
		return array(
			array(-1, "sort", array("a")),
			array(-1, "sort", array("a", "rts")),
			array(0, "sort", array("rots")),
			array(1, "sort", array("a", "rots")),
			array(2, "sort", array("a", "b", "rots")),
			array(2, "sort", array("a", "b", "rots sort")),
		);
	}

}
