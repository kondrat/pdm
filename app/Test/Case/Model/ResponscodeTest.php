<?php
App::uses('Responscode', 'Model');

/**
 * Responscode Test Case
 *
 */
class ResponscodeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.responscode', 'app.item', 'app.tray', 'app.item_type', 'app.project', 'app.project_plan', 'app.items_project', 'app.pletter_project', 'app.pletter', 'app.itemversion', 'app.itemversions_itemsversion', 'app.itemissue', 'app.items_item');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Responscode = ClassRegistry::init('Responscode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Responscode);

		parent::tearDown();
	}

}
