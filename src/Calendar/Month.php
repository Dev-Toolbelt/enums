<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Calendar;

enum Month: int
{
    case JANUARY = 1;
    case FEBRUARY = 2;
    case MARCH = 3;
    case APRIL = 4;
    case MAY = 5;
    case JUNE = 6;
    case JULY = 7;
    case AUGUST = 8;
    case SEPTEMBER = 9;
    case OCTOBER = 10;
    case NOVEMBER = 11;
    case DECEMBER = 12;

    public function fullName(): string
    {
        return match ($this) {
            self::JANUARY => 'January',
            self::FEBRUARY => 'February',
            self::MARCH => 'March',
            self::APRIL => 'April',
            self::MAY => 'May',
            self::JUNE => 'June',
            self::JULY => 'July',
            self::AUGUST => 'August',
            self::SEPTEMBER => 'September',
            self::OCTOBER => 'October',
            self::NOVEMBER => 'November',
            self::DECEMBER => 'December',
        };
    }

    public function fullNamePtBr(): string
    {
        return match ($this) {
            self::JANUARY => 'Janeiro',
            self::FEBRUARY => 'Fevereiro',
            self::MARCH => 'Março',
            self::APRIL => 'Abril',
            self::MAY => 'Maio',
            self::JUNE => 'Junho',
            self::JULY => 'Julho',
            self::AUGUST => 'Agosto',
            self::SEPTEMBER => 'Setembro',
            self::OCTOBER => 'Outubro',
            self::NOVEMBER => 'Novembro',
            self::DECEMBER => 'Dezembro',
        };
    }

    public function shortName(): string
    {
        return match ($this) {
            self::JANUARY => 'Jan',
            self::FEBRUARY => 'Feb',
            self::MARCH => 'Mar',
            self::APRIL => 'Apr',
            self::MAY => 'May',
            self::JUNE => 'Jun',
            self::JULY => 'Jul',
            self::AUGUST => 'Aug',
            self::SEPTEMBER => 'Sep',
            self::OCTOBER => 'Oct',
            self::NOVEMBER => 'Nov',
            self::DECEMBER => 'Dec',
        };
    }

    public function shortNamePtBr(): string
    {
        return match ($this) {
            self::JANUARY => 'Jan',
            self::FEBRUARY => 'Fev',
            self::MARCH => 'Mar',
            self::APRIL => 'Abr',
            self::MAY => 'Mai',
            self::JUNE => 'Jun',
            self::JULY => 'Jul',
            self::AUGUST => 'Ago',
            self::SEPTEMBER => 'Set',
            self::OCTOBER => 'Out',
            self::NOVEMBER => 'Nov',
            self::DECEMBER => 'Dez',
        };
    }

    public function daysCount(?int $year = null): int
    {
        $year = $year ?? (int) date('Y');

        return match ($this) {
            self::JANUARY, self::MARCH, self::MAY, self::JULY,
            self::AUGUST, self::OCTOBER, self::DECEMBER => 31,
            self::APRIL, self::JUNE, self::SEPTEMBER, self::NOVEMBER => 30,
            self::FEBRUARY => $this->isLeapYear($year) ? 29 : 28,
        };
    }

    public function quarter(): int
    {
        return match ($this) {
            self::JANUARY, self::FEBRUARY, self::MARCH => 1,
            self::APRIL, self::MAY, self::JUNE => 2,
            self::JULY, self::AUGUST, self::SEPTEMBER => 3,
            self::OCTOBER, self::NOVEMBER, self::DECEMBER => 4,
        };
    }

    public function isFirstQuarter(): bool
    {
        return $this->quarter() === 1;
    }

    public function isSecondQuarter(): bool
    {
        return $this->quarter() === 2;
    }

    public function isThirdQuarter(): bool
    {
        return $this->quarter() === 3;
    }

    public function isFourthQuarter(): bool
    {
        return $this->quarter() === 4;
    }

    public function isFirstHalf(): bool
    {
        return $this->value <= 6;
    }

    public function isSecondHalf(): bool
    {
        return $this->value > 6;
    }

    public function next(): self
    {
        return match ($this) {
            self::DECEMBER => self::JANUARY,
            default => self::from($this->value + 1),
        };
    }

    public function previous(): self
    {
        return match ($this) {
            self::JANUARY => self::DECEMBER,
            default => self::from($this->value - 1),
        };
    }

    private function isLeapYear(int $year): bool
    {
        return ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
    }

    /**
     * @return array<int, string>
     */
    public static function toArray(): array
    {
        $result = [];

        foreach (self::cases() as $month) {
            $result[$month->value] = $month->fullName();
        }

        return $result;
    }

    /**
     * @return array<int, string>
     */
    public static function toArrayPtBr(): array
    {
        $result = [];

        foreach (self::cases() as $month) {
            $result[$month->value] = $month->fullNamePtBr();
        }

        return $result;
    }
}
