<?php
abstract class carousel_tests_AbstractBaseUnitTest extends carousel_tests_AbstractBaseTest
{
	/**
	 * @return void
	 */
	public function prepareTestCase()
	{
		$this->resetDatabase();
	}
}