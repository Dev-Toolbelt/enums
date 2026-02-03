<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Personal;

use DevToolbelt\Enums\Personal\ContactType;
use DevToolbelt\Enums\Tests\TestCase;

final class ContactTypeTest extends TestCase
{
    public function testAllContactTypesHaveCorrectValues(): void
    {
        $this->assertEquals('email', ContactType::EMAIL->value);
        $this->assertEquals('phone', ContactType::PHONE->value);
        $this->assertEquals('mobile', ContactType::MOBILE->value);
        $this->assertEquals('whatsapp', ContactType::WHATSAPP->value);
        $this->assertEquals('telegram', ContactType::TELEGRAM->value);
        $this->assertEquals('linkedin', ContactType::LINKEDIN->value);
        $this->assertEquals('instagram', ContactType::INSTAGRAM->value);
    }

    public function testFullNameReturnsCorrectNames(): void
    {
        $this->assertEquals('Email', ContactType::EMAIL->label());
        $this->assertEquals('Phone', ContactType::PHONE->label());
        $this->assertEquals('Mobile Phone', ContactType::MOBILE->label());
        $this->assertEquals('WhatsApp', ContactType::WHATSAPP->label());
        $this->assertEquals('LinkedIn', ContactType::LINKEDIN->label());
        $this->assertEquals('Instagram', ContactType::INSTAGRAM->label());
    }

    public function testFullNamePtBrReturnsCorrectNames(): void
    {
        $this->assertEquals('E-mail', ContactType::EMAIL->fullNamePtBr());
        $this->assertEquals('Telefone', ContactType::PHONE->fullNamePtBr());
        $this->assertEquals('Celular', ContactType::MOBILE->fullNamePtBr());
        $this->assertEquals('WhatsApp', ContactType::WHATSAPP->fullNamePtBr());
        $this->assertEquals('Site', ContactType::WEBSITE->fullNamePtBr());
        $this->assertEquals('Endereço', ContactType::ADDRESS->fullNamePtBr());
    }

    public function testIconReturnsCorrectIcons(): void
    {
        $this->assertEquals('envelope', ContactType::EMAIL->icon());
        $this->assertEquals('phone', ContactType::PHONE->icon());
        $this->assertEquals('mobile', ContactType::MOBILE->icon());
        $this->assertEquals('whatsapp', ContactType::WHATSAPP->icon());
        $this->assertEquals('linkedin', ContactType::LINKEDIN->icon());
        $this->assertEquals('instagram', ContactType::INSTAGRAM->icon());
        $this->assertEquals('map-marker', ContactType::ADDRESS->icon());
    }

    public function testBaseUrlReturnsCorrectUrls(): void
    {
        $this->assertEquals('mailto:', ContactType::EMAIL->baseUrl());
        $this->assertEquals('tel:', ContactType::PHONE->baseUrl());
        $this->assertEquals('tel:', ContactType::MOBILE->baseUrl());
        $this->assertEquals('https://wa.me/', ContactType::WHATSAPP->baseUrl());
        $this->assertEquals('https://t.me/', ContactType::TELEGRAM->baseUrl());
        $this->assertEquals('https://linkedin.com/in/', ContactType::LINKEDIN->baseUrl());
        $this->assertEquals('https://instagram.com/', ContactType::INSTAGRAM->baseUrl());
        $this->assertEquals('https://github.com/', ContactType::GITHUB->baseUrl());
        $this->assertNull(ContactType::ADDRESS->baseUrl());
    }

    public function testBuildUrlBuildsCorrectUrls(): void
    {
        $this->assertEquals('mailto:test@example.com', ContactType::EMAIL->buildUrl('test@example.com'));
        $this->assertEquals('tel:+5511999998888', ContactType::MOBILE->buildUrl('+5511999998888'));
        $this->assertEquals('https://wa.me/5511999998888', ContactType::WHATSAPP->buildUrl('+55 (11) 99999-8888'));
        $this->assertEquals('https://linkedin.com/in/johndoe', ContactType::LINKEDIN->buildUrl('johndoe'));
        $this->assertEquals('https://instagram.com/johndoe', ContactType::INSTAGRAM->buildUrl('johndoe'));
        $this->assertEquals('https://github.com/johndoe', ContactType::GITHUB->buildUrl('johndoe'));
    }

    public function testBuildUrlReturnsRawValueWhenNoBaseUrlExists(): void
    {
        $this->assertEquals('123 Main St', ContactType::ADDRESS->buildUrl('123 Main St'));
    }

    public function testIsPhoneReturnsTrueForPhoneTypes(): void
    {
        $this->assertTrue(ContactType::PHONE->isPhone());
        $this->assertTrue(ContactType::MOBILE->isPhone());
        $this->assertTrue(ContactType::WHATSAPP->isPhone());
        $this->assertTrue(ContactType::FAX->isPhone());
        $this->assertFalse(ContactType::EMAIL->isPhone());
        $this->assertFalse(ContactType::TELEGRAM->isPhone());
    }

    public function testIsSocialNetworkReturnsTrueForSocialNetworks(): void
    {
        $this->assertTrue(ContactType::LINKEDIN->isSocialNetwork());
        $this->assertTrue(ContactType::FACEBOOK->isSocialNetwork());
        $this->assertTrue(ContactType::INSTAGRAM->isSocialNetwork());
        $this->assertTrue(ContactType::TWITTER->isSocialNetwork());
        $this->assertTrue(ContactType::YOUTUBE->isSocialNetwork());
        $this->assertTrue(ContactType::TIKTOK->isSocialNetwork());
        $this->assertTrue(ContactType::GITHUB->isSocialNetwork());
        $this->assertFalse(ContactType::EMAIL->isSocialNetwork());
        $this->assertFalse(ContactType::WHATSAPP->isSocialNetwork());
    }

    public function testIsMessengerReturnsTrueForMessengers(): void
    {
        $this->assertTrue(ContactType::WHATSAPP->isMessenger());
        $this->assertTrue(ContactType::TELEGRAM->isMessenger());
        $this->assertTrue(ContactType::SKYPE->isMessenger());
        $this->assertFalse(ContactType::EMAIL->isMessenger());
        $this->assertFalse(ContactType::PHONE->isMessenger());
        $this->assertFalse(ContactType::INSTAGRAM->isMessenger());
    }

    public function testIsDigitalReturnsFalseOnlyForAddressAndFax(): void
    {
        $this->assertTrue(ContactType::EMAIL->isDigital());
        $this->assertTrue(ContactType::PHONE->isDigital());
        $this->assertTrue(ContactType::WHATSAPP->isDigital());
        $this->assertFalse(ContactType::ADDRESS->isDigital());
        $this->assertFalse(ContactType::FAX->isDigital());
    }

    public function testToArrayReturnsAllContactTypes(): void
    {
        $array = ContactType::toArray();

        $this->assertArrayHasKey('email', $array);
        $this->assertEquals('email', $array['email']);
        $this->assertArrayHasKey('whatsapp', $array);
        $this->assertEquals('whatsapp', $array['whatsapp']);
    }

    public function testToArrayWithLabelsReturnsAllContactTypesWithLabels(): void
    {
        $array = ContactType::toArrayWithLabels();

        $this->assertArrayHasKey('email', $array);
        $this->assertEquals('Email', $array['email']);
        $this->assertArrayHasKey('whatsapp', $array);
        $this->assertEquals('WhatsApp', $array['whatsapp']);
    }

    public function testToArrayPtBrReturnsAllContactTypesInPortuguese(): void
    {
        $array = ContactType::toArrayPtBr();

        $this->assertEquals('E-mail', $array['email']);
        $this->assertEquals('Celular', $array['mobile']);
    }

    public function testPhonesReturnsOnlyPhoneTypes(): void
    {
        $phones = ContactType::phones();

        foreach ($phones as $phone) {
            $this->assertTrue($phone->isPhone());
        }
    }

    public function testSocialNetworksReturnsOnlySocialNetworks(): void
    {
        $socialNetworks = ContactType::socialNetworks();

        foreach ($socialNetworks as $socialNetwork) {
            $this->assertTrue($socialNetwork->isSocialNetwork());
        }
    }

    public function testMessengersReturnsOnlyMessengers(): void
    {
        $messengers = ContactType::messengers();

        foreach ($messengers as $messenger) {
            $this->assertTrue($messenger->isMessenger());
        }
    }

    public function testCanBeCreatedFromString(): void
    {
        $contactType = ContactType::from('email');

        $this->assertEquals(ContactType::EMAIL, $contactType);
    }

    public function testTryFromReturnsNullForInvalidType(): void
    {
        $contactType = ContactType::tryFrom('invalid');

        $this->assertNull($contactType);
    }
}
