<?php

require_once (dirname(__FILE__)."/../src/Anagrams.php");

class AnagramsTest extends PHPUnit_Framework_TestCase {

	private $anagrams;

	public function setUp(
	) {
		$this->anagrams = new Anagrams(dirname(__FILE__)."/../medium.txt");
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
			in_array(array("rots", "sort"), $result)
		);
	}

	/* ENDOF ACCEPTANCE TESTS */

	public function test_we_store_the_input_lines(
	) {
		$this->assertTrue(is_array($this->anagrams->input_lines));
		$this->assertEquals(
			250,
			count($this->anagrams->input_lines)
		);
	}

	public function test_word_is_anagram(
	) {
		$this->assertTrue(Anagrams::isAnagram("sort", "sort"));
		$this->assertTrue(Anagrams::isAnagram("sort", "rots"));
		$this->assertFalse(Anagrams::isAnagram("sort", "ots"));
		$this->assertFalse(Anagrams::isAnagram("sort", "a"));
		$this->assertFalse(Anagrams::isAnagram("sorts", "trors"));
	}

	public function test_word_is_in_group(
	) {
		$this->assertTrue(Anagrams::wordIsInGroup("sort", array("sort")));
		$this->assertTrue(Anagrams::wordIsInGroup("sort", array("rots", "sort")));
		$this->assertFalse(Anagrams::wordIsInGroup("sort", array("ots", "sot")));
		$this->assertFalse(Anagrams::wordIsInGroup("sort", array("a")));
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
			array(
				-1, 
				"sort", 
				array(
					array("a")
				)
			),
			array(
				-1, 
				"sort", 
				array(
					array("a"), 
					array("rts")
				)
			),
			array(
				0, 
				"sort",  
				array(
					array("rots")
				)
			),
			array(
				1, 
				"sort",  
				array(
					array("a"), 
					array("rots")
				)
			),
			array(
				2, 
				"sort",  
				array(
					array("a"), 
					array("b"), 
					array("rots")
				)
			),
			array(
				2, 
				"sort",  	
				array(
					array("a"), 
					array("b"), 
					array("rots", "sort")
				)
			),
		);
	}

}
