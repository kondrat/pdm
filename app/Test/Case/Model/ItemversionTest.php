<?php
App::uses('Itemversion', 'Model');

/**
 * Itemversion Test Case
 *
 */
class ItemversionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.itemversion', 'app.item', 'app.tray', 'app.item_type', 'app.project', 'app.project_plan', 'app.items_project', 'app.pletters_project', 'app.pletter', 'app.pletter_project', 'app.itemissue', 'app.items_item');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Itemversion = ClassRegistry::init('Itemversion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Itemversion);

		parent::tearDown();
	}

}
