<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Measurement;

use DevToolbelt\Enums\Measurement\Temperature;
use DevToolbelt\Enums\Tests\TestCase;

final class TemperatureTest extends TestCase
{
    public function testAllTemperaturesHaveCorrectValues(): void
    {
        $this->assertEquals('C', Temperature::CELSIUS->value);
        $this->assertEquals('F', Temperature::FAHRENHEIT->value);
        $this->assertEquals('K', Temperature::KELVIN->value);
        $this->assertEquals('R', Temperature::RANKINE->value);
        $this->assertEquals('Re', Temperature::REAUMUR->value);
    }

    public function testFullNameReturnsCorrectNames(): void
    {
        $this->assertEquals('Celsius', Temperature::CELSIUS->label());
        $this->assertEquals('Fahrenheit', Temperature::FAHRENHEIT->label());
        $this->assertEquals('Kelvin', Temperature::KELVIN->label());
        $this->assertEquals('Rankine', Temperature::RANKINE->label());
        $this->assertEquals('Réaumur', Temperature::REAUMUR->label());
    }

    public function testFullNamePtBrReturnsCorrectNames(): void
    {
        $this->assertEquals('Celsius', Temperature::CELSIUS->fullNamePtBr());
        $this->assertEquals('Fahrenheit', Temperature::FAHRENHEIT->fullNamePtBr());
        $this->assertEquals('Kelvin', Temperature::KELVIN->fullNamePtBr());
    }

    public function testSymbolReturnsCorrectSymbols(): void
    {
        $this->assertEquals('°C', Temperature::CELSIUS->symbol());
        $this->assertEquals('°F', Temperature::FAHRENHEIT->symbol());
        $this->assertEquals('K', Temperature::KELVIN->symbol());
        $this->assertEquals('°R', Temperature::RANKINE->symbol());
        $this->assertEquals('°Ré', Temperature::REAUMUR->symbol());
    }

    public function testIsMetricReturnsTrueForMetricUnits(): void
    {
        $this->assertTrue(Temperature::CELSIUS->isMetric());
        $this->assertTrue(Temperature::KELVIN->isMetric());
        $this->assertFalse(Temperature::FAHRENHEIT->isMetric());
        $this->assertFalse(Temperature::RANKINE->isMetric());
        $this->assertFalse(Temperature::REAUMUR->isMetric());
    }

    public function testIsImperialReturnsTrueForImperialUnits(): void
    {
        $this->assertTrue(Temperature::FAHRENHEIT->isImperial());
        $this->assertTrue(Temperature::RANKINE->isImperial());
        $this->assertFalse(Temperature::CELSIUS->isImperial());
        $this->assertFalse(Temperature::KELVIN->isImperial());
    }

    public function testIsAbsoluteReturnsTrueForAbsoluteScales(): void
    {
        $this->assertTrue(Temperature::KELVIN->isAbsolute());
        $this->assertTrue(Temperature::RANKINE->isAbsolute());
        $this->assertFalse(Temperature::CELSIUS->isAbsolute());
        $this->assertFalse(Temperature::FAHRENHEIT->isAbsolute());
    }

    public function testAbsoluteZeroReturnsCorrectValues(): void
    {
        $this->assertEquals(-273.15, Temperature::CELSIUS->absoluteZero());
        $this->assertEquals(-459.67, Temperature::FAHRENHEIT->absoluteZero());
        $this->assertEquals(0.0, Temperature::KELVIN->absoluteZero());
        $this->assertEquals(0.0, Temperature::RANKINE->absoluteZero());
    }

    public function testBoilingPointOfWaterReturnsCorrectValues(): void
    {
        $this->assertEquals(100.0, Temperature::CELSIUS->boilingPointOfWater());
        $this->assertEquals(212.0, Temperature::FAHRENHEIT->boilingPointOfWater());
        $this->assertEquals(373.15, Temperature::KELVIN->boilingPointOfWater());
        $this->assertEquals(671.67, Temperature::RANKINE->boilingPointOfWater());
        $this->assertEquals(80.0, Temperature::REAUMUR->boilingPointOfWater());
    }

    public function testFreezingPointOfWaterReturnsCorrectValues(): void
    {
        $this->assertEquals(0.0, Temperature::CELSIUS->freezingPointOfWater());
        $this->assertEquals(32.0, Temperature::FAHRENHEIT->freezingPointOfWater());
        $this->assertEquals(273.15, Temperature::KELVIN->freezingPointOfWater());
        $this->assertEquals(491.67, Temperature::RANKINE->freezingPointOfWater());
        $this->assertEquals(0.0, Temperature::REAUMUR->freezingPointOfWater());
    }

    public function testConvertCelsiusToFahrenheit(): void
    {
        $this->assertEqualsWithDelta(32.0, Temperature::CELSIUS->convertTo(0, Temperature::FAHRENHEIT), 0.01);
        $this->assertEqualsWithDelta(212.0, Temperature::CELSIUS->convertTo(100, Temperature::FAHRENHEIT), 0.01);
        $this->assertEqualsWithDelta(98.6, Temperature::CELSIUS->convertTo(37, Temperature::FAHRENHEIT), 0.01);
    }

    public function testConvertFahrenheitToCelsius(): void
    {
        $this->assertEqualsWithDelta(0.0, Temperature::FAHRENHEIT->convertTo(32, Temperature::CELSIUS), 0.01);
        $this->assertEqualsWithDelta(100.0, Temperature::FAHRENHEIT->convertTo(212, Temperature::CELSIUS), 0.01);
        $this->assertEqualsWithDelta(37.0, Temperature::FAHRENHEIT->convertTo(98.6, Temperature::CELSIUS), 0.01);
    }

    public function testConvertCelsiusToKelvin(): void
    {
        $this->assertEqualsWithDelta(273.15, Temperature::CELSIUS->convertTo(0, Temperature::KELVIN), 0.01);
        $this->assertEqualsWithDelta(373.15, Temperature::CELSIUS->convertTo(100, Temperature::KELVIN), 0.01);
        $this->assertEqualsWithDelta(0.0, Temperature::CELSIUS->convertTo(-273.15, Temperature::KELVIN), 0.01);
    }

    public function testConvertKelvinToCelsius(): void
    {
        $this->assertEqualsWithDelta(0.0, Temperature::KELVIN->convertTo(273.15, Temperature::CELSIUS), 0.01);
        $this->assertEqualsWithDelta(100.0, Temperature::KELVIN->convertTo(373.15, Temperature::CELSIUS), 0.01);
        $this->assertEqualsWithDelta(-273.15, Temperature::KELVIN->convertTo(0, Temperature::CELSIUS), 0.01);
    }

    public function testConvertToSameUnitReturnsSameValue(): void
    {
        $this->assertEquals(25.0, Temperature::CELSIUS->convertTo(25, Temperature::CELSIUS));
        $this->assertEquals(77.0, Temperature::FAHRENHEIT->convertTo(77, Temperature::FAHRENHEIT));
        $this->assertEquals(300.0, Temperature::KELVIN->convertTo(300, Temperature::KELVIN));
    }

    public function testToCelsiusConvertsCorrectly(): void
    {
        $this->assertEquals(0.0, Temperature::CELSIUS->toCelsius(0));
        $this->assertEqualsWithDelta(0.0, Temperature::FAHRENHEIT->toCelsius(32), 0.01);
        $this->assertEqualsWithDelta(0.0, Temperature::KELVIN->toCelsius(273.15), 0.01);
        $this->assertEqualsWithDelta(0.0, Temperature::RANKINE->toCelsius(491.67), 0.01);
        $this->assertEqualsWithDelta(0.0, Temperature::REAUMUR->toCelsius(0), 0.01);
    }

    public function testFromCelsiusConvertsCorrectly(): void
    {
        $this->assertEquals(0.0, Temperature::CELSIUS->fromCelsius(0));
        $this->assertEqualsWithDelta(32.0, Temperature::FAHRENHEIT->fromCelsius(0), 0.01);
        $this->assertEqualsWithDelta(273.15, Temperature::KELVIN->fromCelsius(0), 0.01);
        $this->assertEqualsWithDelta(491.67, Temperature::RANKINE->fromCelsius(0), 0.01);
        $this->assertEqualsWithDelta(0.0, Temperature::REAUMUR->fromCelsius(0), 0.01);
    }

    public function testFormatReturnsFormattedString(): void
    {
        $this->assertEquals('25.00 °C', Temperature::CELSIUS->format(25));
        $this->assertEquals('77.00 °F', Temperature::FAHRENHEIT->format(77));
        $this->assertEquals('300.00 K', Temperature::KELVIN->format(300));
        $this->assertEquals('25.5 °C', Temperature::CELSIUS->format(25.5, 1));
        $this->assertEquals('100 °C', Temperature::CELSIUS->format(100, 0));
    }

    public function testToArrayReturnsAllTemperatures(): void
    {
        $array = Temperature::toArray();

        $this->assertCount(5, $array);
        $this->assertArrayHasKey('C', $array);
        $this->assertEquals('C', $array['C']);
        $this->assertArrayHasKey('F', $array);
        $this->assertEquals('F', $array['F']);
    }

    public function testToArrayWithLabelsReturnsAllTemperaturesWithLabels(): void
    {
        $array = Temperature::toArrayWithLabels();

        $this->assertCount(5, $array);
        $this->assertArrayHasKey('C', $array);
        $this->assertEquals('Celsius', $array['C']);
        $this->assertArrayHasKey('F', $array);
        $this->assertEquals('Fahrenheit', $array['F']);
    }

    public function testToArrayPtBrReturnsAllTemperaturesInPortuguese(): void
    {
        $array = Temperature::toArrayPtBr();

        $this->assertCount(5, $array);
        $this->assertEquals('Celsius', $array['C']);
        $this->assertEquals('Fahrenheit', $array['F']);
    }

    public function testToArrayWithSymbolsReturnsAllSymbols(): void
    {
        $array = Temperature::toArrayWithSymbols();

        $this->assertCount(5, $array);
        $this->assertEquals('°C', $array['C']);
        $this->assertEquals('°F', $array['F']);
        $this->assertEquals('K', $array['K']);
    }

    public function testMetricReturnsOnlyMetricUnits(): void
    {
        $metric = Temperature::metric();

        $this->assertCount(2, $metric);
        $this->assertContains(Temperature::CELSIUS, $metric);
        $this->assertContains(Temperature::KELVIN, $metric);
        $this->assertNotContains(Temperature::FAHRENHEIT, $metric);
    }

    public function testImperialReturnsOnlyImperialUnits(): void
    {
        $imperial = Temperature::imperial();

        $this->assertCount(2, $imperial);
        $this->assertContains(Temperature::FAHRENHEIT, $imperial);
        $this->assertContains(Temperature::RANKINE, $imperial);
        $this->assertNotContains(Temperature::CELSIUS, $imperial);
    }

    public function testAbsoluteReturnsOnlyAbsoluteScales(): void
    {
        $absolute = Temperature::absolute();

        $this->assertCount(2, $absolute);
        $this->assertContains(Temperature::KELVIN, $absolute);
        $this->assertContains(Temperature::RANKINE, $absolute);
        $this->assertNotContains(Temperature::CELSIUS, $absolute);
    }

    public function testCanBeCreatedFromString(): void
    {
        $temperature = Temperature::from('C');

        $this->assertEquals(Temperature::CELSIUS, $temperature);
    }

    public function testTryFromReturnsNullForInvalidUnit(): void
    {
        $temperature = Temperature::tryFrom('X');

        $this->assertNull($temperature);
    }
}
