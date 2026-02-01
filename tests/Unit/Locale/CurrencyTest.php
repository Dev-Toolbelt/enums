<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Locale;

use DevToolbelt\Enums\Locale\Currency;
use DevToolbelt\Enums\Tests\TestCase;

final class CurrencyTest extends TestCase
{
    public function testCommonCurrenciesHaveCorrectValues(): void
    {
        $this->assertEquals('BRL', Currency::BRL->value);
        $this->assertEquals('USD', Currency::USD->value);
        $this->assertEquals('EUR', Currency::EUR->value);
        $this->assertEquals('GBP', Currency::GBP->value);
        $this->assertEquals('JPY', Currency::JPY->value);
        $this->assertEquals('CNY', Currency::CNY->value);
    }

    public function testFullNameReturnsCorrectNames(): void
    {
        $this->assertEquals('Brazilian Real', Currency::BRL->fullName());
        $this->assertEquals('United States Dollar', Currency::USD->fullName());
        $this->assertEquals('Euro', Currency::EUR->fullName());
        $this->assertEquals('British Pound', Currency::GBP->fullName());
        $this->assertEquals('Japanese Yen', Currency::JPY->fullName());
        $this->assertEquals('Swiss Franc', Currency::CHF->fullName());
    }

    public function testSymbolReturnsCorrectSymbols(): void
    {
        $this->assertEquals('R$', Currency::BRL->symbol());
        $this->assertEquals('$', Currency::USD->symbol());
        $this->assertEquals('€', Currency::EUR->symbol());
        $this->assertEquals('£', Currency::GBP->symbol());
        $this->assertEquals('¥', Currency::JPY->symbol());
        $this->assertEquals('CHF', Currency::CHF->symbol());
    }

    public function testDecimalPlacesReturnsCorrectValues(): void
    {
        // Most currencies have 2 decimal places
        $this->assertEquals(2, Currency::BRL->decimalPlaces());
        $this->assertEquals(2, Currency::USD->decimalPlaces());
        $this->assertEquals(2, Currency::EUR->decimalPlaces());

        // Some currencies have 0 decimal places
        $this->assertEquals(0, Currency::JPY->decimalPlaces());
        $this->assertEquals(0, Currency::KRW->decimalPlaces());
        $this->assertEquals(0, Currency::CLP->decimalPlaces());

        // Some currencies have 3 decimal places
        $this->assertEquals(3, Currency::KWD->decimalPlaces());
        $this->assertEquals(3, Currency::BHD->decimalPlaces());
        $this->assertEquals(3, Currency::OMR->decimalPlaces());
    }

    public function testToArrayReturnsAllCurrencies(): void
    {
        $array = Currency::toArray();

        $this->assertArrayHasKey('BRL', $array);
        $this->assertEquals('BRL', $array['BRL']);
        $this->assertArrayHasKey('USD', $array);
        $this->assertEquals('USD', $array['USD']);
    }

    public function testToArrayWithFullNamesReturnsCurrencyNames(): void
    {
        $array = Currency::toArrayWithFullNames();

        $this->assertArrayHasKey('BRL', $array);
        $this->assertEquals('Brazilian Real', $array['BRL']);
        $this->assertArrayHasKey('USD', $array);
        $this->assertEquals('United States Dollar', $array['USD']);
    }

    public function testToArrayWithSymbolsReturnsCurrencySymbols(): void
    {
        $array = Currency::toArrayWithSymbols();

        $this->assertArrayHasKey('BRL', $array);
        $this->assertEquals('R$', $array['BRL']);
        $this->assertArrayHasKey('USD', $array);
        $this->assertEquals('$', $array['USD']);
        $this->assertArrayHasKey('EUR', $array);
        $this->assertEquals('€', $array['EUR']);
    }

    public function testCanBeCreatedFromString(): void
    {
        $currency = Currency::from('BRL');

        $this->assertEquals(Currency::BRL, $currency);
        $this->assertEquals('Brazilian Real', $currency->fullName());
    }

    public function testTryFromReturnsNullForInvalidCurrency(): void
    {
        $currency = Currency::tryFrom('XXX');

        $this->assertNull($currency);
    }

    public function testLatinAmericanCurrenciesExist(): void
    {
        $this->assertEquals('Argentine Peso', Currency::ARS->fullName());
        $this->assertEquals('Chilean Peso', Currency::CLP->fullName());
        $this->assertEquals('Colombian Peso', Currency::COP->fullName());
        $this->assertEquals('Mexican Peso', Currency::MXN->fullName());
        $this->assertEquals('Peruvian Sol', Currency::PEN->fullName());
    }
}
