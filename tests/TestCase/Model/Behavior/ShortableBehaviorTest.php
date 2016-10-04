<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\ShortableBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\ShortableBehavior Test Case
 */
class ShortableBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Behavior\ShortableBehavior
     */
    public $Shortable;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Shortable = new ShortableBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Shortable);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
