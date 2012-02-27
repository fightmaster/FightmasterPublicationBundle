<?php

namespace Fightmaster\PublicationBundle\Tests\Model;

use PHPUnit_Framework_TestCase;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * @group Fightmaster_Publication
 * @group Fightmaster_Manager
 */
class PublicationManagerTest extends PHPUnit_Framework_TestCase
{
    protected $uut;

    /**
     * @test
     */
    public function createPublication()
    {
        $this->fail('Not implemented');
    }

    protected function setUp()
    {
        $this->uut = $this->getMockForAbstractClass('Fightmaster\PublicationBundle\Model\PublicationManager');
    }

    protected function tearDown()
    {
        unset($this->uut);
    }
}
