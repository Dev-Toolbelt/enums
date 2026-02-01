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
        $this->assertEquals('Acre', BrazilianState::AC->label());
        $this->assertEquals('Alagoas', BrazilianState::AL->label());
        $this->assertEquals('Amapá', BrazilianState::AP->label());
        $this->assertEquals('Amazonas', BrazilianState::AM->label());
        $this->assertEquals('Bahia', BrazilianState::BA->label());
        $this->assertEquals('Ceará', BrazilianState::CE->label());
        $this->assertEquals('Distrito Federal', BrazilianState::DF->label());
        $this->assertEquals('Espírito Santo', BrazilianState::ES->label());
        $this->assertEquals('Goiás', BrazilianState::GO->label());
        $this->assertEquals('Maranhão', BrazilianState::MA->label());
        $this->assertEquals('Mato Grosso', BrazilianState::MT->label());
        $this->assertEquals('Mato Grosso do Sul', BrazilianState::MS->label());
        $this->assertEquals('Minas Gerais', BrazilianState::MG->label());
        $this->assertEquals('Pará', BrazilianState::PA->label());
        $this->assertEquals('Paraíba', BrazilianState::PB->label());
        $this->assertEquals('Paraná', BrazilianState::PR->label());
        $this->assertEquals('Pernambuco', BrazilianState::PE->label());
        $this->assertEquals('Piauí', BrazilianState::PI->label());
        $this->assertEquals('Rio de Janeiro', BrazilianState::RJ->label());
        $this->assertEquals('Rio Grande do Norte', BrazilianState::RN->label());
        $this->assertEquals('Rio Grande do Sul', BrazilianState::RS->label());
        $this->assertEquals('Rondônia', BrazilianState::RO->label());
        $this->assertEquals('Roraima', BrazilianState::RR->label());
        $this->assertEquals('Santa Catarina', BrazilianState::SC->label());
        $this->assertEquals('São Paulo', BrazilianState::SP->label());
        $this->assertEquals('Sergipe', BrazilianState::SE->label());
        $this->assertEquals('Tocantins', BrazilianState::TO->label());
    }

    public function testTotalNumberOfStates(): void
    {
        $this->assertCount(27, BrazilianState::cases());
    }

    public function testCanBeCreatedFromString(): void
    {
        $state = BrazilianState::from('CE');

        $this->assertEquals(BrazilianState::CE, $state);
        $this->assertEquals('Ceará', $state->label());
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
        $this->assertEquals('CEARÁ', BrazilianState::CE->label(true));
        $this->assertEquals('SÃO PAULO', BrazilianState::SP->label(true));
        $this->assertEquals('ESPÍRITO SANTO', BrazilianState::ES->label(true));
        $this->assertEquals('MATO GROSSO DO SUL', BrazilianState::MS->label(true));
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
        $array = BrazilianState::toArrayWithLabels();

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
        $array = BrazilianState::toArrayWithLabels(true);

        $this->assertCount(27, $array);
        $this->assertEquals('CEARÁ', $array['CE']);
        $this->assertEquals('SÃO PAULO', $array['SP']);
        $this->assertEquals('ESPÍRITO SANTO', $array['ES']);
    }
}
