<?php

require_once (dirname(__FILE__)."/../src/Anagrams.php");

class AnagramsTest extends PHPUnit_Framework_TestCase {

	/**
	* @dataProvider some_anagrams
	*/
	public function test_wordsThatAreAnagrams(
		$aString,
		$anotherString
	) {
		$this->assertEquals(
			get::aWord($aString)->canonical,
			get::aWord($anotherString)->canonical
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

	/**
	* @dataProvider some_non_anagrams
	*/
	public function test_wordsThatArentAnagrams(
		$aString,
		$anotherString
	) {
		$this->assertNotEquals(
			get::aWord($aString)->canonical,
			get::aWord($anotherString)->canonical
		);
	}

	public static function some_non_anagrams(
	) {
		return array(
			array("a", ""),
			array("ab", "bb"),
			array("abc", "aca"),
			array("abc", "aba"),
			array("sort", "robs"),
			array("sorts", "roots"),
		);
	}

	public function test_given_list_of_strings_compute_groups(
	) {
		$sample_list = array(
			"dog",
			"god",
			"root",
			"roots",
			"rost",
			"rosts",
			"rots",
			"sort",
			"sorts",
		);

		$groups = get::groups($sample_list);

		$this->assertEquals(5, count($groups));

		$this->assertEquals(
			array("dog", "god"),
			$groups["dgo"]
		);
		$this->assertEquals(
			array("root"),
			$groups["oort"]
		);
		$this->assertEquals(
			array("roots"),
			$groups["oorst"]
		);
		$this->assertEquals(
			array("rost", "rots", "sort"),
			$groups["orst"]
		);
		$this->assertEquals(
			array("rosts", "sorts"),
			$groups["orsst"]
		);
	}

}
