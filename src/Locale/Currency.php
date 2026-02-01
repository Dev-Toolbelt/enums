<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Locale;

enum Currency: string
{
    case AED = 'AED';
    case AFN = 'AFN';
    case ALL = 'ALL';
    case AMD = 'AMD';
    case ANG = 'ANG';
    case AOA = 'AOA';
    case ARS = 'ARS';
    case AUD = 'AUD';
    case AWG = 'AWG';
    case AZN = 'AZN';
    case BAM = 'BAM';
    case BBD = 'BBD';
    case BDT = 'BDT';
    case BGN = 'BGN';
    case BHD = 'BHD';
    case BIF = 'BIF';
    case BMD = 'BMD';
    case BND = 'BND';
    case BOB = 'BOB';
    case BRL = 'BRL';
    case BSD = 'BSD';
    case BTN = 'BTN';
    case BWP = 'BWP';
    case BYN = 'BYN';
    case BZD = 'BZD';
    case CAD = 'CAD';
    case CDF = 'CDF';
    case CHF = 'CHF';
    case CLP = 'CLP';
    case CNY = 'CNY';
    case COP = 'COP';
    case CRC = 'CRC';
    case CUP = 'CUP';
    case CVE = 'CVE';
    case CZK = 'CZK';
    case DJF = 'DJF';
    case DKK = 'DKK';
    case DOP = 'DOP';
    case DZD = 'DZD';
    case EGP = 'EGP';
    case ERN = 'ERN';
    case ETB = 'ETB';
    case EUR = 'EUR';
    case FJD = 'FJD';
    case FKP = 'FKP';
    case GBP = 'GBP';
    case GEL = 'GEL';
    case GHS = 'GHS';
    case GIP = 'GIP';
    case GMD = 'GMD';
    case GNF = 'GNF';
    case GTQ = 'GTQ';
    case GYD = 'GYD';
    case HKD = 'HKD';
    case HNL = 'HNL';
    case HRK = 'HRK';
    case HTG = 'HTG';
    case HUF = 'HUF';
    case IDR = 'IDR';
    case ILS = 'ILS';
    case INR = 'INR';
    case IQD = 'IQD';
    case IRR = 'IRR';
    case ISK = 'ISK';
    case JMD = 'JMD';
    case JOD = 'JOD';
    case JPY = 'JPY';
    case KES = 'KES';
    case KGS = 'KGS';
    case KHR = 'KHR';
    case KMF = 'KMF';
    case KPW = 'KPW';
    case KRW = 'KRW';
    case KWD = 'KWD';
    case KYD = 'KYD';
    case KZT = 'KZT';
    case LAK = 'LAK';
    case LBP = 'LBP';
    case LKR = 'LKR';
    case LRD = 'LRD';
    case LSL = 'LSL';
    case LYD = 'LYD';
    case MAD = 'MAD';
    case MDL = 'MDL';
    case MGA = 'MGA';
    case MKD = 'MKD';
    case MMK = 'MMK';
    case MNT = 'MNT';
    case MOP = 'MOP';
    case MRU = 'MRU';
    case MUR = 'MUR';
    case MVR = 'MVR';
    case MWK = 'MWK';
    case MXN = 'MXN';
    case MYR = 'MYR';
    case MZN = 'MZN';
    case NAD = 'NAD';
    case NGN = 'NGN';
    case NIO = 'NIO';
    case NOK = 'NOK';
    case NPR = 'NPR';
    case NZD = 'NZD';
    case OMR = 'OMR';
    case PAB = 'PAB';
    case PEN = 'PEN';
    case PGK = 'PGK';
    case PHP = 'PHP';
    case PKR = 'PKR';
    case PLN = 'PLN';
    case PYG = 'PYG';
    case QAR = 'QAR';
    case RON = 'RON';
    case RSD = 'RSD';
    case RUB = 'RUB';
    case RWF = 'RWF';
    case SAR = 'SAR';
    case SBD = 'SBD';
    case SCR = 'SCR';
    case SDG = 'SDG';
    case SEK = 'SEK';
    case SGD = 'SGD';
    case SHP = 'SHP';
    case SLE = 'SLE';
    case SOS = 'SOS';
    case SRD = 'SRD';
    case SSP = 'SSP';
    case STN = 'STN';
    case SVC = 'SVC';
    case SYP = 'SYP';
    case SZL = 'SZL';
    case THB = 'THB';
    case TJS = 'TJS';
    case TMT = 'TMT';
    case TND = 'TND';
    case TOP = 'TOP';
    case TRY = 'TRY';
    case TTD = 'TTD';
    case TWD = 'TWD';
    case TZS = 'TZS';
    case UAH = 'UAH';
    case UGX = 'UGX';
    case USD = 'USD';
    case UYU = 'UYU';
    case UZS = 'UZS';
    case VES = 'VES';
    case VND = 'VND';
    case VUV = 'VUV';
    case WST = 'WST';
    case XAF = 'XAF';
    case XCD = 'XCD';
    case XOF = 'XOF';
    case XPF = 'XPF';
    case YER = 'YER';
    case ZAR = 'ZAR';
    case ZMW = 'ZMW';
    case ZWL = 'ZWL';

    public function fullName(): string
    {
        return match ($this) {
            self::AED => 'United Arab Emirates Dirham',
            self::AFN => 'Afghan Afghani',
            self::ALL => 'Albanian Lek',
            self::AMD => 'Armenian Dram',
            self::ANG => 'Netherlands Antillean Guilder',
            self::AOA => 'Angolan Kwanza',
            self::ARS => 'Argentine Peso',
            self::AUD => 'Australian Dollar',
            self::AWG => 'Aruban Florin',
            self::AZN => 'Azerbaijani Manat',
            self::BAM => 'Bosnia-Herzegovina Convertible Mark',
            self::BBD => 'Barbadian Dollar',
            self::BDT => 'Bangladeshi Taka',
            self::BGN => 'Bulgarian Lev',
            self::BHD => 'Bahraini Dinar',
            self::BIF => 'Burundian Franc',
            self::BMD => 'Bermudan Dollar',
            self::BND => 'Brunei Dollar',
            self::BOB => 'Bolivian Boliviano',
            self::BRL => 'Brazilian Real',
            self::BSD => 'Bahamian Dollar',
            self::BTN => 'Bhutanese Ngultrum',
            self::BWP => 'Botswanan Pula',
            self::BYN => 'Belarusian Ruble',
            self::BZD => 'Belize Dollar',
            self::CAD => 'Canadian Dollar',
            self::CDF => 'Congolese Franc',
            self::CHF => 'Swiss Franc',
            self::CLP => 'Chilean Peso',
            self::CNY => 'Chinese Yuan',
            self::COP => 'Colombian Peso',
            self::CRC => 'Costa Rican Colón',
            self::CUP => 'Cuban Peso',
            self::CVE => 'Cape Verdean Escudo',
            self::CZK => 'Czech Koruna',
            self::DJF => 'Djiboutian Franc',
            self::DKK => 'Danish Krone',
            self::DOP => 'Dominican Peso',
            self::DZD => 'Algerian Dinar',
            self::EGP => 'Egyptian Pound',
            self::ERN => 'Eritrean Nakfa',
            self::ETB => 'Ethiopian Birr',
            self::EUR => 'Euro',
            self::FJD => 'Fijian Dollar',
            self::FKP => 'Falkland Islands Pound',
            self::GBP => 'British Pound',
            self::GEL => 'Georgian Lari',
            self::GHS => 'Ghanaian Cedi',
            self::GIP => 'Gibraltar Pound',
            self::GMD => 'Gambian Dalasi',
            self::GNF => 'Guinean Franc',
            self::GTQ => 'Guatemalan Quetzal',
            self::GYD => 'Guyanaese Dollar',
            self::HKD => 'Hong Kong Dollar',
            self::HNL => 'Honduran Lempira',
            self::HRK => 'Croatian Kuna',
            self::HTG => 'Haitian Gourde',
            self::HUF => 'Hungarian Forint',
            self::IDR => 'Indonesian Rupiah',
            self::ILS => 'Israeli New Shekel',
            self::INR => 'Indian Rupee',
            self::IQD => 'Iraqi Dinar',
            self::IRR => 'Iranian Rial',
            self::ISK => 'Icelandic Króna',
            self::JMD => 'Jamaican Dollar',
            self::JOD => 'Jordanian Dinar',
            self::JPY => 'Japanese Yen',
            self::KES => 'Kenyan Shilling',
            self::KGS => 'Kyrgystani Som',
            self::KHR => 'Cambodian Riel',
            self::KMF => 'Comorian Franc',
            self::KPW => 'North Korean Won',
            self::KRW => 'South Korean Won',
            self::KWD => 'Kuwaiti Dinar',
            self::KYD => 'Cayman Islands Dollar',
            self::KZT => 'Kazakhstani Tenge',
            self::LAK => 'Laotian Kip',
            self::LBP => 'Lebanese Pound',
            self::LKR => 'Sri Lankan Rupee',
            self::LRD => 'Liberian Dollar',
            self::LSL => 'Lesotho Loti',
            self::LYD => 'Libyan Dinar',
            self::MAD => 'Moroccan Dirham',
            self::MDL => 'Moldovan Leu',
            self::MGA => 'Malagasy Ariary',
            self::MKD => 'Macedonian Denar',
            self::MMK => 'Myanma Kyat',
            self::MNT => 'Mongolian Tugrik',
            self::MOP => 'Macanese Pataca',
            self::MRU => 'Mauritanian Ouguiya',
            self::MUR => 'Mauritian Rupee',
            self::MVR => 'Maldivian Rufiyaa',
            self::MWK => 'Malawian Kwacha',
            self::MXN => 'Mexican Peso',
            self::MYR => 'Malaysian Ringgit',
            self::MZN => 'Mozambican Metical',
            self::NAD => 'Namibian Dollar',
            self::NGN => 'Nigerian Naira',
            self::NIO => 'Nicaraguan Córdoba',
            self::NOK => 'Norwegian Krone',
            self::NPR => 'Nepalese Rupee',
            self::NZD => 'New Zealand Dollar',
            self::OMR => 'Omani Rial',
            self::PAB => 'Panamanian Balboa',
            self::PEN => 'Peruvian Sol',
            self::PGK => 'Papua New Guinean Kina',
            self::PHP => 'Philippine Peso',
            self::PKR => 'Pakistani Rupee',
            self::PLN => 'Polish Zloty',
            self::PYG => 'Paraguayan Guarani',
            self::QAR => 'Qatari Rial',
            self::RON => 'Romanian Leu',
            self::RSD => 'Serbian Dinar',
            self::RUB => 'Russian Ruble',
            self::RWF => 'Rwandan Franc',
            self::SAR => 'Saudi Riyal',
            self::SBD => 'Solomon Islands Dollar',
            self::SCR => 'Seychellois Rupee',
            self::SDG => 'Sudanese Pound',
            self::SEK => 'Swedish Krona',
            self::SGD => 'Singapore Dollar',
            self::SHP => 'Saint Helena Pound',
            self::SLE => 'Sierra Leonean Leone',
            self::SOS => 'Somali Shilling',
            self::SRD => 'Surinamese Dollar',
            self::SSP => 'South Sudanese Pound',
            self::STN => 'São Tomé and Príncipe Dobra',
            self::SVC => 'Salvadoran Colón',
            self::SYP => 'Syrian Pound',
            self::SZL => 'Swazi Lilangeni',
            self::THB => 'Thai Baht',
            self::TJS => 'Tajikistani Somoni',
            self::TMT => 'Turkmenistani Manat',
            self::TND => 'Tunisian Dinar',
            self::TOP => 'Tongan Paʻanga',
            self::TRY => 'Turkish Lira',
            self::TTD => 'Trinidad and Tobago Dollar',
            self::TWD => 'New Taiwan Dollar',
            self::TZS => 'Tanzanian Shilling',
            self::UAH => 'Ukrainian Hryvnia',
            self::UGX => 'Ugandan Shilling',
            self::USD => 'United States Dollar',
            self::UYU => 'Uruguayan Peso',
            self::UZS => 'Uzbekistan Som',
            self::VES => 'Venezuelan Bolívar',
            self::VND => 'Vietnamese Dong',
            self::VUV => 'Vanuatu Vatu',
            self::WST => 'Samoan Tala',
            self::XAF => 'CFA Franc BEAC',
            self::XCD => 'East Caribbean Dollar',
            self::XOF => 'CFA Franc BCEAO',
            self::XPF => 'CFP Franc',
            self::YER => 'Yemeni Rial',
            self::ZAR => 'South African Rand',
            self::ZMW => 'Zambian Kwacha',
            self::ZWL => 'Zimbabwean Dollar',
        };
    }

    public function symbol(): string
    {
        return match ($this) {
            self::AED => 'د.إ',
            self::AFN => '؋',
            self::ALL => 'L',
            self::AMD => '֏',
            self::ANG => 'ƒ',
            self::AOA => 'Kz',
            self::ARS => '$',
            self::AUD => 'A$',
            self::AWG => 'ƒ',
            self::AZN => '₼',
            self::BAM => 'KM',
            self::BBD => 'Bds$',
            self::BDT => '৳',
            self::BGN => 'лв',
            self::BHD => '.د.ب',
            self::BIF => 'FBu',
            self::BMD => '$',
            self::BND => 'B$',
            self::BOB => 'Bs.',
            self::BRL => 'R$',
            self::BSD => 'B$',
            self::BTN => 'Nu.',
            self::BWP => 'P',
            self::BYN => 'Br',
            self::BZD => 'BZ$',
            self::CAD => 'C$',
            self::CDF => 'FC',
            self::CHF => 'CHF',
            self::CLP => '$',
            self::CNY => '¥',
            self::COP => '$',
            self::CRC => '₡',
            self::CUP => '₱',
            self::CVE => '$',
            self::CZK => 'Kč',
            self::DJF => 'Fdj',
            self::DKK => 'kr',
            self::DOP => 'RD$',
            self::DZD => 'د.ج',
            self::EGP => 'E£',
            self::ERN => 'Nfk',
            self::ETB => 'Br',
            self::EUR => '€',
            self::FJD => 'FJ$',
            self::FKP => '£',
            self::GBP => '£',
            self::GEL => '₾',
            self::GHS => 'GH₵',
            self::GIP => '£',
            self::GMD => 'D',
            self::GNF => 'FG',
            self::GTQ => 'Q',
            self::GYD => 'G$',
            self::HKD => 'HK$',
            self::HNL => 'L',
            self::HRK => 'kn',
            self::HTG => 'G',
            self::HUF => 'Ft',
            self::IDR => 'Rp',
            self::ILS => '₪',
            self::INR => '₹',
            self::IQD => 'ع.د',
            self::IRR => '﷼',
            self::ISK => 'kr',
            self::JMD => 'J$',
            self::JOD => 'د.ا',
            self::JPY => '¥',
            self::KES => 'KSh',
            self::KGS => 'лв',
            self::KHR => '៛',
            self::KMF => 'CF',
            self::KPW => '₩',
            self::KRW => '₩',
            self::KWD => 'د.ك',
            self::KYD => 'CI$',
            self::KZT => '₸',
            self::LAK => '₭',
            self::LBP => 'ل.ل',
            self::LKR => 'Rs',
            self::LRD => 'L$',
            self::LSL => 'M',
            self::LYD => 'ل.د',
            self::MAD => 'د.م.',
            self::MDL => 'L',
            self::MGA => 'Ar',
            self::MKD => 'ден',
            self::MMK => 'K',
            self::MNT => '₮',
            self::MOP => 'MOP$',
            self::MRU => 'UM',
            self::MUR => '₨',
            self::MVR => 'Rf',
            self::MWK => 'MK',
            self::MXN => '$',
            self::MYR => 'RM',
            self::MZN => 'MT',
            self::NAD => 'N$',
            self::NGN => '₦',
            self::NIO => 'C$',
            self::NOK => 'kr',
            self::NPR => '₨',
            self::NZD => 'NZ$',
            self::OMR => 'ر.ع.',
            self::PAB => 'B/.',
            self::PEN => 'S/',
            self::PGK => 'K',
            self::PHP => '₱',
            self::PKR => '₨',
            self::PLN => 'zł',
            self::PYG => '₲',
            self::QAR => 'ر.ق',
            self::RON => 'lei',
            self::RSD => 'дин.',
            self::RUB => '₽',
            self::RWF => 'FRw',
            self::SAR => 'ر.س',
            self::SBD => 'SI$',
            self::SCR => '₨',
            self::SDG => 'ج.س.',
            self::SEK => 'kr',
            self::SGD => 'S$',
            self::SHP => '£',
            self::SLE => 'Le',
            self::SOS => 'S',
            self::SRD => '$',
            self::SSP => '£',
            self::STN => 'Db',
            self::SVC => '$',
            self::SYP => '£S',
            self::SZL => 'E',
            self::THB => '฿',
            self::TJS => 'SM',
            self::TMT => 'T',
            self::TND => 'د.ت',
            self::TOP => 'T$',
            self::TRY => '₺',
            self::TTD => 'TT$',
            self::TWD => 'NT$',
            self::TZS => 'TSh',
            self::UAH => '₴',
            self::UGX => 'USh',
            self::USD => '$',
            self::UYU => '$U',
            self::UZS => 'лв',
            self::VES => 'Bs.',
            self::VND => '₫',
            self::VUV => 'VT',
            self::WST => 'WS$',
            self::XAF => 'FCFA',
            self::XCD => 'EC$',
            self::XOF => 'CFA',
            self::XPF => '₣',
            self::YER => '﷼',
            self::ZAR => 'R',
            self::ZMW => 'ZK',
            self::ZWL => 'Z$',
        };
    }

    public function decimalPlaces(): int
    {
        return match ($this) {
            self::BHD, self::IQD, self::JOD, self::KWD, self::LYD, self::OMR, self::TND => 3,
            self::BIF, self::CLP, self::DJF, self::GNF, self::ISK, self::JPY, self::KMF,
            self::KRW, self::PYG, self::RWF, self::UGX, self::VND, self::VUV, self::XAF,
            self::XOF, self::XPF => 0,
            default => 2,
        };
    }

    /**
     * @return array<string, string>
     */
    public static function toArray(): array
    {
        $result = [];

        foreach (self::cases() as $currency) {
            $result[$currency->value] = $currency->value;
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayWithFullNames(): array
    {
        $result = [];

        foreach (self::cases() as $currency) {
            $result[$currency->value] = $currency->fullName();
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayWithSymbols(): array
    {
        $result = [];

        foreach (self::cases() as $currency) {
            $result[$currency->value] = $currency->symbol();
        }

        return $result;
    }
}
