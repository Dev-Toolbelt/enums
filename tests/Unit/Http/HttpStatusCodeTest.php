<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Http;

use DevToolbelt\Enums\Http\HttpStatusCode;
use DevToolbelt\Enums\Tests\TestCase;

final class HttpStatusCodeTest extends TestCase
{
    public function testCommonStatusCodesHaveCorrectValues(): void
    {
        $this->assertEquals(200, HttpStatusCode::OK->value);
        $this->assertEquals(201, HttpStatusCode::CREATED->value);
        $this->assertEquals(204, HttpStatusCode::NO_CONTENT->value);
        $this->assertEquals(400, HttpStatusCode::BAD_REQUEST->value);
        $this->assertEquals(401, HttpStatusCode::UNAUTHORIZED->value);
        $this->assertEquals(403, HttpStatusCode::FORBIDDEN->value);
        $this->assertEquals(404, HttpStatusCode::NOT_FOUND->value);
        $this->assertEquals(422, HttpStatusCode::UNPROCESSABLE_ENTITY->value);
        $this->assertEquals(500, HttpStatusCode::INTERNAL_SERVER_ERROR->value);
    }

    public function testReasonPhraseReturnsCorrectPhrase(): void
    {
        $this->assertEquals('OK', HttpStatusCode::OK->reasonPhrase());
        $this->assertEquals('Created', HttpStatusCode::CREATED->reasonPhrase());
        $this->assertEquals('Bad Request', HttpStatusCode::BAD_REQUEST->reasonPhrase());
        $this->assertEquals('Not Found', HttpStatusCode::NOT_FOUND->reasonPhrase());
        $this->assertEquals('Internal Server Error', HttpStatusCode::INTERNAL_SERVER_ERROR->reasonPhrase());
        $this->assertEquals("I'm a teapot", HttpStatusCode::IM_A_TEAPOT->reasonPhrase());
    }

    public function testIsInformationalReturnsTrueFor1xxCodes(): void
    {
        $this->assertTrue(HttpStatusCode::CONTINUE->isInformational());
        $this->assertTrue(HttpStatusCode::SWITCHING_PROTOCOLS->isInformational());
        $this->assertTrue(HttpStatusCode::PROCESSING->isInformational());
    }

    public function testIsInformationalReturnsFalseForNon1xxCodes(): void
    {
        $this->assertFalse(HttpStatusCode::OK->isInformational());
        $this->assertFalse(HttpStatusCode::NOT_FOUND->isInformational());
    }

    public function testIsSuccessReturnsTrueFor2xxCodes(): void
    {
        $this->assertTrue(HttpStatusCode::OK->isSuccess());
        $this->assertTrue(HttpStatusCode::CREATED->isSuccess());
        $this->assertTrue(HttpStatusCode::ACCEPTED->isSuccess());
        $this->assertTrue(HttpStatusCode::NO_CONTENT->isSuccess());
    }

    public function testIsSuccessReturnsFalseForNon2xxCodes(): void
    {
        $this->assertFalse(HttpStatusCode::CONTINUE->isSuccess());
        $this->assertFalse(HttpStatusCode::MOVED_PERMANENTLY->isSuccess());
        $this->assertFalse(HttpStatusCode::BAD_REQUEST->isSuccess());
        $this->assertFalse(HttpStatusCode::INTERNAL_SERVER_ERROR->isSuccess());
    }

    public function testIsRedirectionReturnsTrueFor3xxCodes(): void
    {
        $this->assertTrue(HttpStatusCode::MOVED_PERMANENTLY->isRedirection());
        $this->assertTrue(HttpStatusCode::FOUND->isRedirection());
        $this->assertTrue(HttpStatusCode::TEMPORARY_REDIRECT->isRedirection());
        $this->assertTrue(HttpStatusCode::PERMANENT_REDIRECT->isRedirection());
    }

    public function testIsRedirectionReturnsFalseForNon3xxCodes(): void
    {
        $this->assertFalse(HttpStatusCode::OK->isRedirection());
        $this->assertFalse(HttpStatusCode::NOT_FOUND->isRedirection());
    }

    public function testIsClientErrorReturnsTrueFor4xxCodes(): void
    {
        $this->assertTrue(HttpStatusCode::BAD_REQUEST->isClientError());
        $this->assertTrue(HttpStatusCode::UNAUTHORIZED->isClientError());
        $this->assertTrue(HttpStatusCode::FORBIDDEN->isClientError());
        $this->assertTrue(HttpStatusCode::NOT_FOUND->isClientError());
        $this->assertTrue(HttpStatusCode::UNPROCESSABLE_ENTITY->isClientError());
    }

    public function testIsClientErrorReturnsFalseForNon4xxCodes(): void
    {
        $this->assertFalse(HttpStatusCode::OK->isClientError());
        $this->assertFalse(HttpStatusCode::INTERNAL_SERVER_ERROR->isClientError());
    }

    public function testIsServerErrorReturnsTrueFor5xxCodes(): void
    {
        $this->assertTrue(HttpStatusCode::INTERNAL_SERVER_ERROR->isServerError());
        $this->assertTrue(HttpStatusCode::NOT_IMPLEMENTED->isServerError());
        $this->assertTrue(HttpStatusCode::BAD_GATEWAY->isServerError());
        $this->assertTrue(HttpStatusCode::SERVICE_UNAVAILABLE->isServerError());
    }

    public function testIsServerErrorReturnsFalseForNon5xxCodes(): void
    {
        $this->assertFalse(HttpStatusCode::OK->isServerError());
        $this->assertFalse(HttpStatusCode::NOT_FOUND->isServerError());
    }

    public function testIsErrorReturnsTrueFor4xxAnd5xxCodes(): void
    {
        $this->assertTrue(HttpStatusCode::BAD_REQUEST->isError());
        $this->assertTrue(HttpStatusCode::NOT_FOUND->isError());
        $this->assertTrue(HttpStatusCode::INTERNAL_SERVER_ERROR->isError());
    }

    public function testIsErrorReturnsFalseForNonErrorCodes(): void
    {
        $this->assertFalse(HttpStatusCode::OK->isError());
        $this->assertFalse(HttpStatusCode::CREATED->isError());
        $this->assertFalse(HttpStatusCode::MOVED_PERMANENTLY->isError());
    }

    public function testCanBeCreatedFromInteger(): void
    {
        $status = HttpStatusCode::from(404);

        $this->assertEquals(HttpStatusCode::NOT_FOUND, $status);
    }

    public function testTryFromReturnsNullForInvalidCode(): void
    {
        $status = HttpStatusCode::tryFrom(999);

        $this->assertNull($status);
    }
}
