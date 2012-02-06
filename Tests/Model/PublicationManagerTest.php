<?php

namespace SarSport\PublicationBundle\Tests\Model;

use PHPUnit_Framework_TestCase;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * @group SarSport_Publication
 * @group SarSport_Manager
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
        $this->uut = $this->getMockForAbstractClass('SarSport\PublicationBundle\Model\PublicationManager');
    }

    protected function tearDown()
    {
        unset($this->uut);
    }
}
