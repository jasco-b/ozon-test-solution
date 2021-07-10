<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

final class SolutionTest extends TestCase
{
    public function testWithEmptyText(): void
    {
        $this->assertIsString(sollution(''));
    }

    public function testWithOnlySpaces(): void
    {
        $this->assertEquals(sollution('_'), '');
    }

    public function testWithOnlyMultipleSpaces(): void
    {
        $this->assertEquals(sollution('___'), '');
    }

    public function testWithValidString()
    {
        $valid = 'thisIsText';
        $this->assertEquals(sollution($valid), $valid);
    }

    public function testCanRemoveRepeatedSpaces()
    {
        $valid = 'this___is_Text';
        $this->assertEquals(sollution($valid), 'this_is_Text');
    }


    public function testCanRemoveRepeatedSpacesInMultiplePlaces()
    {
        $valid = 'this___is_Text___with_spaces';
        $this->assertEquals(sollution($valid), 'this_is_Text_with_spaces');
    }


    public function testCanRemoveSpacesFromBeginning()
    {
        $valid = '_this___is_Text___with_spaces';
        $this->assertEquals(sollution($valid), 'this_is_Text_with_spaces');
    }

    public function testCanRemoveMultipleSpacesFromBeginning()
    {
        $valid = '___this___is_Text___with_spaces';
        $this->assertEquals(sollution($valid), 'this_is_Text_with_spaces');
    }

    public function testCanRemoveSpaceFromTheEnd()
    {
        $valid = 'this___is_Text___with_spaces_';
        $this->assertEquals(sollution($valid), 'this_is_Text_with_spaces');
    }


    public function testCanRemoveMultipleSpacesFromTheEnd()
    {
        $valid = 'this___is_Text___with_spaces___';
        $this->assertEquals(sollution($valid), 'this_is_Text_with_spaces');
    }


    public function testCanRemoveExtraSpacesEverywhere()
    {
        $valid = '__this___is_Text___with_spaces___';
        $this->assertEquals(sollution($valid), 'this_is_Text_with_spaces');
    }

    public function testOtherSampleTest()
    {
        $valid = '_this___is_Text___with_s_';
        $this->assertEquals(sollution($valid), 'this_is_Text_with_s');
    }

}