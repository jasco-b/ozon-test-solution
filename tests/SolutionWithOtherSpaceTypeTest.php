<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

final class SolutionWithOtherSpaceTypeTest extends TestCase
{
    const SPACE_CHARACTER = ' ';
    public function testWithEmptyText(): void
    {
        $this->assertIsString(sollution('', self::SPACE_CHARACTER));
    }

    public function testWithOnlySpaces(): void
    {
        $this->assertEquals(sollution(' ', self::SPACE_CHARACTER), '');
    }

    public function testWithOnlyMultipleSpaces(): void
    {
        $this->assertEquals(sollution('   ',self::SPACE_CHARACTER), '');
    }

    public function testWithValidString()
    {
        $valid = 'thisIsText';
        $this->assertEquals(sollution($valid,self::SPACE_CHARACTER), $valid);
    }

    public function testCanRemoveRepeatedSpaces()
    {
        $valid = 'this   is Text';
        $this->assertEquals(sollution($valid,self::SPACE_CHARACTER), 'this is Text');
    }


    public function testCanRemoveRepeatedSpacesInMultiplePlaces()
    {
        $valid = 'this   is Text   with spaces';
        $this->assertEquals(sollution($valid,self::SPACE_CHARACTER), 'this is Text with spaces');
    }


    public function testCanRemoveSpacesFromBeginning()
    {
        $valid = ' this   is Text   with spaces';
        $this->assertEquals(sollution($valid,self::SPACE_CHARACTER), 'this is Text with spaces');
    }

    public function testCanRemoveMultipleSpacesFromBeginning()
    {
        $valid = '   this   is Text   with spaces';
        $this->assertEquals(sollution($valid,self::SPACE_CHARACTER), 'this is Text with spaces');
    }

    public function testCanRemoveSpaceFromTheEnd()
    {
        $valid = 'this   is Text   with spaces ';
        $this->assertEquals(sollution($valid,self::SPACE_CHARACTER), 'this is Text with spaces');
    }


    public function testCanRemoveMultipleSpacesFromTheEnd()
    {
        $valid = 'this   is Text   with spaces   ';
        $this->assertEquals(sollution($valid,self::SPACE_CHARACTER), 'this is Text with spaces');
    }


    public function testCanRemoveExtraSpacesEverywhere()
    {
        $valid = '  this   is Text   with spaces   ';
        $this->assertEquals(sollution($valid,self::SPACE_CHARACTER), 'this is Text with spaces');
    }

}