<?php
abstract class carousel_tests_AbstractBaseIntegrationTest extends carousel_tests_AbstractBaseTest
{
	/**
	 * @return void
	 */
	public function prepareTestCase()
	{
		$this->loadSQLResource('integration-test.sql', true, false);
	}
}