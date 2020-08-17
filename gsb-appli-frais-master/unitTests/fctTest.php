<?php
include ('./include/fct.php');
use PHPUnit\Framework\TestCase;
Class FctTest extends TestCase {
    public function testDateAnglaisVersFrancais(){
        $dateAnglais = dateAnglaisVersFrancais("2020-01-15");
        self::assertEquals("15/01/2020", $dateAnglais);
    }
    public function testGetMoisUnChiffre(){
        $noMois = getMois("15/01/2020");
        self::assertEquals("202001", $noMois);
    }
    public function testGetMoisDeuxChiffres(){
        $noMois = getMois("30/12/2019");
        self::assertEquals("201912", $noMois);
    }
}
