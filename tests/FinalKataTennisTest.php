<?php

class FinalKataTennisTest extends PHPUnit_Framework_TestCase
{
    public function testScore15_0()
    {
        $this->assertEquals([[[0, 0]],[0, 0],[15, 0]], \wcs\KataTennis::finalScore("1"));
    }

    public function testScore15_15()
    {
        $this->assertEquals([[[0, 0]],[0, 0],[15, 15]], \wcs\KataTennis::finalScore("12"));
    }

    public function testScore0_30()
    {
        $this->assertEquals([[[0, 0]],[0, 0],[0, 30]], \wcs\KataTennis::finalScore("22"));
    }

    public function testScore40_40()
    {
        $this->assertEquals([[[0, 0]],[0, 0],["equality"]], \wcs\KataTennis::finalScore("222111"));
    }
}