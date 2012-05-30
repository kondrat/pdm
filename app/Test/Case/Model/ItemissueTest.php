<?php
App::uses('Itemissue', 'Model');

/**
 * Itemissue Test Case
 *
 */
class ItemissueTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.itemissue', 'app.item', 'app.tray', 'app.item_type', 'app.project', 'app.project_plan', 'app.items_project', 'app.pletters_project', 'app.pletter', 'app.pletter_project', 'app.itemversion', 'app.items_item');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Itemissue = ClassRegistry::init('Itemissue');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Itemissue);

		parent::tearDown();
	}

}
