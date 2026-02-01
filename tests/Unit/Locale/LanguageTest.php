<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Locale;

use DevToolbelt\Enums\Locale\Language;
use DevToolbelt\Enums\Tests\TestCase;

final class LanguageTest extends TestCase
{
    public function testCommonLanguagesHaveCorrectValues(): void
    {
        $this->assertEquals('pt-BR', Language::PT_BR->value);
        $this->assertEquals('en-US', Language::EN_US->value);
        $this->assertEquals('es-ES', Language::ES_ES->value);
        $this->assertEquals('fr-FR', Language::FR_FR->value);
        $this->assertEquals('de-DE', Language::DE_DE->value);
        $this->assertEquals('ja-JP', Language::JA_JP->value);
    }

    public function testFullNameReturnsCorrectNames(): void
    {
        $this->assertEquals('Portuguese (Brazil)', Language::PT_BR->label());
        $this->assertEquals('English (United States)', Language::EN_US->label());
        $this->assertEquals('Spanish (Spain)', Language::ES_ES->label());
        $this->assertEquals('French (France)', Language::FR_FR->label());
        $this->assertEquals('German (Germany)', Language::DE_DE->label());
        $this->assertEquals('Japanese (Japan)', Language::JA_JP->label());
    }

    public function testNativeNameReturnsCorrectNativeNames(): void
    {
        $this->assertEquals('Português', Language::PT_BR->nativeName());
        $this->assertEquals('English', Language::EN_US->nativeName());
        $this->assertEquals('Español', Language::ES_ES->nativeName());
        $this->assertEquals('Français', Language::FR_FR->nativeName());
        $this->assertEquals('Deutsch', Language::DE_DE->nativeName());
        $this->assertEquals('日本語', Language::JA_JP->nativeName());
        $this->assertEquals('العربية', Language::AR_SA->nativeName());
        $this->assertEquals('简体中文', Language::ZH_CN->nativeName());
        $this->assertEquals('繁體中文', Language::ZH_TW->nativeName());
    }

    public function testDirectionReturnsCorrectDirection(): void
    {
        $this->assertEquals('ltr', Language::PT_BR->direction());
        $this->assertEquals('ltr', Language::EN_US->direction());
        $this->assertEquals('rtl', Language::AR_SA->direction());
        $this->assertEquals('rtl', Language::HE_IL->direction());
    }

    public function testIsRightToLeftReturnsTrueForRtlLanguages(): void
    {
        $this->assertTrue(Language::AR->isRightToLeft());
        $this->assertTrue(Language::AR_SA->isRightToLeft());
        $this->assertTrue(Language::AR_EG->isRightToLeft());
        $this->assertTrue(Language::HE->isRightToLeft());
        $this->assertTrue(Language::HE_IL->isRightToLeft());
    }

    public function testIsRightToLeftReturnsFalseForLtrLanguages(): void
    {
        $this->assertFalse(Language::PT_BR->isRightToLeft());
        $this->assertFalse(Language::EN_US->isRightToLeft());
        $this->assertFalse(Language::ZH_CN->isRightToLeft());
        $this->assertFalse(Language::JA_JP->isRightToLeft());
    }

    public function testBaseLanguageReturnsLanguageCode(): void
    {
        $this->assertEquals('pt', Language::PT_BR->baseLanguage());
        $this->assertEquals('en', Language::EN_US->baseLanguage());
        $this->assertEquals('es', Language::ES_MX->baseLanguage());
        $this->assertEquals('pt', Language::PT->baseLanguage());
    }

    public function testHasRegionReturnsTrueForRegionalLanguages(): void
    {
        $this->assertTrue(Language::PT_BR->hasRegion());
        $this->assertTrue(Language::EN_US->hasRegion());
        $this->assertTrue(Language::ES_ES->hasRegion());
    }

    public function testHasRegionReturnsFalseForBaseLanguages(): void
    {
        $this->assertFalse(Language::PT->hasRegion());
        $this->assertFalse(Language::EN->hasRegion());
        $this->assertFalse(Language::ES->hasRegion());
    }

    public function testRegionReturnsCorrectRegionCode(): void
    {
        $this->assertEquals('BR', Language::PT_BR->region());
        $this->assertEquals('US', Language::EN_US->region());
        $this->assertEquals('ES', Language::ES_ES->region());
        $this->assertEquals('MX', Language::ES_MX->region());
    }

    public function testRegionReturnsNullForBaseLanguages(): void
    {
        $this->assertNull(Language::PT->region());
        $this->assertNull(Language::EN->region());
        $this->assertNull(Language::ES->region());
    }

    public function testToArrayReturnsAllLanguages(): void
    {
        $array = Language::toArray();

        $this->assertArrayHasKey('pt-BR', $array);
        $this->assertEquals('pt-BR', $array['pt-BR']);
        $this->assertArrayHasKey('en-US', $array);
        $this->assertEquals('en-US', $array['en-US']);
    }

    public function testToArrayWithFullNamesReturnsLanguageNames(): void
    {
        $array = Language::toArrayWithLabels();

        $this->assertArrayHasKey('pt-BR', $array);
        $this->assertEquals('Portuguese (Brazil)', $array['pt-BR']);
        $this->assertArrayHasKey('en-US', $array);
        $this->assertEquals('English (United States)', $array['en-US']);
    }

    public function testToArrayWithNativeNamesReturnsNativeNames(): void
    {
        $array = Language::toArrayWithNativeNames();

        $this->assertArrayHasKey('pt-BR', $array);
        $this->assertEquals('Português', $array['pt-BR']);
        $this->assertArrayHasKey('ja-JP', $array);
        $this->assertEquals('日本語', $array['ja-JP']);
    }

    public function testCanBeCreatedFromString(): void
    {
        $language = Language::from('pt-BR');

        $this->assertEquals(Language::PT_BR, $language);
    }

    public function testTryFromReturnsNullForInvalidLanguage(): void
    {
        $language = Language::tryFrom('xx-XX');

        $this->assertNull($language);
    }

    public function testSpanishVariantsExist(): void
    {
        $this->assertEquals('Spanish (Mexico)', Language::ES_MX->label());
        $this->assertEquals('Spanish (Argentina)', Language::ES_AR->label());
        $this->assertEquals('Spanish (Colombia)', Language::ES_CO->label());
        $this->assertEquals('Spanish (Chile)', Language::ES_CL->label());
    }

    public function testEnglishVariantsExist(): void
    {
        $this->assertEquals('English (United Kingdom)', Language::EN_GB->label());
        $this->assertEquals('English (Australia)', Language::EN_AU->label());
        $this->assertEquals('English (Canada)', Language::EN_CA->label());
        $this->assertEquals('English (India)', Language::EN_IN->label());
    }
}
