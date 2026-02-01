<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Brazil;

use DevToolbelt\Enums\Brazil\BrazilianDocumentType;
use DevToolbelt\Enums\Tests\TestCase;

final class BrazilianDocumentTypeTest extends TestCase
{
    public function testCommonDocumentTypesHaveCorrectValues(): void
    {
        $this->assertEquals('CPF', BrazilianDocumentType::CPF->value);
        $this->assertEquals('CNPJ', BrazilianDocumentType::CNPJ->value);
        $this->assertEquals('RG', BrazilianDocumentType::RG->value);
        $this->assertEquals('CNH', BrazilianDocumentType::CNH->value);
        $this->assertEquals('CTPS', BrazilianDocumentType::CTPS->value);
        $this->assertEquals('PIS_PASEP', BrazilianDocumentType::PIS_PASEP->value);
    }

    public function testFullNameReturnsCorrectNames(): void
    {
        $this->assertEquals('Cadastro de Pessoa Física', BrazilianDocumentType::CPF->label());
        $this->assertEquals('Cadastro Nacional da Pessoa Jurídica', BrazilianDocumentType::CNPJ->label());
        $this->assertEquals('Registro Geral', BrazilianDocumentType::RG->label());
        $this->assertEquals('Carteira Nacional de Habilitação', BrazilianDocumentType::CNH->label());
        $this->assertEquals('Carteira de Trabalho e Previdência Social', BrazilianDocumentType::CTPS->label());
        $this->assertEquals('Ordem dos Advogados do Brasil', BrazilianDocumentType::OAB->label());
    }

    public function testMaskReturnsCorrectMasks(): void
    {
        $this->assertEquals('###.###.###-##', BrazilianDocumentType::CPF->mask());
        $this->assertEquals('##.###.###/####-##', BrazilianDocumentType::CNPJ->mask());
        $this->assertEquals('###########', BrazilianDocumentType::CNH->mask());
        $this->assertEquals('###.#####.##-#', BrazilianDocumentType::PIS_PASEP->mask());
        $this->assertEquals('####.####.####', BrazilianDocumentType::TITULO_ELEITOR->mask());
    }

    public function testMaskReturnsNullForDocumentsWithoutStandardMask(): void
    {
        $this->assertNull(BrazilianDocumentType::RG->mask());
        $this->assertNull(BrazilianDocumentType::PASSAPORTE->mask());
        $this->assertNull(BrazilianDocumentType::OAB->mask());
    }

    public function testLengthReturnsCorrectLength(): void
    {
        $this->assertEquals(11, BrazilianDocumentType::CPF->length());
        $this->assertEquals(14, BrazilianDocumentType::CNPJ->length());
        $this->assertEquals(11, BrazilianDocumentType::CNH->length());
        $this->assertEquals(11, BrazilianDocumentType::PIS_PASEP->length());
        $this->assertEquals(12, BrazilianDocumentType::TITULO_ELEITOR->length());
    }

    public function testLengthReturnsNullForDocumentsWithoutStandardLength(): void
    {
        $this->assertNull(BrazilianDocumentType::RG->length());
        $this->assertNull(BrazilianDocumentType::PASSAPORTE->length());
    }

    public function testIsPersonalDocumentReturnsTrueForPersonalDocuments(): void
    {
        $this->assertTrue(BrazilianDocumentType::CPF->isPersonalDocument());
        $this->assertTrue(BrazilianDocumentType::RG->isPersonalDocument());
        $this->assertTrue(BrazilianDocumentType::CNH->isPersonalDocument());
        $this->assertTrue(BrazilianDocumentType::CTPS->isPersonalDocument());
        $this->assertTrue(BrazilianDocumentType::PASSAPORTE->isPersonalDocument());
        $this->assertTrue(BrazilianDocumentType::CERTIDAO_NASCIMENTO->isPersonalDocument());
    }

    public function testIsPersonalDocumentReturnsFalseForNonPersonalDocuments(): void
    {
        $this->assertFalse(BrazilianDocumentType::CNPJ->isPersonalDocument());
        $this->assertFalse(BrazilianDocumentType::OAB->isPersonalDocument());
        $this->assertFalse(BrazilianDocumentType::CRM->isPersonalDocument());
    }

    public function testIsCompanyDocumentReturnsTrueOnlyForCnpj(): void
    {
        $this->assertTrue(BrazilianDocumentType::CNPJ->isCompanyDocument());
        $this->assertFalse(BrazilianDocumentType::CPF->isCompanyDocument());
        $this->assertFalse(BrazilianDocumentType::OAB->isCompanyDocument());
    }

    public function testIsProfessionalDocumentReturnsTrueForProfessionalDocuments(): void
    {
        $this->assertTrue(BrazilianDocumentType::CRM->isProfessionalDocument());
        $this->assertTrue(BrazilianDocumentType::OAB->isProfessionalDocument());
        $this->assertTrue(BrazilianDocumentType::CRO->isProfessionalDocument());
        $this->assertTrue(BrazilianDocumentType::CREA->isProfessionalDocument());
        $this->assertTrue(BrazilianDocumentType::CRC->isProfessionalDocument());
        $this->assertTrue(BrazilianDocumentType::COREN->isProfessionalDocument());
        $this->assertTrue(BrazilianDocumentType::CRP->isProfessionalDocument());
        $this->assertTrue(BrazilianDocumentType::CRECI->isProfessionalDocument());
        $this->assertTrue(BrazilianDocumentType::CAU->isProfessionalDocument());
    }

    public function testIsProfessionalDocumentReturnsFalseForNonProfessionalDocuments(): void
    {
        $this->assertFalse(BrazilianDocumentType::CPF->isProfessionalDocument());
        $this->assertFalse(BrazilianDocumentType::CNPJ->isProfessionalDocument());
        $this->assertFalse(BrazilianDocumentType::RG->isProfessionalDocument());
    }

    public function testIsCertificateReturnsTrueForCertificates(): void
    {
        $this->assertTrue(BrazilianDocumentType::CERTIDAO_NASCIMENTO->isCertificate());
        $this->assertTrue(BrazilianDocumentType::CERTIDAO_CASAMENTO->isCertificate());
        $this->assertTrue(BrazilianDocumentType::CERTIDAO_OBITO->isCertificate());
    }

    public function testIsCertificateReturnsFalseForNonCertificates(): void
    {
        $this->assertFalse(BrazilianDocumentType::CPF->isCertificate());
        $this->assertFalse(BrazilianDocumentType::RG->isCertificate());
    }

    public function testToArrayReturnsAllDocumentTypes(): void
    {
        $array = BrazilianDocumentType::toArray();

        $this->assertArrayHasKey('CPF', $array);
        $this->assertEquals('CPF', $array['CPF']);
        $this->assertArrayHasKey('CNPJ', $array);
        $this->assertEquals('CNPJ', $array['CNPJ']);
    }

    public function testToArrayWithFullNamesReturnsDocumentNames(): void
    {
        $array = BrazilianDocumentType::toArrayWithLabels();

        $this->assertArrayHasKey('CPF', $array);
        $this->assertEquals('Cadastro de Pessoa Física', $array['CPF']);
        $this->assertArrayHasKey('CNPJ', $array);
        $this->assertEquals('Cadastro Nacional da Pessoa Jurídica', $array['CNPJ']);
    }

    public function testCanBeCreatedFromString(): void
    {
        $document = BrazilianDocumentType::from('CPF');

        $this->assertEquals(BrazilianDocumentType::CPF, $document);
    }

    public function testTryFromReturnsNullForInvalidDocumentType(): void
    {
        $document = BrazilianDocumentType::tryFrom('INVALID');

        $this->assertNull($document);
    }
}
