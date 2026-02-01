<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Calendar;

use DevToolbelt\Enums\Calendar\DayOfWeek;
use DevToolbelt\Enums\Tests\TestCase;

final class DayOfWeekTest extends TestCase
{
    public function testAllDaysHaveCorrectValues(): void
    {
        $this->assertEquals(0, DayOfWeek::SUNDAY->value);
        $this->assertEquals(1, DayOfWeek::MONDAY->value);
        $this->assertEquals(2, DayOfWeek::TUESDAY->value);
        $this->assertEquals(3, DayOfWeek::WEDNESDAY->value);
        $this->assertEquals(4, DayOfWeek::THURSDAY->value);
        $this->assertEquals(5, DayOfWeek::FRIDAY->value);
        $this->assertEquals(6, DayOfWeek::SATURDAY->value);
    }

    public function testFullNameReturnsCorrectNames(): void
    {
        $this->assertEquals('Sunday', DayOfWeek::SUNDAY->fullName());
        $this->assertEquals('Monday', DayOfWeek::MONDAY->fullName());
        $this->assertEquals('Tuesday', DayOfWeek::TUESDAY->fullName());
        $this->assertEquals('Wednesday', DayOfWeek::WEDNESDAY->fullName());
        $this->assertEquals('Thursday', DayOfWeek::THURSDAY->fullName());
        $this->assertEquals('Friday', DayOfWeek::FRIDAY->fullName());
        $this->assertEquals('Saturday', DayOfWeek::SATURDAY->fullName());
    }

    public function testFullNamePtBrReturnsCorrectNames(): void
    {
        $this->assertEquals('Domingo', DayOfWeek::SUNDAY->fullNamePtBr());
        $this->assertEquals('Segunda-feira', DayOfWeek::MONDAY->fullNamePtBr());
        $this->assertEquals('Terça-feira', DayOfWeek::TUESDAY->fullNamePtBr());
        $this->assertEquals('Quarta-feira', DayOfWeek::WEDNESDAY->fullNamePtBr());
        $this->assertEquals('Quinta-feira', DayOfWeek::THURSDAY->fullNamePtBr());
        $this->assertEquals('Sexta-feira', DayOfWeek::FRIDAY->fullNamePtBr());
        $this->assertEquals('Sábado', DayOfWeek::SATURDAY->fullNamePtBr());
    }

    public function testShortNameReturnsCorrectAbbreviations(): void
    {
        $this->assertEquals('Sun', DayOfWeek::SUNDAY->shortName());
        $this->assertEquals('Mon', DayOfWeek::MONDAY->shortName());
        $this->assertEquals('Tue', DayOfWeek::TUESDAY->shortName());
        $this->assertEquals('Wed', DayOfWeek::WEDNESDAY->shortName());
        $this->assertEquals('Thu', DayOfWeek::THURSDAY->shortName());
        $this->assertEquals('Fri', DayOfWeek::FRIDAY->shortName());
        $this->assertEquals('Sat', DayOfWeek::SATURDAY->shortName());
    }

    public function testShortNamePtBrReturnsCorrectAbbreviations(): void
    {
        $this->assertEquals('Dom', DayOfWeek::SUNDAY->shortNamePtBr());
        $this->assertEquals('Seg', DayOfWeek::MONDAY->shortNamePtBr());
        $this->assertEquals('Ter', DayOfWeek::TUESDAY->shortNamePtBr());
        $this->assertEquals('Qua', DayOfWeek::WEDNESDAY->shortNamePtBr());
        $this->assertEquals('Qui', DayOfWeek::THURSDAY->shortNamePtBr());
        $this->assertEquals('Sex', DayOfWeek::FRIDAY->shortNamePtBr());
        $this->assertEquals('Sáb', DayOfWeek::SATURDAY->shortNamePtBr());
    }

    public function testMinNameReturnsCorrectMinimalAbbreviations(): void
    {
        $this->assertEquals('Su', DayOfWeek::SUNDAY->minName());
        $this->assertEquals('Mo', DayOfWeek::MONDAY->minName());
        $this->assertEquals('Tu', DayOfWeek::TUESDAY->minName());
        $this->assertEquals('We', DayOfWeek::WEDNESDAY->minName());
        $this->assertEquals('Th', DayOfWeek::THURSDAY->minName());
        $this->assertEquals('Fr', DayOfWeek::FRIDAY->minName());
        $this->assertEquals('Sa', DayOfWeek::SATURDAY->minName());
    }

    public function testMinNamePtBrReturnsCorrectMinimalAbbreviations(): void
    {
        $this->assertEquals('D', DayOfWeek::SUNDAY->minNamePtBr());
        $this->assertEquals('S', DayOfWeek::MONDAY->minNamePtBr());
        $this->assertEquals('T', DayOfWeek::TUESDAY->minNamePtBr());
        $this->assertEquals('Q', DayOfWeek::WEDNESDAY->minNamePtBr());
        $this->assertEquals('Q', DayOfWeek::THURSDAY->minNamePtBr());
        $this->assertEquals('S', DayOfWeek::FRIDAY->minNamePtBr());
        $this->assertEquals('S', DayOfWeek::SATURDAY->minNamePtBr());
    }

    public function testIsWeekendReturnsTrueForWeekendDays(): void
    {
        $this->assertTrue(DayOfWeek::SATURDAY->isWeekend());
        $this->assertTrue(DayOfWeek::SUNDAY->isWeekend());
    }

    public function testIsWeekendReturnsFalseForWeekdays(): void
    {
        $this->assertFalse(DayOfWeek::MONDAY->isWeekend());
        $this->assertFalse(DayOfWeek::TUESDAY->isWeekend());
        $this->assertFalse(DayOfWeek::WEDNESDAY->isWeekend());
        $this->assertFalse(DayOfWeek::THURSDAY->isWeekend());
        $this->assertFalse(DayOfWeek::FRIDAY->isWeekend());
    }

    public function testIsWeekdayReturnsTrueForWeekdays(): void
    {
        $this->assertTrue(DayOfWeek::MONDAY->isWeekday());
        $this->assertTrue(DayOfWeek::TUESDAY->isWeekday());
        $this->assertTrue(DayOfWeek::WEDNESDAY->isWeekday());
        $this->assertTrue(DayOfWeek::THURSDAY->isWeekday());
        $this->assertTrue(DayOfWeek::FRIDAY->isWeekday());
    }

    public function testIsWeekdayReturnsFalseForWeekendDays(): void
    {
        $this->assertFalse(DayOfWeek::SATURDAY->isWeekday());
        $this->assertFalse(DayOfWeek::SUNDAY->isWeekday());
    }

    public function testIsDayMethods(): void
    {
        $this->assertTrue(DayOfWeek::SUNDAY->isSunday());
        $this->assertTrue(DayOfWeek::MONDAY->isMonday());
        $this->assertTrue(DayOfWeek::TUESDAY->isTuesday());
        $this->assertTrue(DayOfWeek::WEDNESDAY->isWednesday());
        $this->assertTrue(DayOfWeek::THURSDAY->isThursday());
        $this->assertTrue(DayOfWeek::FRIDAY->isFriday());
        $this->assertTrue(DayOfWeek::SATURDAY->isSaturday());

        $this->assertFalse(DayOfWeek::MONDAY->isSunday());
        $this->assertFalse(DayOfWeek::TUESDAY->isMonday());
    }

    public function testNextReturnsNextDay(): void
    {
        $this->assertEquals(DayOfWeek::MONDAY, DayOfWeek::SUNDAY->next());
        $this->assertEquals(DayOfWeek::TUESDAY, DayOfWeek::MONDAY->next());
        $this->assertEquals(DayOfWeek::SATURDAY, DayOfWeek::FRIDAY->next());
        $this->assertEquals(DayOfWeek::SUNDAY, DayOfWeek::SATURDAY->next());
    }

    public function testPreviousReturnsPreviousDay(): void
    {
        $this->assertEquals(DayOfWeek::SATURDAY, DayOfWeek::SUNDAY->previous());
        $this->assertEquals(DayOfWeek::SUNDAY, DayOfWeek::MONDAY->previous());
        $this->assertEquals(DayOfWeek::THURSDAY, DayOfWeek::FRIDAY->previous());
        $this->assertEquals(DayOfWeek::FRIDAY, DayOfWeek::SATURDAY->previous());
    }

    public function testIsoValueReturnsCorrectIsoValues(): void
    {
        $this->assertEquals(1, DayOfWeek::MONDAY->isoValue());
        $this->assertEquals(2, DayOfWeek::TUESDAY->isoValue());
        $this->assertEquals(3, DayOfWeek::WEDNESDAY->isoValue());
        $this->assertEquals(4, DayOfWeek::THURSDAY->isoValue());
        $this->assertEquals(5, DayOfWeek::FRIDAY->isoValue());
        $this->assertEquals(6, DayOfWeek::SATURDAY->isoValue());
        $this->assertEquals(7, DayOfWeek::SUNDAY->isoValue());
    }

    public function testFromIsoCreatesCorrectDay(): void
    {
        $this->assertEquals(DayOfWeek::MONDAY, DayOfWeek::fromIso(1));
        $this->assertEquals(DayOfWeek::TUESDAY, DayOfWeek::fromIso(2));
        $this->assertEquals(DayOfWeek::WEDNESDAY, DayOfWeek::fromIso(3));
        $this->assertEquals(DayOfWeek::THURSDAY, DayOfWeek::fromIso(4));
        $this->assertEquals(DayOfWeek::FRIDAY, DayOfWeek::fromIso(5));
        $this->assertEquals(DayOfWeek::SATURDAY, DayOfWeek::fromIso(6));
        $this->assertEquals(DayOfWeek::SUNDAY, DayOfWeek::fromIso(7));
    }

    public function testToArrayReturnsAllDays(): void
    {
        $array = DayOfWeek::toArray();

        $this->assertCount(7, $array);
        $this->assertEquals('Sunday', $array[0]);
        $this->assertEquals('Saturday', $array[6]);
    }

    public function testToArrayPtBrReturnsAllDaysInPortuguese(): void
    {
        $array = DayOfWeek::toArrayPtBr();

        $this->assertCount(7, $array);
        $this->assertEquals('Domingo', $array[0]);
        $this->assertEquals('Sábado', $array[6]);
    }

    public function testWeekdaysReturnsOnlyWeekdays(): void
    {
        $weekdays = DayOfWeek::weekdays();

        $this->assertCount(5, $weekdays);
        $this->assertContains(DayOfWeek::MONDAY, $weekdays);
        $this->assertContains(DayOfWeek::TUESDAY, $weekdays);
        $this->assertContains(DayOfWeek::WEDNESDAY, $weekdays);
        $this->assertContains(DayOfWeek::THURSDAY, $weekdays);
        $this->assertContains(DayOfWeek::FRIDAY, $weekdays);
        $this->assertNotContains(DayOfWeek::SATURDAY, $weekdays);
        $this->assertNotContains(DayOfWeek::SUNDAY, $weekdays);
    }

    public function testWeekendReturnsOnlyWeekendDays(): void
    {
        $weekend = DayOfWeek::weekend();

        $this->assertCount(2, $weekend);
        $this->assertContains(DayOfWeek::SATURDAY, $weekend);
        $this->assertContains(DayOfWeek::SUNDAY, $weekend);
        $this->assertNotContains(DayOfWeek::MONDAY, $weekend);
    }

    public function testCanBeCreatedFromInteger(): void
    {
        $day = DayOfWeek::from(1);

        $this->assertEquals(DayOfWeek::MONDAY, $day);
    }

    public function testTryFromReturnsNullForInvalidDay(): void
    {
        $day = DayOfWeek::tryFrom(7);

        $this->assertNull($day);
    }
}
