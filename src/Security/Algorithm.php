<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Security;

use DevToolbelt\Enums\EnumInterface;

enum Algorithm: string implements EnumInterface
{
    // HMAC algorithms
    case HS256 = 'HS256';
    case HS384 = 'HS384';
    case HS512 = 'HS512';

    // RSA algorithms
    case RS256 = 'RS256';
    case RS384 = 'RS384';
    case RS512 = 'RS512';

    // ECDSA algorithms
    case ES256 = 'ES256';
    case ES384 = 'ES384';
    case ES512 = 'ES512';

    // RSA-PSS algorithms
    case PS256 = 'PS256';
    case PS384 = 'PS384';
    case PS512 = 'PS512';

    // EdDSA algorithm
    case EdDSA = 'EdDSA';

    public function isSymmetric(): bool
    {
        return in_array($this, [self::HS256, self::HS384, self::HS512], true);
    }

    public function isAsymmetric(): bool
    {
        return !$this->isSymmetric();
    }

    public function isRSA(): bool
    {
        return in_array($this, [
            self::RS256,
            self::RS384,
            self::RS512,
            self::PS256,
            self::PS384,
            self::PS512
        ], true);
    }

    public function isECDSA(): bool
    {
        return in_array($this, [self::ES256, self::ES384, self::ES512], true);
    }

    public function label(): string
    {
        return match ($this) {
            self::HS256 => 'HMAC using SHA-256',
            self::HS384 => 'HMAC using SHA-384',
            self::HS512 => 'HMAC using SHA-512',
            self::RS256 => 'RSASSA-PKCS1-v1_5 using SHA-256',
            self::RS384 => 'RSASSA-PKCS1-v1_5 using SHA-384',
            self::RS512 => 'RSASSA-PKCS1-v1_5 using SHA-512',
            self::ES256 => 'ECDSA using P-256 and SHA-256',
            self::ES384 => 'ECDSA using P-384 and SHA-384',
            self::ES512 => 'ECDSA using P-521 and SHA-512',
            self::PS256 => 'RSASSA-PSS using SHA-256 and MGF1 with SHA-256',
            self::PS384 => 'RSASSA-PSS using SHA-384 and MGF1 with SHA-384',
            self::PS512 => 'RSASSA-PSS using SHA-512 and MGF1 with SHA-512',
            self::EdDSA => 'Edwards-curve Digital Signature Algorithm',
        };
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

        foreach (self::cases() as $algorithm) {
            $result[$algorithm->value] = $algorithm->value;
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayWithLabels(): array
    {
        $result = [];

        foreach (self::cases() as $algorithm) {
            $result[$algorithm->value] = $algorithm->label();
        }

        return $result;
    }
}
