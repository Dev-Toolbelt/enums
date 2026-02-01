<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Calendar;

use DevToolbelt\Enums\Calendar\Month;
use DevToolbelt\Enums\Tests\TestCase;

final class MonthTest extends TestCase
{
    public function testAllMonthsHaveCorrectValues(): void
    {
        $this->assertEquals(1, Month::JANUARY->value);
        $this->assertEquals(2, Month::FEBRUARY->value);
        $this->assertEquals(3, Month::MARCH->value);
        $this->assertEquals(4, Month::APRIL->value);
        $this->assertEquals(5, Month::MAY->value);
        $this->assertEquals(6, Month::JUNE->value);
        $this->assertEquals(7, Month::JULY->value);
        $this->assertEquals(8, Month::AUGUST->value);
        $this->assertEquals(9, Month::SEPTEMBER->value);
        $this->assertEquals(10, Month::OCTOBER->value);
        $this->assertEquals(11, Month::NOVEMBER->value);
        $this->assertEquals(12, Month::DECEMBER->value);
    }

    public function testFullNameReturnsCorrectNames(): void
    {
        $this->assertEquals('January', Month::JANUARY->label());
        $this->assertEquals('February', Month::FEBRUARY->label());
        $this->assertEquals('March', Month::MARCH->label());
        $this->assertEquals('April', Month::APRIL->label());
        $this->assertEquals('May', Month::MAY->label());
        $this->assertEquals('June', Month::JUNE->label());
        $this->assertEquals('July', Month::JULY->label());
        $this->assertEquals('August', Month::AUGUST->label());
        $this->assertEquals('September', Month::SEPTEMBER->label());
        $this->assertEquals('October', Month::OCTOBER->label());
        $this->assertEquals('November', Month::NOVEMBER->label());
        $this->assertEquals('December', Month::DECEMBER->label());
    }

    public function testFullNamePtBrReturnsCorrectNames(): void
    {
        $this->assertEquals('Janeiro', Month::JANUARY->fullNamePtBr());
        $this->assertEquals('Fevereiro', Month::FEBRUARY->fullNamePtBr());
        $this->assertEquals('Março', Month::MARCH->fullNamePtBr());
        $this->assertEquals('Abril', Month::APRIL->fullNamePtBr());
        $this->assertEquals('Maio', Month::MAY->fullNamePtBr());
        $this->assertEquals('Junho', Month::JUNE->fullNamePtBr());
        $this->assertEquals('Julho', Month::JULY->fullNamePtBr());
        $this->assertEquals('Agosto', Month::AUGUST->fullNamePtBr());
        $this->assertEquals('Setembro', Month::SEPTEMBER->fullNamePtBr());
        $this->assertEquals('Outubro', Month::OCTOBER->fullNamePtBr());
        $this->assertEquals('Novembro', Month::NOVEMBER->fullNamePtBr());
        $this->assertEquals('Dezembro', Month::DECEMBER->fullNamePtBr());
    }

    public function testShortNameReturnsCorrectAbbreviations(): void
    {
        $this->assertEquals('Jan', Month::JANUARY->shortName());
        $this->assertEquals('Feb', Month::FEBRUARY->shortName());
        $this->assertEquals('Mar', Month::MARCH->shortName());
        $this->assertEquals('Apr', Month::APRIL->shortName());
        $this->assertEquals('May', Month::MAY->shortName());
        $this->assertEquals('Jun', Month::JUNE->shortName());
        $this->assertEquals('Jul', Month::JULY->shortName());
        $this->assertEquals('Aug', Month::AUGUST->shortName());
        $this->assertEquals('Sep', Month::SEPTEMBER->shortName());
        $this->assertEquals('Oct', Month::OCTOBER->shortName());
        $this->assertEquals('Nov', Month::NOVEMBER->shortName());
        $this->assertEquals('Dec', Month::DECEMBER->shortName());
    }

    public function testShortNamePtBrReturnsCorrectAbbreviations(): void
    {
        $this->assertEquals('Jan', Month::JANUARY->shortNamePtBr());
        $this->assertEquals('Fev', Month::FEBRUARY->shortNamePtBr());
        $this->assertEquals('Mar', Month::MARCH->shortNamePtBr());
        $this->assertEquals('Abr', Month::APRIL->shortNamePtBr());
        $this->assertEquals('Mai', Month::MAY->shortNamePtBr());
        $this->assertEquals('Jun', Month::JUNE->shortNamePtBr());
        $this->assertEquals('Jul', Month::JULY->shortNamePtBr());
        $this->assertEquals('Ago', Month::AUGUST->shortNamePtBr());
        $this->assertEquals('Set', Month::SEPTEMBER->shortNamePtBr());
        $this->assertEquals('Out', Month::OCTOBER->shortNamePtBr());
        $this->assertEquals('Nov', Month::NOVEMBER->shortNamePtBr());
        $this->assertEquals('Dez', Month::DECEMBER->shortNamePtBr());
    }

    public function testDaysCountReturnsCorrectDaysFor31DayMonths(): void
    {
        $this->assertEquals(31, Month::JANUARY->daysCount());
        $this->assertEquals(31, Month::MARCH->daysCount());
        $this->assertEquals(31, Month::MAY->daysCount());
        $this->assertEquals(31, Month::JULY->daysCount());
        $this->assertEquals(31, Month::AUGUST->daysCount());
        $this->assertEquals(31, Month::OCTOBER->daysCount());
        $this->assertEquals(31, Month::DECEMBER->daysCount());
    }

    public function testDaysCountReturnsCorrectDaysFor30DayMonths(): void
    {
        $this->assertEquals(30, Month::APRIL->daysCount());
        $this->assertEquals(30, Month::JUNE->daysCount());
        $this->assertEquals(30, Month::SEPTEMBER->daysCount());
        $this->assertEquals(30, Month::NOVEMBER->daysCount());
    }

    public function testDaysCountReturnsCorrectDaysForFebruaryInLeapYear(): void
    {
        $this->assertEquals(29, Month::FEBRUARY->daysCount(2024));
        $this->assertEquals(29, Month::FEBRUARY->daysCount(2000));
    }

    public function testDaysCountReturnsCorrectDaysForFebruaryInNonLeapYear(): void
    {
        $this->assertEquals(28, Month::FEBRUARY->daysCount(2023));
        $this->assertEquals(28, Month::FEBRUARY->daysCount(1900));
    }

    public function testQuarterReturnsCorrectQuarter(): void
    {
        $this->assertEquals(1, Month::JANUARY->quarter());
        $this->assertEquals(1, Month::FEBRUARY->quarter());
        $this->assertEquals(1, Month::MARCH->quarter());
        $this->assertEquals(2, Month::APRIL->quarter());
        $this->assertEquals(2, Month::MAY->quarter());
        $this->assertEquals(2, Month::JUNE->quarter());
        $this->assertEquals(3, Month::JULY->quarter());
        $this->assertEquals(3, Month::AUGUST->quarter());
        $this->assertEquals(3, Month::SEPTEMBER->quarter());
        $this->assertEquals(4, Month::OCTOBER->quarter());
        $this->assertEquals(4, Month::NOVEMBER->quarter());
        $this->assertEquals(4, Month::DECEMBER->quarter());
    }

    public function testIsFirstQuarterReturnsTrueForQ1Months(): void
    {
        $this->assertTrue(Month::JANUARY->isFirstQuarter());
        $this->assertTrue(Month::FEBRUARY->isFirstQuarter());
        $this->assertTrue(Month::MARCH->isFirstQuarter());
        $this->assertFalse(Month::APRIL->isFirstQuarter());
    }

    public function testIsSecondQuarterReturnsTrueForQ2Months(): void
    {
        $this->assertTrue(Month::APRIL->isSecondQuarter());
        $this->assertTrue(Month::MAY->isSecondQuarter());
        $this->assertTrue(Month::JUNE->isSecondQuarter());
        $this->assertFalse(Month::JULY->isSecondQuarter());
    }

    public function testIsThirdQuarterReturnsTrueForQ3Months(): void
    {
        $this->assertTrue(Month::JULY->isThirdQuarter());
        $this->assertTrue(Month::AUGUST->isThirdQuarter());
        $this->assertTrue(Month::SEPTEMBER->isThirdQuarter());
        $this->assertFalse(Month::OCTOBER->isThirdQuarter());
    }

    public function testIsFourthQuarterReturnsTrueForQ4Months(): void
    {
        $this->assertTrue(Month::OCTOBER->isFourthQuarter());
        $this->assertTrue(Month::NOVEMBER->isFourthQuarter());
        $this->assertTrue(Month::DECEMBER->isFourthQuarter());
        $this->assertFalse(Month::JANUARY->isFourthQuarter());
    }

    public function testIsFirstHalfReturnsTrueForFirstSixMonths(): void
    {
        $this->assertTrue(Month::JANUARY->isFirstHalf());
        $this->assertTrue(Month::JUNE->isFirstHalf());
        $this->assertFalse(Month::JULY->isFirstHalf());
        $this->assertFalse(Month::DECEMBER->isFirstHalf());
    }

    public function testIsSecondHalfReturnsTrueForLastSixMonths(): void
    {
        $this->assertTrue(Month::JULY->isSecondHalf());
        $this->assertTrue(Month::DECEMBER->isSecondHalf());
        $this->assertFalse(Month::JANUARY->isSecondHalf());
        $this->assertFalse(Month::JUNE->isSecondHalf());
    }

    public function testNextReturnsNextMonth(): void
    {
        $this->assertEquals(Month::FEBRUARY, Month::JANUARY->next());
        $this->assertEquals(Month::JULY, Month::JUNE->next());
        $this->assertEquals(Month::JANUARY, Month::DECEMBER->next());
    }

    public function testPreviousReturnsPreviousMonth(): void
    {
        $this->assertEquals(Month::JANUARY, Month::FEBRUARY->previous());
        $this->assertEquals(Month::JUNE, Month::JULY->previous());
        $this->assertEquals(Month::DECEMBER, Month::JANUARY->previous());
    }

    public function testToArrayReturnsAllMonths(): void
    {
        $array = Month::toArray();

        $this->assertCount(12, $array);
        $this->assertEquals(1, $array[1]);
        $this->assertEquals(12, $array[12]);
    }

    public function testToArrayWithLabelsReturnsAllMonthsWithLabels(): void
    {
        $array = Month::toArrayWithLabels();

        $this->assertCount(12, $array);
        $this->assertEquals('January', $array[1]);
        $this->assertEquals('December', $array[12]);
    }

    public function testToArrayPtBrReturnsAllMonthsInPortuguese(): void
    {
        $array = Month::toArrayPtBr();

        $this->assertCount(12, $array);
        $this->assertEquals('Janeiro', $array[1]);
        $this->assertEquals('Dezembro', $array[12]);
    }

    public function testCanBeCreatedFromInteger(): void
    {
        $month = Month::from(6);

        $this->assertEquals(Month::JUNE, $month);
    }

    public function testTryFromReturnsNullForInvalidMonth(): void
    {
        $month = Month::tryFrom(13);

        $this->assertNull($month);
    }
}
