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
		$this->assertEquals(
			array("rots", "sort"), 
			$result["orst"]
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

}
