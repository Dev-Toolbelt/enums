<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Personal;

use DevToolbelt\Enums\Personal\Gender;
use DevToolbelt\Enums\Tests\TestCase;

final class GenderTest extends TestCase
{
    public function testAllGendersHaveCorrectValues(): void
    {
        $this->assertEquals('M', Gender::MALE->value);
        $this->assertEquals('F', Gender::FEMALE->value);
        $this->assertEquals('NB', Gender::NON_BINARY->value);
        $this->assertEquals('O', Gender::OTHER->value);
        $this->assertEquals('N', Gender::PREFER_NOT_TO_SAY->value);
    }

    public function testFullNameReturnsCorrectNames(): void
    {
        $this->assertEquals('Male', Gender::MALE->fullName());
        $this->assertEquals('Female', Gender::FEMALE->fullName());
        $this->assertEquals('Non-binary', Gender::NON_BINARY->fullName());
        $this->assertEquals('Other', Gender::OTHER->fullName());
        $this->assertEquals('Prefer not to say', Gender::PREFER_NOT_TO_SAY->fullName());
    }

    public function testFullNamePtBrReturnsCorrectNames(): void
    {
        $this->assertEquals('Masculino', Gender::MALE->fullNamePtBr());
        $this->assertEquals('Feminino', Gender::FEMALE->fullNamePtBr());
        $this->assertEquals('Não-binário', Gender::NON_BINARY->fullNamePtBr());
        $this->assertEquals('Outro', Gender::OTHER->fullNamePtBr());
        $this->assertEquals('Prefiro não informar', Gender::PREFER_NOT_TO_SAY->fullNamePtBr());
    }

    public function testShortNameReturnsCorrectAbbreviations(): void
    {
        $this->assertEquals('M', Gender::MALE->shortName());
        $this->assertEquals('F', Gender::FEMALE->shortName());
        $this->assertEquals('NB', Gender::NON_BINARY->shortName());
        $this->assertEquals('O', Gender::OTHER->shortName());
        $this->assertEquals('N/A', Gender::PREFER_NOT_TO_SAY->shortName());
    }

    public function testPronounReturnsCorrectPronouns(): void
    {
        $this->assertEquals('he/him', Gender::MALE->pronoun());
        $this->assertEquals('she/her', Gender::FEMALE->pronoun());
        $this->assertEquals('they/them', Gender::NON_BINARY->pronoun());
        $this->assertEquals('they/them', Gender::OTHER->pronoun());
        $this->assertEquals('they/them', Gender::PREFER_NOT_TO_SAY->pronoun());
    }

    public function testPronounPtBrReturnsCorrectPronouns(): void
    {
        $this->assertEquals('ele/dele', Gender::MALE->pronounPtBr());
        $this->assertEquals('ela/dela', Gender::FEMALE->pronounPtBr());
        $this->assertEquals('elu/delu', Gender::NON_BINARY->pronounPtBr());
    }

    public function testIsMaleReturnsTrueOnlyForMale(): void
    {
        $this->assertTrue(Gender::MALE->isMale());
        $this->assertFalse(Gender::FEMALE->isMale());
        $this->assertFalse(Gender::NON_BINARY->isMale());
    }

    public function testIsFemaleReturnsTrueOnlyForFemale(): void
    {
        $this->assertTrue(Gender::FEMALE->isFemale());
        $this->assertFalse(Gender::MALE->isFemale());
        $this->assertFalse(Gender::NON_BINARY->isFemale());
    }

    public function testIsNonBinaryReturnsTrueOnlyForNonBinary(): void
    {
        $this->assertTrue(Gender::NON_BINARY->isNonBinary());
        $this->assertFalse(Gender::MALE->isNonBinary());
        $this->assertFalse(Gender::FEMALE->isNonBinary());
    }

    public function testIsSpecifiedReturnsFalseOnlyForPreferNotToSay(): void
    {
        $this->assertTrue(Gender::MALE->isSpecified());
        $this->assertTrue(Gender::FEMALE->isSpecified());
        $this->assertTrue(Gender::NON_BINARY->isSpecified());
        $this->assertTrue(Gender::OTHER->isSpecified());
        $this->assertFalse(Gender::PREFER_NOT_TO_SAY->isSpecified());
    }

    public function testToArrayReturnsAllGenders(): void
    {
        $array = Gender::toArray();

        $this->assertCount(5, $array);
        $this->assertArrayHasKey('M', $array);
        $this->assertEquals('Male', $array['M']);
        $this->assertArrayHasKey('F', $array);
        $this->assertEquals('Female', $array['F']);
    }

    public function testToArrayPtBrReturnsAllGendersInPortuguese(): void
    {
        $array = Gender::toArrayPtBr();

        $this->assertCount(5, $array);
        $this->assertEquals('Masculino', $array['M']);
        $this->assertEquals('Feminino', $array['F']);
    }

    public function testBinaryReturnsOnlyMaleAndFemale(): void
    {
        $binary = Gender::binary();

        $this->assertCount(2, $binary);
        $this->assertContains(Gender::MALE, $binary);
        $this->assertContains(Gender::FEMALE, $binary);
        $this->assertNotContains(Gender::NON_BINARY, $binary);
    }

    public function testCanBeCreatedFromString(): void
    {
        $gender = Gender::from('M');

        $this->assertEquals(Gender::MALE, $gender);
    }

    public function testTryFromReturnsNullForInvalidGender(): void
    {
        $gender = Gender::tryFrom('X');

        $this->assertNull($gender);
    }
}
