<?php

class SimpleKataTennisStringTest extends PHPUnit_Framework_TestCase
{
    public function testScore15_0()
    {
        $this->assertEquals("15/0", \wcs\KataTennisString::score("1"));
    }

    public function testScore0_15()
    {
        $this->assertEquals("0/15", \wcs\KataTennisString::score("2"));
    }

    public function testScore30_0()
    {
        $this->assertEquals("30/0", \wcs\KataTennisString::score("11"));
    }

    public function testScore0_30()
    {
        $this->assertEquals("0/30", \wcs\KataTennisString::score("22"));
    }

    public function testScore15_15()
    {
        $this->assertEquals("15/15", \wcs\KataTennisString::score("12"));
        $this->assertEquals("15/15", \wcs\KataTennisString::score("21"));
    }

    public function testScore15_30()
    {
        $this->assertEquals("15/30", \wcs\KataTennisString::score("122"));
        $this->assertEquals("15/30", \wcs\KataTennisString::score("221"));
        $this->assertEquals("15/30", \wcs\KataTennisString::score("212"));
    }

    public function testScore30_15()
    {
        $this->assertEquals("30/15", \wcs\KataTennisString::score("112"));
        $this->assertEquals("30/15", \wcs\KataTennisString::score("211"));
        $this->assertEquals("30/15", \wcs\KataTennisString::score("121"));
    }

    public function testScore40_15()
    {
        $this->assertEquals("40/15", \wcs\KataTennisString::score("1112"));
        $this->assertEquals("40/15", \wcs\KataTennisString::score("1121"));
        $this->assertEquals("40/15", \wcs\KataTennisString::score("1211"));
        $this->assertEquals("40/15", \wcs\KataTennisString::score("2111"));
    }
}