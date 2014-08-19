<?php

/**
 * @copyright Copyright (c) Metaways Infosystems GmbH, 2011
 * @license LGPLv3, http://www.arcavias.com/en/license
 */


class MShop_Locale_Manager_FactoryTest extends MW_Unittest_Testcase
{
	public function testCreateManager()
	{
		$target = 'MShop_Common_Manager_Interface';
		$manager = MShop_Locale_Manager_Factory::createManager(TestHelper::getContext());
		$this->assertInstanceOf($target, $manager);

		$manager = MShop_Locale_Manager_Factory::createManager(TestHelper::getContext(), 'Default');
		$this->assertInstanceOf($target, $manager);
	}

	public function testCreateManagerInvalidName()
	{
		$this->setExpectedException('MShop_Locale_Exception');
		$target = 'MShop_Common_Manager_Interface';
		$manager = MShop_Locale_Manager_Factory::createManager(TestHelper::getContext(), '%^&');
		$this->assertInstanceOf($target, $manager);
	}

	public function testCreateManagerNotExisting()
	{
		$this->setExpectedException('MShop_Exception');
		$target = 'MShop_Common_Manager_Interface';
		$manager = MShop_Locale_Manager_Factory::createManager(TestHelper::getContext(), 'test');
		$this->assertInstanceOf($target, $manager);
	}

}