<?php
/**
 * Class SampleTest
 *
 * @package Wp_Theme_Mods_Manager
 */

/**
 * Filter test case.
 */
class FilterTests extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	public function test_sample() {

		// Replace this with some actual testing code.
		$this->assertTrue( true );

	}

	public function test_textdomain()
	{
		var_dump( MagicThemeModsHolder::TEXTDOMAIN );

	}

	
}
