<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Personal;

enum ContactType: string
{
    case EMAIL = 'email';
    case PHONE = 'phone';
    case MOBILE = 'mobile';
    case WHATSAPP = 'whatsapp';
    case TELEGRAM = 'telegram';
    case FAX = 'fax';
    case WEBSITE = 'website';
    case SKYPE = 'skype';
    case LINKEDIN = 'linkedin';
    case FACEBOOK = 'facebook';
    case INSTAGRAM = 'instagram';
    case TWITTER = 'twitter';
    case YOUTUBE = 'youtube';
    case TIKTOK = 'tiktok';
    case GITHUB = 'github';
    case ADDRESS = 'address';

    public function fullName(): string
    {
        return match ($this) {
            self::EMAIL => 'Email',
            self::PHONE => 'Phone',
            self::MOBILE => 'Mobile Phone',
            self::WHATSAPP => 'WhatsApp',
            self::TELEGRAM => 'Telegram',
            self::FAX => 'Fax',
            self::WEBSITE => 'Website',
            self::SKYPE => 'Skype',
            self::LINKEDIN => 'LinkedIn',
            self::FACEBOOK => 'Facebook',
            self::INSTAGRAM => 'Instagram',
            self::TWITTER => 'Twitter / X',
            self::YOUTUBE => 'YouTube',
            self::TIKTOK => 'TikTok',
            self::GITHUB => 'GitHub',
            self::ADDRESS => 'Address',
        };
    }

    public function fullNamePtBr(): string
    {
        return match ($this) {
            self::EMAIL => 'E-mail',
            self::PHONE => 'Telefone',
            self::MOBILE => 'Celular',
            self::WHATSAPP => 'WhatsApp',
            self::TELEGRAM => 'Telegram',
            self::FAX => 'Fax',
            self::WEBSITE => 'Site',
            self::SKYPE => 'Skype',
            self::LINKEDIN => 'LinkedIn',
            self::FACEBOOK => 'Facebook',
            self::INSTAGRAM => 'Instagram',
            self::TWITTER => 'Twitter / X',
            self::YOUTUBE => 'YouTube',
            self::TIKTOK => 'TikTok',
            self::GITHUB => 'GitHub',
            self::ADDRESS => 'Endereço',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::EMAIL => 'envelope',
            self::PHONE => 'phone',
            self::MOBILE => 'mobile',
            self::WHATSAPP => 'whatsapp',
            self::TELEGRAM => 'telegram',
            self::FAX => 'fax',
            self::WEBSITE => 'globe',
            self::SKYPE => 'skype',
            self::LINKEDIN => 'linkedin',
            self::FACEBOOK => 'facebook',
            self::INSTAGRAM => 'instagram',
            self::TWITTER => 'twitter',
            self::YOUTUBE => 'youtube',
            self::TIKTOK => 'tiktok',
            self::GITHUB => 'github',
            self::ADDRESS => 'map-marker',
        };
    }

    public function baseUrl(): ?string
    {
        return match ($this) {
            self::WHATSAPP => 'https://wa.me/',
            self::TELEGRAM => 'https://t.me/',
            self::SKYPE => 'skype:',
            self::LINKEDIN => 'https://linkedin.com/in/',
            self::FACEBOOK => 'https://facebook.com/',
            self::INSTAGRAM => 'https://instagram.com/',
            self::TWITTER => 'https://twitter.com/',
            self::YOUTUBE => 'https://youtube.com/',
            self::TIKTOK => 'https://tiktok.com/@',
            self::GITHUB => 'https://github.com/',
            self::EMAIL => 'mailto:',
            self::PHONE, self::MOBILE => 'tel:',
            default => null,
        };
    }

    public function buildUrl(string $value): string
    {
        $baseUrl = $this->baseUrl();

        if ($baseUrl === null) {
            return $value;
        }

        if ($this === self::WHATSAPP) {
            $value = preg_replace('/\D/', '', $value);
        }

        return $baseUrl . $value;
    }

    public function isPhone(): bool
    {
        return in_array($this, [self::PHONE, self::MOBILE, self::WHATSAPP, self::FAX], true);
    }

    public function isSocialNetwork(): bool
    {
        return in_array($this, [
            self::LINKEDIN,
            self::FACEBOOK,
            self::INSTAGRAM,
            self::TWITTER,
            self::YOUTUBE,
            self::TIKTOK,
            self::GITHUB,
        ], true);
    }

    public function isMessenger(): bool
    {
        return in_array($this, [self::WHATSAPP, self::TELEGRAM, self::SKYPE], true);
    }

    public function isDigital(): bool
    {
        return $this !== self::ADDRESS && $this !== self::FAX;
    }

    /**
     * @return array<string, string>
     */
    public static function toArray(): array
    {
        $result = [];

        foreach (self::cases() as $type) {
            $result[$type->value] = $type->fullName();
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayPtBr(): array
    {
        $result = [];

        foreach (self::cases() as $type) {
            $result[$type->value] = $type->fullNamePtBr();
        }

        return $result;
    }

    /**
     * @return self[]
     */
    public static function phones(): array
    {
        return array_filter(self::cases(), fn (self $type) => $type->isPhone());
    }

    /**
     * @return self[]
     */
    public static function socialNetworks(): array
    {
        return array_filter(self::cases(), fn (self $type) => $type->isSocialNetwork());
    }

    /**
     * @return self[]
     */
    public static function messengers(): array
    {
        return array_filter(self::cases(), fn (self $type) => $type->isMessenger());
    }
}
