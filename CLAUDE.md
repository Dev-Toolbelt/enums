# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

PHP library providing type-safe enum classes for common use cases. Part of the `dev-toolbelt` package ecosystem. Requires PHP 8.1+.

## Commands

```bash
# Run all tests
composer test

# Run tests with coverage report (HTML output in tests/coverage/)
composer test:coverage

# Run a single test file
vendor/bin/phpunit --configuration tests/phpunit.xml tests/Unit/Security/AlgorithmTest.php

# Run a single test method
vendor/bin/phpunit --configuration tests/phpunit.xml --filter testHmacAlgorithmsAreSymmetric

# Check code style (PSR-12)
composer phpcs

# Fix code style
composer phpcs:fix

# Static analysis (level 6)
composer phpstan
```

## Architecture

The library provides PHP 8.1+ backed enums organized by context:

### Security (`DevToolbelt\Enums\Security`)
- **`Algorithm`** - JWT/cryptographic algorithm identifiers (HS256, RS256, ES256, etc.) with methods to check algorithm type (`isSymmetric()`, `isAsymmetric()`, `isRSA()`, `isECDSA()`)

### Brazil (`DevToolbelt\Enums\Brazil`)
- **`BrazilianState`** - Brazilian states with UF codes and full names
- **`BrazilianDocumentType`** - Brazilian document types (CPF, CNPJ, RG, etc.) with masks and validation info
- **`BrazilianBankCode`** - Brazilian bank codes with names and ISPB

### HTTP (`DevToolbelt\Enums\Http`)
- **`HttpMethod`** - HTTP methods (GET, POST, etc.) with `isSafe()`, `isIdempotent()`, `allowsBody()`
- **`HttpStatusCode`** - HTTP status codes with `reasonPhrase()`, `isSuccess()`, `isError()`, etc.
- **`MimeType`** - MIME types with `isImage()`, `isVideo()`, `isMedia()`, `extensions()`

### Locale (`DevToolbelt\Enums\Locale`)
- **`Country`** - Countries with ISO codes, `fullName()`, `alpha3()`
- **`Currency`** - Currencies with `fullName()`, `symbol()`, `decimalPlaces()`
- **`Language`** - Languages with `fullName()`, `nativeName()`, `direction()`, `isRightToLeft()`
- **`Timezone`** - All PHP-supported timezones with `toDateTimeZone()`, `getUtcOffset()`, `getUtcOffsetString()`

### Calendar (`DevToolbelt\Enums\Calendar`)
- **`Month`** - Months with `fullName()`, `fullNamePtBr()`, `daysCount()`, `quarter()`, `next()`, `previous()`
- **`DayOfWeek`** - Days with `fullName()`, `isWeekend()`, `isWeekday()`, `isoValue()`

### Personal (`DevToolbelt\Enums\Personal`)
- **`Gender`** - Gender options with `fullName()`, `pronoun()`, `isMale()`, `isFemale()`
- **`ContactType`** - Contact types with `fullName()`, `icon()`, `baseUrl()`, `buildUrl()`, `isPhone()`, `isSocialNetwork()`

### Measurement (`DevToolbelt\Enums\Measurement`)
- **`Temperature`** - Temperature units (Celsius, Fahrenheit, Kelvin, etc.) with `symbol()`, `convertTo()`, `isMetric()`, `isImperial()`, `format()`

## Code Style

- PSR-12 with 120 char line limit (140 absolute)
- `declare(strict_types=1)` required in all files
- Imports sorted by length
- Namespace: `DevToolbelt\Enums\{Context}` (e.g., `DevToolbelt\Enums\Brazil`)

## Testing

- Tests use `DevToolbelt\Enums\Tests\Unit\{Context}` namespace
- Base `TestCase` class handles Mockery cleanup
- Test files organized in `tests/Unit/{Context}/`
