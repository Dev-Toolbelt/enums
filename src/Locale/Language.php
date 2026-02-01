<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Locale;

enum Language: string
{
    // Arabic
    case AR = 'ar';
    case AR_SA = 'ar-SA';
    case AR_EG = 'ar-EG';
    case AR_AE = 'ar-AE';

    // Chinese
    case ZH = 'zh';
    case ZH_CN = 'zh-CN';
    case ZH_TW = 'zh-TW';
    case ZH_HK = 'zh-HK';

    // Czech
    case CS = 'cs';
    case CS_CZ = 'cs-CZ';

    // Danish
    case DA = 'da';
    case DA_DK = 'da-DK';

    // Dutch
    case NL = 'nl';
    case NL_NL = 'nl-NL';
    case NL_BE = 'nl-BE';

    // English
    case EN = 'en';
    case EN_US = 'en-US';
    case EN_GB = 'en-GB';
    case EN_AU = 'en-AU';
    case EN_CA = 'en-CA';
    case EN_NZ = 'en-NZ';
    case EN_IE = 'en-IE';
    case EN_ZA = 'en-ZA';
    case EN_IN = 'en-IN';

    // Finnish
    case FI = 'fi';
    case FI_FI = 'fi-FI';

    // French
    case FR = 'fr';
    case FR_FR = 'fr-FR';
    case FR_CA = 'fr-CA';
    case FR_BE = 'fr-BE';
    case FR_CH = 'fr-CH';

    // German
    case DE = 'de';
    case DE_DE = 'de-DE';
    case DE_AT = 'de-AT';
    case DE_CH = 'de-CH';

    // Greek
    case EL = 'el';
    case EL_GR = 'el-GR';

    // Hebrew
    case HE = 'he';
    case HE_IL = 'he-IL';

    // Hindi
    case HI = 'hi';
    case HI_IN = 'hi-IN';

    // Hungarian
    case HU = 'hu';
    case HU_HU = 'hu-HU';

    // Indonesian
    case ID = 'id';
    case ID_ID = 'id-ID';

    // Italian
    case IT = 'it';
    case IT_IT = 'it-IT';
    case IT_CH = 'it-CH';

    // Japanese
    case JA = 'ja';
    case JA_JP = 'ja-JP';

    // Korean
    case KO = 'ko';
    case KO_KR = 'ko-KR';

    // Malay
    case MS = 'ms';
    case MS_MY = 'ms-MY';

    // Norwegian
    case NO = 'no';
    case NB = 'nb';
    case NB_NO = 'nb-NO';
    case NN = 'nn';
    case NN_NO = 'nn-NO';

    // Polish
    case PL = 'pl';
    case PL_PL = 'pl-PL';

    // Portuguese
    case PT = 'pt';
    case PT_BR = 'pt-BR';
    case PT_PT = 'pt-PT';

    // Romanian
    case RO = 'ro';
    case RO_RO = 'ro-RO';

    // Russian
    case RU = 'ru';
    case RU_RU = 'ru-RU';

    // Slovak
    case SK = 'sk';
    case SK_SK = 'sk-SK';

    // Spanish
    case ES = 'es';
    case ES_ES = 'es-ES';
    case ES_MX = 'es-MX';
    case ES_AR = 'es-AR';
    case ES_CO = 'es-CO';
    case ES_CL = 'es-CL';
    case ES_PE = 'es-PE';
    case ES_VE = 'es-VE';

    // Swedish
    case SV = 'sv';
    case SV_SE = 'sv-SE';

    // Thai
    case TH = 'th';
    case TH_TH = 'th-TH';

    // Turkish
    case TR = 'tr';
    case TR_TR = 'tr-TR';

    // Ukrainian
    case UK = 'uk';
    case UK_UA = 'uk-UA';

    // Vietnamese
    case VI = 'vi';
    case VI_VN = 'vi-VN';

    public function fullName(): string
    {
        return match ($this) {
            self::AR => 'Arabic',
            self::AR_SA => 'Arabic (Saudi Arabia)',
            self::AR_EG => 'Arabic (Egypt)',
            self::AR_AE => 'Arabic (United Arab Emirates)',
            self::ZH => 'Chinese',
            self::ZH_CN => 'Chinese (Simplified)',
            self::ZH_TW => 'Chinese (Traditional)',
            self::ZH_HK => 'Chinese (Hong Kong)',
            self::CS => 'Czech',
            self::CS_CZ => 'Czech (Czech Republic)',
            self::DA => 'Danish',
            self::DA_DK => 'Danish (Denmark)',
            self::NL => 'Dutch',
            self::NL_NL => 'Dutch (Netherlands)',
            self::NL_BE => 'Dutch (Belgium)',
            self::EN => 'English',
            self::EN_US => 'English (United States)',
            self::EN_GB => 'English (United Kingdom)',
            self::EN_AU => 'English (Australia)',
            self::EN_CA => 'English (Canada)',
            self::EN_NZ => 'English (New Zealand)',
            self::EN_IE => 'English (Ireland)',
            self::EN_ZA => 'English (South Africa)',
            self::EN_IN => 'English (India)',
            self::FI => 'Finnish',
            self::FI_FI => 'Finnish (Finland)',
            self::FR => 'French',
            self::FR_FR => 'French (France)',
            self::FR_CA => 'French (Canada)',
            self::FR_BE => 'French (Belgium)',
            self::FR_CH => 'French (Switzerland)',
            self::DE => 'German',
            self::DE_DE => 'German (Germany)',
            self::DE_AT => 'German (Austria)',
            self::DE_CH => 'German (Switzerland)',
            self::EL => 'Greek',
            self::EL_GR => 'Greek (Greece)',
            self::HE => 'Hebrew',
            self::HE_IL => 'Hebrew (Israel)',
            self::HI => 'Hindi',
            self::HI_IN => 'Hindi (India)',
            self::HU => 'Hungarian',
            self::HU_HU => 'Hungarian (Hungary)',
            self::ID => 'Indonesian',
            self::ID_ID => 'Indonesian (Indonesia)',
            self::IT => 'Italian',
            self::IT_IT => 'Italian (Italy)',
            self::IT_CH => 'Italian (Switzerland)',
            self::JA => 'Japanese',
            self::JA_JP => 'Japanese (Japan)',
            self::KO => 'Korean',
            self::KO_KR => 'Korean (South Korea)',
            self::MS => 'Malay',
            self::MS_MY => 'Malay (Malaysia)',
            self::NO => 'Norwegian',
            self::NB => 'Norwegian Bokmål',
            self::NB_NO => 'Norwegian Bokmål (Norway)',
            self::NN => 'Norwegian Nynorsk',
            self::NN_NO => 'Norwegian Nynorsk (Norway)',
            self::PL => 'Polish',
            self::PL_PL => 'Polish (Poland)',
            self::PT => 'Portuguese',
            self::PT_BR => 'Portuguese (Brazil)',
            self::PT_PT => 'Portuguese (Portugal)',
            self::RO => 'Romanian',
            self::RO_RO => 'Romanian (Romania)',
            self::RU => 'Russian',
            self::RU_RU => 'Russian (Russia)',
            self::SK => 'Slovak',
            self::SK_SK => 'Slovak (Slovakia)',
            self::ES => 'Spanish',
            self::ES_ES => 'Spanish (Spain)',
            self::ES_MX => 'Spanish (Mexico)',
            self::ES_AR => 'Spanish (Argentina)',
            self::ES_CO => 'Spanish (Colombia)',
            self::ES_CL => 'Spanish (Chile)',
            self::ES_PE => 'Spanish (Peru)',
            self::ES_VE => 'Spanish (Venezuela)',
            self::SV => 'Swedish',
            self::SV_SE => 'Swedish (Sweden)',
            self::TH => 'Thai',
            self::TH_TH => 'Thai (Thailand)',
            self::TR => 'Turkish',
            self::TR_TR => 'Turkish (Turkey)',
            self::UK => 'Ukrainian',
            self::UK_UA => 'Ukrainian (Ukraine)',
            self::VI => 'Vietnamese',
            self::VI_VN => 'Vietnamese (Vietnam)',
        };
    }

    public function nativeName(): string
    {
        return match ($this) {
            self::AR, self::AR_SA, self::AR_EG, self::AR_AE => 'العربية',
            self::ZH, self::ZH_CN => '简体中文',
            self::ZH_TW, self::ZH_HK => '繁體中文',
            self::CS, self::CS_CZ => 'Čeština',
            self::DA, self::DA_DK => 'Dansk',
            self::NL, self::NL_NL, self::NL_BE => 'Nederlands',
            self::EN, self::EN_US, self::EN_GB, self::EN_AU, self::EN_CA,
            self::EN_NZ, self::EN_IE, self::EN_ZA, self::EN_IN => 'English',
            self::FI, self::FI_FI => 'Suomi',
            self::FR, self::FR_FR, self::FR_CA, self::FR_BE, self::FR_CH => 'Français',
            self::DE, self::DE_DE, self::DE_AT, self::DE_CH => 'Deutsch',
            self::EL, self::EL_GR => 'Ελληνικά',
            self::HE, self::HE_IL => 'עברית',
            self::HI, self::HI_IN => 'हिन्दी',
            self::HU, self::HU_HU => 'Magyar',
            self::ID, self::ID_ID => 'Bahasa Indonesia',
            self::IT, self::IT_IT, self::IT_CH => 'Italiano',
            self::JA, self::JA_JP => '日本語',
            self::KO, self::KO_KR => '한국어',
            self::MS, self::MS_MY => 'Bahasa Melayu',
            self::NO, self::NB, self::NB_NO => 'Norsk Bokmål',
            self::NN, self::NN_NO => 'Norsk Nynorsk',
            self::PL, self::PL_PL => 'Polski',
            self::PT, self::PT_BR, self::PT_PT => 'Português',
            self::RO, self::RO_RO => 'Română',
            self::RU, self::RU_RU => 'Русский',
            self::SK, self::SK_SK => 'Slovenčina',
            self::ES, self::ES_ES, self::ES_MX, self::ES_AR, self::ES_CO,
            self::ES_CL, self::ES_PE, self::ES_VE => 'Español',
            self::SV, self::SV_SE => 'Svenska',
            self::TH, self::TH_TH => 'ไทย',
            self::TR, self::TR_TR => 'Türkçe',
            self::UK, self::UK_UA => 'Українська',
            self::VI, self::VI_VN => 'Tiếng Việt',
        };
    }

    public function direction(): string
    {
        return match ($this) {
            self::AR, self::AR_SA, self::AR_EG, self::AR_AE,
            self::HE, self::HE_IL => 'rtl',
            default => 'ltr',
        };
    }

    public function isRightToLeft(): bool
    {
        return $this->direction() === 'rtl';
    }

    public function baseLanguage(): string
    {
        $value = $this->value;

        if (str_contains($value, '-')) {
            return explode('-', $value)[0];
        }

        return $value;
    }

    public function hasRegion(): bool
    {
        return str_contains($this->value, '-');
    }

    public function region(): ?string
    {
        if (!$this->hasRegion()) {
            return null;
        }

        return explode('-', $this->value)[1];
    }

    /**
     * @return array<string, string>
     */
    public static function toArray(): array
    {
        $result = [];

        foreach (self::cases() as $language) {
            $result[$language->value] = $language->value;
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayWithFullNames(): array
    {
        $result = [];

        foreach (self::cases() as $language) {
            $result[$language->value] = $language->fullName();
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayWithNativeNames(): array
    {
        $result = [];

        foreach (self::cases() as $language) {
            $result[$language->value] = $language->nativeName();
        }

        return $result;
    }
}
