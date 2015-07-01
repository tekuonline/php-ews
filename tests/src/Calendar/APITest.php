<?php

namespace jamesiarmes\PEWS\Calendar\Test;

use Mockery;
use PHPUnit_Framework_TestCase;
use jamesiarmes\PEWS\API\Enumeration;

class APITest extends PHPUnit_Framework_TestCase
{
    private $_mock;

    public function getClientMock()
    {
        if (!isset($_mock)) {
            $mock = Mockery::mock('jamesiarmes\PEWS\Calendar\API');
            $mock->shouldDeferMissing();
            $this->_mock = $mock;
        }

        return $this->_mock;
    }

    public function testGetCalendarFolder()
    {
        $mock = $this->getClientMock();

        $return = new \stdClass();
        $return->CalendarFolder = 'test';
        $mock->shouldReceive('getFolder')->with(Mockery::on(function($args)
        {
            $this->assertEquals('calendar', $args);

            return true;
        }))->andReturn($return);

        $mock->getCalendarFolder();
    }

    public function testCreateItems()
    {
        $api = $this->getClientMock();

        $args = array(
            array('CalendarItem' => array('Start' => 'Now')),
            array('SendMeetingInvitations' => Enumeration\CalendarItemCreateOrDeleteOperationType::SEND_TO_NONE)
        );

        $api->shouldReceive('createItems')->withArgs($args)->andReturn(true)->once();
        $api->shouldReceive('createItems')->withAnyArgs()->andReturn(false)->once();

        $this->assertTrue($api->createCalendarItems($args[0]['CalendarItem']));
    }
}
