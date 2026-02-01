<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Locale;

use DevToolbelt\Enums\Locale\Country;
use DevToolbelt\Enums\Tests\TestCase;

final class CountryTest extends TestCase
{
    public function testCommonCountriesHaveCorrectValues(): void
    {
        $this->assertEquals('BR', Country::BR->value);
        $this->assertEquals('US', Country::US->value);
        $this->assertEquals('GB', Country::GB->value);
        $this->assertEquals('DE', Country::DE->value);
        $this->assertEquals('FR', Country::FR->value);
        $this->assertEquals('JP', Country::JP->value);
        $this->assertEquals('CN', Country::CN->value);
    }

    public function testFullNameReturnsCorrectNames(): void
    {
        $this->assertEquals('Brazil', Country::BR->fullName());
        $this->assertEquals('United States', Country::US->fullName());
        $this->assertEquals('United Kingdom', Country::GB->fullName());
        $this->assertEquals('Germany', Country::DE->fullName());
        $this->assertEquals('France', Country::FR->fullName());
        $this->assertEquals('Japan', Country::JP->fullName());
        $this->assertEquals('Portugal', Country::PT->fullName());
    }

    public function testAlpha3ReturnsCorrectCodes(): void
    {
        $this->assertEquals('BRA', Country::BR->alpha3());
        $this->assertEquals('USA', Country::US->alpha3());
        $this->assertEquals('GBR', Country::GB->alpha3());
        $this->assertEquals('DEU', Country::DE->alpha3());
        $this->assertEquals('FRA', Country::FR->alpha3());
        $this->assertEquals('JPN', Country::JP->alpha3());
        $this->assertEquals('PRT', Country::PT->alpha3());
    }

    public function testToArrayReturnsAllCountries(): void
    {
        $array = Country::toArray();

        $this->assertArrayHasKey('BR', $array);
        $this->assertEquals('BR', $array['BR']);
        $this->assertArrayHasKey('US', $array);
        $this->assertEquals('US', $array['US']);
    }

    public function testToArrayWithFullNamesReturnsCountryNames(): void
    {
        $array = Country::toArrayWithFullNames();

        $this->assertArrayHasKey('BR', $array);
        $this->assertEquals('Brazil', $array['BR']);
        $this->assertArrayHasKey('US', $array);
        $this->assertEquals('United States', $array['US']);
        $this->assertArrayHasKey('PT', $array);
        $this->assertEquals('Portugal', $array['PT']);
    }

    public function testCanBeCreatedFromString(): void
    {
        $country = Country::from('BR');

        $this->assertEquals(Country::BR, $country);
        $this->assertEquals('Brazil', $country->fullName());
    }

    public function testTryFromReturnsNullForInvalidCountry(): void
    {
        $country = Country::tryFrom('XX');

        $this->assertNull($country);
    }

    public function testSouthAmericanCountriesExist(): void
    {
        $this->assertEquals('Argentina', Country::AR->fullName());
        $this->assertEquals('Chile', Country::CL->fullName());
        $this->assertEquals('Colombia', Country::CO->fullName());
        $this->assertEquals('Peru', Country::PE->fullName());
        $this->assertEquals('Uruguay', Country::UY->fullName());
        $this->assertEquals('Venezuela', Country::VE->fullName());
    }

    public function testEuropeanCountriesExist(): void
    {
        $this->assertEquals('Spain', Country::ES->fullName());
        $this->assertEquals('Italy', Country::IT->fullName());
        $this->assertEquals('Netherlands', Country::NL->fullName());
        $this->assertEquals('Belgium', Country::BE->fullName());
        $this->assertEquals('Switzerland', Country::CH->fullName());
    }
}
