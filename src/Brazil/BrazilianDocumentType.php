<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Brazil;

use DevToolbelt\Enums\EnumInterface;

enum BrazilianDocumentType: string implements EnumInterface
{
    case CPF = 'CPF';
    case CNPJ = 'CNPJ';
    case RG = 'RG';
    case CNH = 'CNH';
    case CTPS = 'CTPS';
    case PIS_PASEP = 'PIS_PASEP';
    case TITULO_ELEITOR = 'TITULO_ELEITOR';
    case PASSAPORTE = 'PASSAPORTE';
    case CERTIDAO_NASCIMENTO = 'CERTIDAO_NASCIMENTO';
    case CERTIDAO_CASAMENTO = 'CERTIDAO_CASAMENTO';
    case CERTIDAO_OBITO = 'CERTIDAO_OBITO';
    case RNE = 'RNE';
    case CRNM = 'CRNM';
    case CRM = 'CRM';
    case OAB = 'OAB';
    case CRO = 'CRO';
    case CREA = 'CREA';
    case CRC = 'CRC';
    case CRF = 'CRF';
    case COREN = 'COREN';
    case CRP = 'CRP';
    case CRECI = 'CRECI';
    case CAU = 'CAU';

    public function label(): string
    {
        return match ($this) {
            self::CPF => 'Cadastro de Pessoa Física',
            self::CNPJ => 'Cadastro Nacional da Pessoa Jurídica',
            self::RG => 'Registro Geral',
            self::CNH => 'Carteira Nacional de Habilitação',
            self::CTPS => 'Carteira de Trabalho e Previdência Social',
            self::PIS_PASEP => 'Programa de Integração Social / Programa de Formação do Patrimônio do Servidor Público',
            self::TITULO_ELEITOR => 'Título de Eleitor',
            self::PASSAPORTE => 'Passaporte',
            self::CERTIDAO_NASCIMENTO => 'Certidão de Nascimento',
            self::CERTIDAO_CASAMENTO => 'Certidão de Casamento',
            self::CERTIDAO_OBITO => 'Certidão de Óbito',
            self::RNE => 'Registro Nacional de Estrangeiro',
            self::CRNM => 'Carteira de Registro Nacional Migratório',
            self::CRM => 'Conselho Regional de Medicina',
            self::OAB => 'Ordem dos Advogados do Brasil',
            self::CRO => 'Conselho Regional de Odontologia',
            self::CREA => 'Conselho Regional de Engenharia e Agronomia',
            self::CRC => 'Conselho Regional de Contabilidade',
            self::CRF => 'Conselho Regional de Farmácia',
            self::COREN => 'Conselho Regional de Enfermagem',
            self::CRP => 'Conselho Regional de Psicologia',
            self::CRECI => 'Conselho Regional de Corretores de Imóveis',
            self::CAU => 'Conselho de Arquitetura e Urbanismo',
        };
    }

    public function mask(): ?string
    {
        return match ($this) {
            self::CPF => '###.###.###-##',
            self::CNPJ => '##.###.###/####-##',
            self::CNH => '###########',
            self::PIS_PASEP => '###.#####.##-#',
            self::TITULO_ELEITOR => '####.####.####',
            default => null,
        };
    }

    public function length(): ?int
    {
        return match ($this) {
            self::CPF => 11,
            self::CNPJ => 14,
            self::CNH => 11,
            self::PIS_PASEP => 11,
            self::TITULO_ELEITOR => 12,
            default => null,
        };
    }

    public function isPersonalDocument(): bool
    {
        return in_array($this, [
            self::CPF,
            self::RG,
            self::CNH,
            self::CTPS,
            self::PIS_PASEP,
            self::TITULO_ELEITOR,
            self::PASSAPORTE,
            self::CERTIDAO_NASCIMENTO,
            self::CERTIDAO_CASAMENTO,
            self::RNE,
            self::CRNM,
        ], true);
    }

    public function isCompanyDocument(): bool
    {
        return $this === self::CNPJ;
    }

    public function isProfessionalDocument(): bool
    {
        return in_array($this, [
            self::CRM,
            self::OAB,
            self::CRO,
            self::CREA,
            self::CRC,
            self::CRF,
            self::COREN,
            self::CRP,
            self::CRECI,
            self::CAU,
        ], true);
    }

    public function isCertificate(): bool
    {
        return in_array($this, [
            self::CERTIDAO_NASCIMENTO,
            self::CERTIDAO_CASAMENTO,
            self::CERTIDAO_OBITO,
        ], true);
    }

    /**
     * @return string[]
     */
    public function labelList(): array
    {
        return array_map(fn (self $case) => $case->label(), self::cases());
    }

    /**
     * @return array<string, string>
     */
    public static function toArray(): array
    {
        $result = [];

        foreach (self::cases() as $document) {
            $result[$document->value] = $document->value;
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayWithLabels(): array
    {
        $result = [];

        foreach (self::cases() as $document) {
            $result[$document->value] = $document->label();
        }

        return $result;
    }
}
