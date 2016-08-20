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
        $this->assertEquals([[[0, 0]],[0, 0],[40, 40]], \wcs\KataTennis::finalScore("222111"));
    }

    public function testScoreAdvantage()
    {
        $this->assertEquals([[[0, 0]],[0, 0],["advantage"]], \wcs\KataTennis::finalScore("2221112"));
        $this->assertEquals([[[0, 0]],[0, 0],["advantage"]], \wcs\KataTennis::finalScore("2121212"));
        $this->assertEquals([[[0, 0]],[0, 0],["advantage"]], \wcs\KataTennis::finalScore("21212121212"));
    }

    public function testScoreEgality()
    {
        $this->assertEquals([[[0, 0]],[0, 0],["equality"]], \wcs\KataTennis::finalScore("22211121"));
        $this->assertEquals([[[0, 0]],[0, 0],["equality"]], \wcs\KataTennis::finalScore("21212121"));
        $this->assertEquals([[[0, 0]],[0, 0],["equality"]], \wcs\KataTennis::finalScore("212121212121"));
    }

    public function testScoreJeu1()
    {
        $this->assertEquals([[[0, 0]],[1, 0],[0, 0]], \wcs\KataTennis::finalScore("22211111"));
        $this->assertEquals([[[0, 0]],[1, 0],[0, 0]], \wcs\KataTennis::finalScore("22211112121211"));
    }

    public function testScoreJeu2()
    {
        $this->assertEquals([[[0, 0]],[3, 2],[0, 0]], \wcs\KataTennis::finalScore("2221111122211111222111111112222211122222"));
        $this->assertEquals([[[0, 0]],[3, 2],[15, 40]], \wcs\KataTennis::finalScore("22211111222111112221111111122222111222221222"));
    }

}