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
        $this->assertEquals('Brazil', Country::BR->label());
        $this->assertEquals('United States', Country::US->label());
        $this->assertEquals('United Kingdom', Country::GB->label());
        $this->assertEquals('Germany', Country::DE->label());
        $this->assertEquals('France', Country::FR->label());
        $this->assertEquals('Japan', Country::JP->label());
        $this->assertEquals('Portugal', Country::PT->label());
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

    public function testAlpha3ReturnsCorrectCodesForAdditionalCountries(): void
    {
        $this->assertEquals('URY', Country::UY->alpha3());
        $this->assertEquals('UZB', Country::UZ->alpha3());
        $this->assertEquals('VUT', Country::VU->alpha3());
        $this->assertEquals('VAT', Country::VA->alpha3());
        $this->assertEquals('VEN', Country::VE->alpha3());
        $this->assertEquals('VNM', Country::VN->alpha3());
        $this->assertEquals('YEM', Country::YE->alpha3());
        $this->assertEquals('ZMB', Country::ZM->alpha3());
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
        $array = Country::toArrayWithLabels();

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
        $this->assertEquals('Brazil', $country->label());
    }

    public function testTryFromReturnsNullForInvalidCountry(): void
    {
        $country = Country::tryFrom('XX');

        $this->assertNull($country);
    }

    public function testSouthAmericanCountriesExist(): void
    {
        $this->assertEquals('Argentina', Country::AR->label());
        $this->assertEquals('Chile', Country::CL->label());
        $this->assertEquals('Colombia', Country::CO->label());
        $this->assertEquals('Peru', Country::PE->label());
        $this->assertEquals('Uruguay', Country::UY->label());
        $this->assertEquals('Venezuela', Country::VE->label());
    }

    public function testEuropeanCountriesExist(): void
    {
        $this->assertEquals('Spain', Country::ES->label());
        $this->assertEquals('Italy', Country::IT->label());
        $this->assertEquals('Netherlands', Country::NL->label());
        $this->assertEquals('Belgium', Country::BE->label());
        $this->assertEquals('Switzerland', Country::CH->label());
    }
}
