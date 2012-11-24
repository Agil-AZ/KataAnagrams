<?php

require_once (dirname(__FILE__)."/../src/Anagrams.php");

class AnagramsTest extends PHPUnit_Framework_TestCase {

	/* ACCEPTANCE TESTS */

	/**
	* @dataProvider input_files
	*/
	public function test_we_get_array_of_groups(
		$theFile
	) {
		$anagrams = new Anagrams($theFile);
		$this->assertTrue(is_array($anagrams->getGroups()));
	}

	/**
	* @dataProvider input_files
	*/
	public function test_we_get_known_result(
		$theFile
	) {
		$anagrams = new Anagrams($theFile);
		$result = $anagrams->getGroups();
		$this->assertEquals(
			array("rost", "rots", "sort"), 
			$result["orst"]
		);
	}

	/* ENDOF ACCEPTANCE TESTS */

	/**
	* @dataProvider input_files
	*/
	public function test_we_store_the_input_lines(
		$theFile,
		$theLines
	) {
		$anagrams = new Anagrams($theFile);
		$this->assertTrue(is_array($anagrams->input_lines));
		$this->assertEquals(
			$theLines,
			count($anagrams->input_lines)
		);
	}

	public static function input_files(
	) {
		return array(
			array(dirname(__FILE__)."/../small.txt",  18),
			array(dirname(__FILE__)."/../medium.txt", 251),
			array(dirname(__FILE__)."/../large.txt",  219156),
		);
	}

}
