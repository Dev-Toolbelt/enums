<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Measurement;

use DevToolbelt\Enums\EnumInterface;

enum Temperature: string implements EnumInterface
{
    case CELSIUS = 'C';
    case FAHRENHEIT = 'F';
    case KELVIN = 'K';
    case RANKINE = 'R';
    case REAUMUR = 'Re';

    public function label(): string
    {
        return match ($this) {
            self::CELSIUS => 'Celsius',
            self::FAHRENHEIT => 'Fahrenheit',
            self::KELVIN => 'Kelvin',
            self::RANKINE => 'Rankine',
            self::REAUMUR => 'Réaumur',
        };
    }

    public function fullNamePtBr(): string
    {
        return match ($this) {
            self::CELSIUS => 'Celsius',
            self::FAHRENHEIT => 'Fahrenheit',
            self::KELVIN => 'Kelvin',
            self::RANKINE => 'Rankine',
            self::REAUMUR => 'Réaumur',
        };
    }

    public function symbol(): string
    {
        return match ($this) {
            self::CELSIUS => '°C',
            self::FAHRENHEIT => '°F',
            self::KELVIN => 'K',
            self::RANKINE => '°R',
            self::REAUMUR => '°Ré',
        };
    }

    public function isMetric(): bool
    {
        return in_array($this, [self::CELSIUS, self::KELVIN], true);
    }

    public function isImperial(): bool
    {
        return in_array($this, [self::FAHRENHEIT, self::RANKINE], true);
    }

    public function isAbsolute(): bool
    {
        return in_array($this, [self::KELVIN, self::RANKINE], true);
    }

    public function absoluteZero(): float
    {
        return match ($this) {
            self::CELSIUS => -273.15,
            self::FAHRENHEIT => -459.67,
            self::KELVIN => 0.0,
            self::RANKINE => 0.0,
            self::REAUMUR => -218.52,
        };
    }

    public function boilingPointOfWater(): float
    {
        return match ($this) {
            self::CELSIUS => 100.0,
            self::FAHRENHEIT => 212.0,
            self::KELVIN => 373.15,
            self::RANKINE => 671.67,
            self::REAUMUR => 80.0,
        };
    }

    public function freezingPointOfWater(): float
    {
        return match ($this) {
            self::CELSIUS => 0.0,
            self::FAHRENHEIT => 32.0,
            self::KELVIN => 273.15,
            self::RANKINE => 491.67,
            self::REAUMUR => 0.0,
        };
    }

    public function convertTo(float $value, self $target): float
    {
        if ($this === $target) {
            return $value;
        }

        $celsius = $this->toCelsius($value);

        return $target->fromCelsius($celsius);
    }

    public function toCelsius(float $value): float
    {
        return match ($this) {
            self::CELSIUS => $value,
            self::FAHRENHEIT => ($value - 32) * 5 / 9,
            self::KELVIN => $value - 273.15,
            self::RANKINE => ($value - 491.67) * 5 / 9,
            self::REAUMUR => $value * 5 / 4,
        };
    }

    public function fromCelsius(float $celsius): float
    {
        return match ($this) {
            self::CELSIUS => $celsius,
            self::FAHRENHEIT => $celsius * 9 / 5 + 32,
            self::KELVIN => $celsius + 273.15,
            self::RANKINE => ($celsius + 273.15) * 9 / 5,
            self::REAUMUR => $celsius * 4 / 5,
        };
    }

    public function format(float $value, int $decimals = 2): string
    {
        return number_format($value, $decimals) . ' ' . $this->symbol();
    }

    /**
     * @return string[]
     */
    public function labelList(): array
    {
        return array_map(fn (self $case) => $case->label(), self::cases());
    }

    /**
     * @return array<string, string>
     */
    public static function toArray(): array
    {
        $result = [];

        foreach (self::cases() as $temperature) {
            $result[$temperature->value] = $temperature->value;
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayWithLabels(): array
    {
        $result = [];

        foreach (self::cases() as $temperature) {
            $result[$temperature->value] = $temperature->label();
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayPtBr(): array
    {
        $result = [];

        foreach (self::cases() as $temperature) {
            $result[$temperature->value] = $temperature->fullNamePtBr();
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayWithSymbols(): array
    {
        $result = [];

        foreach (self::cases() as $temperature) {
            $result[$temperature->value] = $temperature->symbol();
        }

        return $result;
    }

    /**
     * @return self[]
     */
    public static function metric(): array
    {
        return array_filter(self::cases(), fn (self $temp) => $temp->isMetric());
    }

    /**
     * @return self[]
     */
    public static function imperial(): array
    {
        return array_filter(self::cases(), fn (self $temp) => $temp->isImperial());
    }

    /**
     * @return self[]
     */
    public static function absolute(): array
    {
        return array_filter(self::cases(), fn (self $temp) => $temp->isAbsolute());
    }
}
