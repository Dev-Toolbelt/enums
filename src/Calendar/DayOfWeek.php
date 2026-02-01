<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Calendar;

enum DayOfWeek: int
{
    case SUNDAY = 0;
    case MONDAY = 1;
    case TUESDAY = 2;
    case WEDNESDAY = 3;
    case THURSDAY = 4;
    case FRIDAY = 5;
    case SATURDAY = 6;

    public function fullName(): string
    {
        return match ($this) {
            self::SUNDAY => 'Sunday',
            self::MONDAY => 'Monday',
            self::TUESDAY => 'Tuesday',
            self::WEDNESDAY => 'Wednesday',
            self::THURSDAY => 'Thursday',
            self::FRIDAY => 'Friday',
            self::SATURDAY => 'Saturday',
        };
    }

    public function fullNamePtBr(): string
    {
        return match ($this) {
            self::SUNDAY => 'Domingo',
            self::MONDAY => 'Segunda-feira',
            self::TUESDAY => 'Terça-feira',
            self::WEDNESDAY => 'Quarta-feira',
            self::THURSDAY => 'Quinta-feira',
            self::FRIDAY => 'Sexta-feira',
            self::SATURDAY => 'Sábado',
        };
    }

    public function shortName(): string
    {
        return match ($this) {
            self::SUNDAY => 'Sun',
            self::MONDAY => 'Mon',
            self::TUESDAY => 'Tue',
            self::WEDNESDAY => 'Wed',
            self::THURSDAY => 'Thu',
            self::FRIDAY => 'Fri',
            self::SATURDAY => 'Sat',
        };
    }

    public function shortNamePtBr(): string
    {
        return match ($this) {
            self::SUNDAY => 'Dom',
            self::MONDAY => 'Seg',
            self::TUESDAY => 'Ter',
            self::WEDNESDAY => 'Qua',
            self::THURSDAY => 'Qui',
            self::FRIDAY => 'Sex',
            self::SATURDAY => 'Sáb',
        };
    }

    public function minName(): string
    {
        return match ($this) {
            self::SUNDAY => 'Su',
            self::MONDAY => 'Mo',
            self::TUESDAY => 'Tu',
            self::WEDNESDAY => 'We',
            self::THURSDAY => 'Th',
            self::FRIDAY => 'Fr',
            self::SATURDAY => 'Sa',
        };
    }

    public function minNamePtBr(): string
    {
        return match ($this) {
            self::SUNDAY => 'D',
            self::MONDAY => 'S',
            self::TUESDAY => 'T',
            self::WEDNESDAY => 'Q',
            self::THURSDAY => 'Q',
            self::FRIDAY => 'S',
            self::SATURDAY => 'S',
        };
    }

    public function isWeekend(): bool
    {
        return $this === self::SATURDAY || $this === self::SUNDAY;
    }

    public function isWeekday(): bool
    {
        return !$this->isWeekend();
    }

    public function isSunday(): bool
    {
        return $this === self::SUNDAY;
    }

    public function isMonday(): bool
    {
        return $this === self::MONDAY;
    }

    public function isTuesday(): bool
    {
        return $this === self::TUESDAY;
    }

    public function isWednesday(): bool
    {
        return $this === self::WEDNESDAY;
    }

    public function isThursday(): bool
    {
        return $this === self::THURSDAY;
    }

    public function isFriday(): bool
    {
        return $this === self::FRIDAY;
    }

    public function isSaturday(): bool
    {
        return $this === self::SATURDAY;
    }

    public function next(): self
    {
        return match ($this) {
            self::SATURDAY => self::SUNDAY,
            default => self::from($this->value + 1),
        };
    }

    public function previous(): self
    {
        return match ($this) {
            self::SUNDAY => self::SATURDAY,
            default => self::from($this->value - 1),
        };
    }

    /**
     * Returns the ISO-8601 numeric representation (1 = Monday, 7 = Sunday)
     */
    public function isoValue(): int
    {
        return $this === self::SUNDAY ? 7 : $this->value;
    }

    /**
     * Create from ISO-8601 numeric representation (1 = Monday, 7 = Sunday)
     */
    public static function fromIso(int $isoDay): self
    {
        return match ($isoDay) {
            7 => self::SUNDAY,
            default => self::from($isoDay),
        };
    }

    /**
     * @return array<int, string>
     */
    public static function toArray(): array
    {
        $result = [];

        foreach (self::cases() as $day) {
            $result[$day->value] = $day->fullName();
        }

        return $result;
    }

    /**
     * @return array<int, string>
     */
    public static function toArrayPtBr(): array
    {
        $result = [];

        foreach (self::cases() as $day) {
            $result[$day->value] = $day->fullNamePtBr();
        }

        return $result;
    }

    /**
     * @return self[]
     */
    public static function weekdays(): array
    {
        return [
            self::MONDAY,
            self::TUESDAY,
            self::WEDNESDAY,
            self::THURSDAY,
            self::FRIDAY,
        ];
    }

    /**
     * @return self[]
     */
    public static function weekend(): array
    {
        return [
            self::SATURDAY,
            self::SUNDAY,
        ];
    }
}
