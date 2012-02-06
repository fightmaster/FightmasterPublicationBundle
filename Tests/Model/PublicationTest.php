<?php

namespace SarSport\PublicationBundle\Tests\Model;

use PHPUnit_Framework_TestCase;
use DateTime;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * @group SarSport_Publication
 * @group SarSPort_Model
 */
class PublicationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|\SarSport\PublicationBundle\Model\Publication
     */
    protected $uut;

    public function testGettersAndSetters()
    {
        $time1= new DateTime();
        $time2 = new DateTime('2000-12-10 12:34:00');
        $this->uut->setBody('Text Text')
            ->setCreatedAt($time1)
            ->setPreview('Preview1')
            ->setSlug('Slug1')
            ->setTitle('Title1')
            ->setUpdatedAt($time2);
        $this->assertEquals('SarSport.publication.author.name', $this->uut->getAuthorName());
        $this->assertEquals('Text Text', $this->uut->getBody());
        $this->assertEquals($time1, $this->uut->getCreatedAt());
        $this->assertEquals('Preview1', $this->uut->getPreview());
        $this->assertEquals('Slug1', $this->uut->getSlug());
        $this->assertEquals('Title1', $this->uut->getTitle());
        $this->assertEquals($time2, $this->uut->getUpdatedAt());

    }

    protected function setUp()
    {
        $this->uut = $this->getMockForAbstractClass('SarSport\PublicationBundle\Model\Publication');
    }

    protected function tearDown()
    {
        unset($this->uut);
    }
}
