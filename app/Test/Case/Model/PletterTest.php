<?php
App::uses('Pletter', 'Model');

/**
 * Pletter Test Case
 *
 */
class PletterTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.pletter', 'app.project', 'app.tray', 'app.item_type', 'app.item', 'app.items_project', 'app.items_item', 'app.project_plan', 'app.pletter_project');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pletter = ClassRegistry::init('Pletter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pletter);

		parent::tearDown();
	}

}
