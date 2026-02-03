<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit;

use DevToolbelt\Enums\Brazil\BrazilianBankCode;
use DevToolbelt\Enums\Brazil\BrazilianDocumentType;
use DevToolbelt\Enums\Brazil\BrazilianState;
use DevToolbelt\Enums\Calendar\DayOfWeek;
use DevToolbelt\Enums\Calendar\Month;
use DevToolbelt\Enums\Http\HttpMethod;
use DevToolbelt\Enums\Http\HttpStatusCode;
use DevToolbelt\Enums\Http\MimeType;
use DevToolbelt\Enums\Locale\Country;
use DevToolbelt\Enums\Locale\Currency;
use DevToolbelt\Enums\Locale\Language;
use DevToolbelt\Enums\Locale\Timezone;
use DevToolbelt\Enums\Measurement\Temperature;
use DevToolbelt\Enums\Personal\ContactType;
use DevToolbelt\Enums\Personal\Gender;
use DevToolbelt\Enums\Security\Algorithm;
use DevToolbelt\Enums\Tests\TestCase;

final class EnumInterfaceTest extends TestCase
{
    /**
     * @return array<string, array{class-string}>
     */
    public static function enumProvider(): array
    {
        return [
            'http_method' => [HttpMethod::class],
            'http_status_code' => [HttpStatusCode::class],
            'mime_type' => [MimeType::class],
            'algorithm' => [Algorithm::class],
            'temperature' => [Temperature::class],
            'language' => [Language::class],
            'timezone' => [Timezone::class],
            'currency' => [Currency::class],
            'country' => [Country::class],
            'day_of_week' => [DayOfWeek::class],
            'month' => [Month::class],
            'brazilian_bank_code' => [BrazilianBankCode::class],
            'brazilian_state' => [BrazilianState::class],
            'brazilian_document_type' => [BrazilianDocumentType::class],
            'gender' => [Gender::class],
            'contact_type' => [ContactType::class],
        ];
    }

    /**
     * @dataProvider enumProvider
     */
    public function testLabelListContainsAllLabels(string $enumClass): void
    {
        $cases = $enumClass::cases();

        $this->assertNotEmpty($cases);

        $firstCase = $cases[0];
        $labels = $firstCase->labelList();

        $this->assertCount(count($cases), $labels);
        $this->assertContains($firstCase->label(), $labels);
    }

    /**
     * @dataProvider enumProvider
     */
    public function testToArrayReturnsAllValues(string $enumClass): void
    {
        $cases = $enumClass::cases();

        $this->assertNotEmpty($cases);

        $firstCase = $cases[0];
        $array = $enumClass::toArray();

        $this->assertCount(count($cases), $array);
        $this->assertArrayHasKey($firstCase->value, $array);
        $this->assertSame($firstCase->value, $array[$firstCase->value]);
    }

    /**
     * @dataProvider enumProvider
     */
    public function testToArrayWithLabelsReturnsAllLabels(string $enumClass): void
    {
        $cases = $enumClass::cases();

        $this->assertNotEmpty($cases);

        $firstCase = $cases[0];
        $array = $enumClass::toArrayWithLabels();

        $this->assertCount(count($cases), $array);
        $this->assertArrayHasKey($firstCase->value, $array);
        $this->assertSame($firstCase->label(), $array[$firstCase->value]);
    }
}
