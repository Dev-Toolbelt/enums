<?php

declare(strict_types=1);

namespace DevToolbelt\Enums;

/**
 * Interface for all enums in the Dev-Toolbelt Enums library.
 *
 * This interface ensures consistency across all enum implementations
 * by requiring common methods for retrieving descriptive names and
 * converting enum cases to arrays.
 */
interface EnumInterface
{
    /**
     * Get the full descriptive name of the enum case.
     *
     * @return string The human-readable name
     */
    public function label(): string;

    /**
     * Get all labels as a simple indexed array.
     *
     * @return string[]
     */
    public function labelList(): array;

    /**
     * Get all enum cases as an associative array with values as keys and values.
     *
     * @return array<string|int, string|int>
     */
    public static function toArray(): array;

    /**
     * Get all enum cases as an associative array with values as keys and labels as values.
     *
     * @return array<string|int, string>
     */
    public static function toArrayWithLabels(): array;
}
