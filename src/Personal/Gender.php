<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Personal;

enum Gender: string
{
    case MALE = 'M';
    case FEMALE = 'F';
    case NON_BINARY = 'NB';
    case OTHER = 'O';
    case PREFER_NOT_TO_SAY = 'N';

    public function fullName(): string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
            self::NON_BINARY => 'Non-binary',
            self::OTHER => 'Other',
            self::PREFER_NOT_TO_SAY => 'Prefer not to say',
        };
    }

    public function fullNamePtBr(): string
    {
        return match ($this) {
            self::MALE => 'Masculino',
            self::FEMALE => 'Feminino',
            self::NON_BINARY => 'Não-binário',
            self::OTHER => 'Outro',
            self::PREFER_NOT_TO_SAY => 'Prefiro não informar',
        };
    }

    public function shortName(): string
    {
        return match ($this) {
            self::MALE => 'M',
            self::FEMALE => 'F',
            self::NON_BINARY => 'NB',
            self::OTHER => 'O',
            self::PREFER_NOT_TO_SAY => 'N/A',
        };
    }

    public function pronoun(): string
    {
        return match ($this) {
            self::MALE => 'he/him',
            self::FEMALE => 'she/her',
            self::NON_BINARY => 'they/them',
            self::OTHER, self::PREFER_NOT_TO_SAY => 'they/them',
        };
    }

    public function pronounPtBr(): string
    {
        return match ($this) {
            self::MALE => 'ele/dele',
            self::FEMALE => 'ela/dela',
            self::NON_BINARY => 'elu/delu',
            self::OTHER, self::PREFER_NOT_TO_SAY => 'elu/delu',
        };
    }

    public function isMale(): bool
    {
        return $this === self::MALE;
    }

    public function isFemale(): bool
    {
        return $this === self::FEMALE;
    }

    public function isNonBinary(): bool
    {
        return $this === self::NON_BINARY;
    }

    public function isSpecified(): bool
    {
        return $this !== self::PREFER_NOT_TO_SAY;
    }

    /**
     * @return array<string, string>
     */
    public static function toArray(): array
    {
        $result = [];

        foreach (self::cases() as $gender) {
            $result[$gender->value] = $gender->fullName();
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayPtBr(): array
    {
        $result = [];

        foreach (self::cases() as $gender) {
            $result[$gender->value] = $gender->fullNamePtBr();
        }

        return $result;
    }

    /**
     * @return self[]
     */
    public static function binary(): array
    {
        return [self::MALE, self::FEMALE];
    }
}
