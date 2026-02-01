<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Brazil;

use DevToolbelt\Enums\Brazil\BrazilianState;
use DevToolbelt\Enums\Tests\TestCase;

final class BrazilianStateTest extends TestCase
{
    public function testAllStatesHaveCorrectAbbreviationAsValue(): void
    {
        $this->assertEquals('AC', BrazilianState::AC->value);
        $this->assertEquals('AL', BrazilianState::AL->value);
        $this->assertEquals('AP', BrazilianState::AP->value);
        $this->assertEquals('AM', BrazilianState::AM->value);
        $this->assertEquals('BA', BrazilianState::BA->value);
        $this->assertEquals('CE', BrazilianState::CE->value);
        $this->assertEquals('DF', BrazilianState::DF->value);
        $this->assertEquals('ES', BrazilianState::ES->value);
        $this->assertEquals('GO', BrazilianState::GO->value);
        $this->assertEquals('MA', BrazilianState::MA->value);
        $this->assertEquals('MT', BrazilianState::MT->value);
        $this->assertEquals('MS', BrazilianState::MS->value);
        $this->assertEquals('MG', BrazilianState::MG->value);
        $this->assertEquals('PA', BrazilianState::PA->value);
        $this->assertEquals('PB', BrazilianState::PB->value);
        $this->assertEquals('PR', BrazilianState::PR->value);
        $this->assertEquals('PE', BrazilianState::PE->value);
        $this->assertEquals('PI', BrazilianState::PI->value);
        $this->assertEquals('RJ', BrazilianState::RJ->value);
        $this->assertEquals('RN', BrazilianState::RN->value);
        $this->assertEquals('RS', BrazilianState::RS->value);
        $this->assertEquals('RO', BrazilianState::RO->value);
        $this->assertEquals('RR', BrazilianState::RR->value);
        $this->assertEquals('SC', BrazilianState::SC->value);
        $this->assertEquals('SP', BrazilianState::SP->value);
        $this->assertEquals('SE', BrazilianState::SE->value);
        $this->assertEquals('TO', BrazilianState::TO->value);
    }

    public function testFullNameReturnsCorrectStateNames(): void
    {
        $this->assertEquals('Acre', BrazilianState::AC->fullName());
        $this->assertEquals('Alagoas', BrazilianState::AL->fullName());
        $this->assertEquals('Amapá', BrazilianState::AP->fullName());
        $this->assertEquals('Amazonas', BrazilianState::AM->fullName());
        $this->assertEquals('Bahia', BrazilianState::BA->fullName());
        $this->assertEquals('Ceará', BrazilianState::CE->fullName());
        $this->assertEquals('Distrito Federal', BrazilianState::DF->fullName());
        $this->assertEquals('Espírito Santo', BrazilianState::ES->fullName());
        $this->assertEquals('Goiás', BrazilianState::GO->fullName());
        $this->assertEquals('Maranhão', BrazilianState::MA->fullName());
        $this->assertEquals('Mato Grosso', BrazilianState::MT->fullName());
        $this->assertEquals('Mato Grosso do Sul', BrazilianState::MS->fullName());
        $this->assertEquals('Minas Gerais', BrazilianState::MG->fullName());
        $this->assertEquals('Pará', BrazilianState::PA->fullName());
        $this->assertEquals('Paraíba', BrazilianState::PB->fullName());
        $this->assertEquals('Paraná', BrazilianState::PR->fullName());
        $this->assertEquals('Pernambuco', BrazilianState::PE->fullName());
        $this->assertEquals('Piauí', BrazilianState::PI->fullName());
        $this->assertEquals('Rio de Janeiro', BrazilianState::RJ->fullName());
        $this->assertEquals('Rio Grande do Norte', BrazilianState::RN->fullName());
        $this->assertEquals('Rio Grande do Sul', BrazilianState::RS->fullName());
        $this->assertEquals('Rondônia', BrazilianState::RO->fullName());
        $this->assertEquals('Roraima', BrazilianState::RR->fullName());
        $this->assertEquals('Santa Catarina', BrazilianState::SC->fullName());
        $this->assertEquals('São Paulo', BrazilianState::SP->fullName());
        $this->assertEquals('Sergipe', BrazilianState::SE->fullName());
        $this->assertEquals('Tocantins', BrazilianState::TO->fullName());
    }

    public function testTotalNumberOfStates(): void
    {
        $this->assertCount(27, BrazilianState::cases());
    }

    public function testCanBeCreatedFromString(): void
    {
        $state = BrazilianState::from('CE');

        $this->assertEquals(BrazilianState::CE, $state);
        $this->assertEquals('Ceará', $state->fullName());
    }

    public function testTryFromReturnsNullForInvalidState(): void
    {
        $state = BrazilianState::tryFrom('XX');

        $this->assertNull($state);
    }

    public function testTryFromReturnsStateForValidAbbreviation(): void
    {
        $state = BrazilianState::tryFrom('SP');

        $this->assertNotNull($state);
        $this->assertEquals(BrazilianState::SP, $state);
    }

    public function testFullNameReturnsUppercaseWhenParameterIsTrue(): void
    {
        $this->assertEquals('CEARÁ', BrazilianState::CE->fullName(true));
        $this->assertEquals('SÃO PAULO', BrazilianState::SP->fullName(true));
        $this->assertEquals('ESPÍRITO SANTO', BrazilianState::ES->fullName(true));
        $this->assertEquals('MATO GROSSO DO SUL', BrazilianState::MS->fullName(true));
    }

    public function testToArrayReturnsAllStatesWithUfAsKeyAndValue(): void
    {
        $array = BrazilianState::toArray();

        $this->assertCount(27, $array);
        $this->assertArrayHasKey('CE', $array);
        $this->assertEquals('CE', $array['CE']);
        $this->assertArrayHasKey('SP', $array);
        $this->assertEquals('SP', $array['SP']);
    }

    public function testToArrayWithFullNamesReturnsUfAsKeyAndFullNameAsValue(): void
    {
        $array = BrazilianState::toArrayWithFullNames();

        $this->assertCount(27, $array);
        $this->assertArrayHasKey('CE', $array);
        $this->assertEquals('Ceará', $array['CE']);
        $this->assertArrayHasKey('SP', $array);
        $this->assertEquals('São Paulo', $array['SP']);
        $this->assertArrayHasKey('MS', $array);
        $this->assertEquals('Mato Grosso do Sul', $array['MS']);
    }

    public function testToArrayWithFullNamesReturnsUppercaseWhenParameterIsTrue(): void
    {
        $array = BrazilianState::toArrayWithFullNames(true);

        $this->assertCount(27, $array);
        $this->assertEquals('CEARÁ', $array['CE']);
        $this->assertEquals('SÃO PAULO', $array['SP']);
        $this->assertEquals('ESPÍRITO SANTO', $array['ES']);
    }
}
