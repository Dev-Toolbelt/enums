<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Brazil;

use DevToolbelt\Enums\Brazil\BrazilianBankCode;
use DevToolbelt\Enums\Tests\TestCase;

final class BrazilianBankCodeTest extends TestCase
{
    public function testMajorBanksHaveCorrectCodes(): void
    {
        $this->assertEquals('001', BrazilianBankCode::BANCO_DO_BRASIL->value);
        $this->assertEquals('104', BrazilianBankCode::CAIXA_ECONOMICA_FEDERAL->value);
        $this->assertEquals('033', BrazilianBankCode::SANTANDER->value);
        $this->assertEquals('237', BrazilianBankCode::BRADESCO->value);
        $this->assertEquals('341', BrazilianBankCode::ITAU_UNIBANCO->value);
        $this->assertEquals('260', BrazilianBankCode::NUBANK->value);
        $this->assertEquals('077', BrazilianBankCode::BANCO_INTER->value);
        $this->assertEquals('336', BrazilianBankCode::C6_BANK->value);
    }

    public function testFullNameReturnsCorrectNames(): void
    {
        $this->assertEquals('Banco do Brasil S.A.', BrazilianBankCode::BANCO_DO_BRASIL->label());
        $this->assertEquals('Caixa Econômica Federal', BrazilianBankCode::CAIXA_ECONOMICA_FEDERAL->label());
        $this->assertEquals('Banco Santander Brasil S.A.', BrazilianBankCode::SANTANDER->label());
        $this->assertEquals('Banco Bradesco S.A.', BrazilianBankCode::BRADESCO->label());
        $this->assertEquals('Itaú Unibanco S.A.', BrazilianBankCode::ITAU_UNIBANCO->label());
        $this->assertEquals('Nu Pagamentos S.A. (Nubank)', BrazilianBankCode::NUBANK->label());
    }

    public function testShortNameReturnsCorrectNames(): void
    {
        $this->assertEquals('Banco do Brasil', BrazilianBankCode::BANCO_DO_BRASIL->shortName());
        $this->assertEquals('Caixa', BrazilianBankCode::CAIXA_ECONOMICA_FEDERAL->shortName());
        $this->assertEquals('Santander', BrazilianBankCode::SANTANDER->shortName());
        $this->assertEquals('Bradesco', BrazilianBankCode::BRADESCO->shortName());
        $this->assertEquals('Itaú', BrazilianBankCode::ITAU_UNIBANCO->shortName());
        $this->assertEquals('Nubank', BrazilianBankCode::NUBANK->shortName());
        $this->assertEquals('Inter', BrazilianBankCode::BANCO_INTER->shortName());
        $this->assertEquals('C6 Bank', BrazilianBankCode::C6_BANK->shortName());
    }

    public function testIspbReturnsCorrectCodes(): void
    {
        $this->assertEquals('00000000', BrazilianBankCode::BANCO_DO_BRASIL->ispb());
        $this->assertEquals('00360305', BrazilianBankCode::CAIXA_ECONOMICA_FEDERAL->ispb());
        $this->assertEquals('60746948', BrazilianBankCode::BRADESCO->ispb());
        $this->assertEquals('60701190', BrazilianBankCode::ITAU_UNIBANCO->ispb());
        $this->assertEquals('18236120', BrazilianBankCode::NUBANK->ispb());
    }

    public function testDigitalBanksExist(): void
    {
        $this->assertEquals('260', BrazilianBankCode::NUBANK->value);
        $this->assertEquals('077', BrazilianBankCode::BANCO_INTER->value);
        $this->assertEquals('336', BrazilianBankCode::C6_BANK->value);
        $this->assertEquals('290', BrazilianBankCode::PAGSEGURO->value);
        $this->assertEquals('323', BrazilianBankCode::MERCADO_PAGO->value);
        $this->assertEquals('306', BrazilianBankCode::PICPAY->value);
    }

    public function testCooperativesExist(): void
    {
        $this->assertEquals('748', BrazilianBankCode::SICREDI->value);
        $this->assertEquals('756', BrazilianBankCode::BANCO_BANCOOB->value);
        $this->assertEquals('016', BrazilianBankCode::SICOOB->value);
    }

    public function testToArrayReturnsAllBanks(): void
    {
        $array = BrazilianBankCode::toArray();

        $this->assertArrayHasKey('001', $array);
        $this->assertEquals('001', $array['001']);
        $this->assertArrayHasKey('341', $array);
        $this->assertEquals('341', $array['341']);
    }

    public function testToArrayWithFullNamesReturnsBankNames(): void
    {
        $array = BrazilianBankCode::toArrayWithLabels();

        $this->assertArrayHasKey('001', $array);
        $this->assertEquals('Banco do Brasil S.A.', $array['001']);
    }

    public function testToArrayWithShortNamesReturnsBankShortNames(): void
    {
        $array = BrazilianBankCode::toArrayWithShortNames();

        $this->assertArrayHasKey('001', $array);
        $this->assertEquals('Banco do Brasil', $array['001']);
        $this->assertArrayHasKey('104', $array);
        $this->assertEquals('Caixa', $array['104']);
    }

    public function testCanBeCreatedFromString(): void
    {
        $bank = BrazilianBankCode::from('341');

        $this->assertEquals(BrazilianBankCode::ITAU_UNIBANCO, $bank);
    }

    public function testTryFromReturnsNullForInvalidCode(): void
    {
        $bank = BrazilianBankCode::tryFrom('999');

        $this->assertNull($bank);
    }
}
