<?php

class KataTennisTest extends PHPUnit_Framework_TestCase
{
    public function testScore15_0()
    {
        $result = \wcs\KataTennis::score("1");
        $this->assertEquals([15, 0], $result);
    }

    public function testScore0_15()
    {
        $result = \wcs\KataTennis::score("2");
        $this->assertEquals([0, 15], $result);
    }

    public function testScore15_15()
    {
        $result = \wcs\KataTennis::score("12");
        $this->assertEquals([15, 15], $result);
    }

}