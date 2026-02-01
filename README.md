# Dev-Toolbelt Enums

[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.1-8892BF.svg)](https://php.net/)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%206-brightgreen.svg)](https://phpstan.org/)
[![Tests](https://img.shields.io/badge/tests-247%20passed-success.svg)](tests/)

A comprehensive PHP library providing **type-safe enum classes** for commonly used domains. Stop reinventing the wheel - use battle-tested, well-documented enums across all your PHP projects.

## Why Use This Library?

- **Framework Agnostic** - Works with Laravel, Symfony, Slim, CodeIgniter, or any PHP 8.1+ application
- **Type Safety** - Leverage PHP 8.1 native enums for compile-time type checking
- **Consistent API** - All enums follow the same patterns with `fullName()`, `toArray()`, and domain-specific helper methods
- **Internationalization Ready** - Brazilian Portuguese translations included via `fullNamePtBr()` methods
- **Well Tested** - 247 tests with 1,669 assertions ensuring reliability
- **Zero Dependencies** - No external packages required

## Requirements

- **PHP 8.1** or higher

## Installation

```bash
composer require dev-toolbelt/enums
```

## Available Enums

The library organizes enums into logical namespaces:

| Namespace | Enums | Description |
|-----------|-------|-------------|
| `Security` | Algorithm | JWT/cryptographic algorithms (HS256, RS256, ES256, etc.) |
| `Brazil` | BrazilianState, BrazilianDocumentType, BrazilianBankCode | Brazilian-specific data |
| `Http` | HttpMethod, HttpStatusCode, MimeType | HTTP protocol enums |
| `Locale` | Country, Currency, Language, Timezone | Internationalization |
| `Calendar` | Month, DayOfWeek | Date and time |
| `Personal` | Gender, ContactType | Personal information |
| `Measurement` | Temperature | Units of measurement |

## Usage Examples

### HTTP Status Codes

```php
use DevToolbelt\Enums\Http\HttpStatusCode;

$status = HttpStatusCode::NOT_FOUND;

echo $status->value;          // 404
echo $status->reasonPhrase(); // "Not Found"

// Category checks
$status->isClientError(); // true
$status->isServerError(); // false
$status->isError();       // true
$status->isSuccess();     // false
```

### HTTP Methods

```php
use DevToolbelt\Enums\Http\HttpMethod;

$method = HttpMethod::POST;

echo $method->value;       // "POST"
$method->isSafe();         // false (modifies resources)
$method->isIdempotent();   // false
$method->allowsBody();     // true
```

### Countries & Currencies

```php
use DevToolbelt\Enums\Locale\Country;
use DevToolbelt\Enums\Locale\Currency;

$country = Country::BR;
echo $country->fullName(); // "Brazil"
echo $country->alpha3();   // "BRA"

$currency = Currency::BRL;
echo $currency->fullName();     // "Brazilian Real"
echo $currency->symbol();       // "R$"
echo $currency->decimalPlaces(); // 2
```

### Languages

```php
use DevToolbelt\Enums\Locale\Language;

$lang = Language::PT_BR;

echo $lang->fullName();    // "Portuguese (Brazil)"
echo $lang->nativeName();  // "Português"
echo $lang->direction();   // "ltr"
echo $lang->baseLanguage(); // "pt"
echo $lang->region();      // "BR"

// Right-to-left detection
Language::AR->isRightToLeft(); // true
Language::EN->isRightToLeft(); // false
```

### Timezones

```php
use DevToolbelt\Enums\Locale\Timezone;

$tz = Timezone::AMERICA_SAO_PAULO;

echo $tz->value;              // "America/Sao_Paulo"
echo $tz->getUtcOffsetString(); // "-03:00"

// Convert to DateTimeZone
$dateTimeZone = $tz->toDateTimeZone();
```

### Brazilian States

```php
use DevToolbelt\Enums\Brazil\BrazilianState;

$state = BrazilianState::SP;

echo $state->value;    // "SP"
echo $state->fullName(); // "São Paulo"
echo $state->fullName(toUppercase: true); // "SÃO PAULO"

// Get all states as array
$states = BrazilianState::toArray(); // ['AC' => 'AC', 'AL' => 'AL', ...]
$statesWithNames = BrazilianState::toArrayWithFullNames(); // ['AC' => 'Acre', ...]
```

### Brazilian Documents

```php
use DevToolbelt\Enums\Brazil\BrazilianDocumentType;

$doc = BrazilianDocumentType::CPF;

echo $doc->fullName(); // "Cadastro de Pessoa Física"
echo $doc->mask();     // "###.###.###-##"
echo $doc->length();   // 11

// Document type checks
$doc->isPersonalDocument();     // true
$doc->isProfessionalDocument(); // false
$doc->isCertificate();          // false
```

### Brazilian Banks

```php
use DevToolbelt\Enums\Brazil\BrazilianBankCode;

$bank = BrazilianBankCode::NUBANK;

echo $bank->value;      // "260"
echo $bank->fullName(); // "Nu Pagamentos S.A. (Nubank)"
echo $bank->shortName(); // "Nubank"
echo $bank->ispb();     // "18236120"
```

### Month & Day of Week

```php
use DevToolbelt\Enums\Calendar\Month;
use DevToolbelt\Enums\Calendar\DayOfWeek;

$month = Month::FEBRUARY;
echo $month->fullName();      // "February"
echo $month->fullNamePtBr();  // "Fevereiro"
echo $month->shortName();     // "Feb"
echo $month->daysCount(2024); // 29 (leap year)
echo $month->quarter();       // 1
$month->next();               // Month::MARCH
$month->previous();           // Month::JANUARY

$day = DayOfWeek::SATURDAY;
echo $day->fullName();     // "Saturday"
echo $day->fullNamePtBr(); // "Sábado"
$day->isWeekend();         // true
$day->isWeekday();         // false
$day->isoValue();          // 6 (ISO-8601)

// Get collections
DayOfWeek::weekdays(); // [MONDAY, TUESDAY, WEDNESDAY, THURSDAY, FRIDAY]
DayOfWeek::weekend();  // [SATURDAY, SUNDAY]
```

### Gender & Contact Types

```php
use DevToolbelt\Enums\Personal\Gender;
use DevToolbelt\Enums\Personal\ContactType;

$gender = Gender::FEMALE;
echo $gender->fullName();     // "Female"
echo $gender->fullNamePtBr(); // "Feminino"
echo $gender->pronoun();      // "she/her"
echo $gender->pronounPtBr();  // "ela/dela"

$contact = ContactType::WHATSAPP;
echo $contact->fullName();  // "WhatsApp"
echo $contact->icon();      // "whatsapp"
echo $contact->baseUrl();   // "https://wa.me/"
echo $contact->buildUrl('+5511999998888'); // "https://wa.me/5511999998888"

$contact->isPhone();         // true
$contact->isMessenger();     // true
$contact->isSocialNetwork(); // false
```

### Temperature Conversion

```php
use DevToolbelt\Enums\Measurement\Temperature;

$temp = Temperature::CELSIUS;

echo $temp->symbol(); // "°C"

// Convert between units
$fahrenheit = $temp->convertTo(100, Temperature::FAHRENHEIT); // 212.0
$kelvin = $temp->convertTo(0, Temperature::KELVIN);           // 273.15

// Format output
echo $temp->format(25.5); // "25.50 °C"

// Reference points
$temp->freezingPointOfWater(); // 0.0
$temp->boilingPointOfWater();  // 100.0
$temp->absoluteZero();         // -273.15

// Unit classification
$temp->isMetric();   // true
$temp->isImperial(); // false
$temp->isAbsolute(); // false (Kelvin is absolute)
```

### MIME Types

```php
use DevToolbelt\Enums\Http\MimeType;

$mime = MimeType::APPLICATION_JSON;

echo $mime->value; // "application/json"

// Type checks
$mime->isApplication(); // true
$mime->isText();        // false
$mime->isImage();       // false
$mime->isMedia();       // false (images, audio, video)

// Get file extensions
MimeType::IMAGE_JPEG->extensions(); // ['jpg', 'jpeg']
MimeType::TEXT_HTML->extensions();  // ['html', 'htm']
```

### Cryptographic Algorithms

```php
use DevToolbelt\Enums\Security\Algorithm;

$algo = Algorithm::RS256;

echo $algo->value; // "RS256"

$algo->isSymmetric();  // false
$algo->isAsymmetric(); // true
$algo->isRSA();        // true
$algo->isECDSA();      // false
```

## Building Select Dropdowns

All enums provide `toArray()` methods perfect for HTML select elements:

```php
use DevToolbelt\Enums\Brazil\BrazilianState;

// For Blade/Twig templates
$states = BrazilianState::toArrayWithFullNames();

// Result: ['AC' => 'Acre', 'AL' => 'Alagoas', 'AM' => 'Amazonas', ...]
```

```html
<select name="state">
    @foreach($states as $uf => $name)
        <option value="{{ $uf }}">{{ $name }}</option>
    @endforeach
</select>
```

## Framework Integration

### Laravel

```php
// In a Form Request
use DevToolbelt\Enums\Brazil\BrazilianState;
use Illuminate\Validation\Rule;

public function rules(): array
{
    return [
        'state' => ['required', Rule::enum(BrazilianState::class)],
    ];
}

// In an Eloquent Model
use DevToolbelt\Enums\Http\HttpStatusCode;

protected $casts = [
    'status' => HttpStatusCode::class,
];
```

### Symfony

```php
// In a Doctrine Entity
use DevToolbelt\Enums\Locale\Currency;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Product
{
    #[ORM\Column(type: 'string', enumType: Currency::class)]
    private Currency $currency;
}
```

## Testing

```bash
# Run all tests
composer test

# Run with coverage
composer test:coverage

# Run specific test file
vendor/bin/phpunit --configuration tests/phpunit.xml tests/Unit/Http/HttpStatusCodeTest.php

# Static analysis
composer phpstan

# Code style check
composer phpcs

# Fix code style
composer phpcs:fix
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request. For major changes, please open an issue first to discuss what you would like to change.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

Please make sure to update tests as appropriate and follow PSR-12 coding standards.

## Security

If you discover any security-related issues, please email dersonsena@gmail.com instead of using the issue tracker.

## License

This library is open-sourced software licensed under the [MIT license](LICENSE).

## Credits

- [Kilderson Sena](https://github.com/dersonsena)
- [All Contributors](../../contributors)

---

Made with :heart: by [Dev-Toolbelt](https://github.com/Dev-Toolbelt)
