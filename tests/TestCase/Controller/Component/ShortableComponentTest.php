<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ShortableComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ShortableComponent Test Case
 */
class ShortableComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\ShortableComponent
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
        $registry = new ComponentRegistry();
        $this->Shortable = new ShortableComponent($registry);
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
