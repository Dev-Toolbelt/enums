<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Http;

use DevToolbelt\Enums\Http\HttpMethod;
use DevToolbelt\Enums\Tests\TestCase;

final class HttpMethodTest extends TestCase
{
    public function testAllMethodsHaveCorrectValues(): void
    {
        $this->assertEquals('GET', HttpMethod::GET->value);
        $this->assertEquals('POST', HttpMethod::POST->value);
        $this->assertEquals('PUT', HttpMethod::PUT->value);
        $this->assertEquals('PATCH', HttpMethod::PATCH->value);
        $this->assertEquals('DELETE', HttpMethod::DELETE->value);
        $this->assertEquals('HEAD', HttpMethod::HEAD->value);
        $this->assertEquals('OPTIONS', HttpMethod::OPTIONS->value);
        $this->assertEquals('CONNECT', HttpMethod::CONNECT->value);
        $this->assertEquals('TRACE', HttpMethod::TRACE->value);
    }

    public function testIsSafeReturnsTrueForSafeMethods(): void
    {
        $this->assertTrue(HttpMethod::GET->isSafe());
        $this->assertTrue(HttpMethod::HEAD->isSafe());
        $this->assertTrue(HttpMethod::OPTIONS->isSafe());
        $this->assertTrue(HttpMethod::TRACE->isSafe());
    }

    public function testIsSafeReturnsFalseForUnsafeMethods(): void
    {
        $this->assertFalse(HttpMethod::POST->isSafe());
        $this->assertFalse(HttpMethod::PUT->isSafe());
        $this->assertFalse(HttpMethod::PATCH->isSafe());
        $this->assertFalse(HttpMethod::DELETE->isSafe());
        $this->assertFalse(HttpMethod::CONNECT->isSafe());
    }

    public function testIsIdempotentReturnsTrueForIdempotentMethods(): void
    {
        $this->assertTrue(HttpMethod::GET->isIdempotent());
        $this->assertTrue(HttpMethod::HEAD->isIdempotent());
        $this->assertTrue(HttpMethod::PUT->isIdempotent());
        $this->assertTrue(HttpMethod::DELETE->isIdempotent());
        $this->assertTrue(HttpMethod::OPTIONS->isIdempotent());
        $this->assertTrue(HttpMethod::TRACE->isIdempotent());
    }

    public function testIsIdempotentReturnsFalseForNonIdempotentMethods(): void
    {
        $this->assertFalse(HttpMethod::POST->isIdempotent());
        $this->assertFalse(HttpMethod::PATCH->isIdempotent());
        $this->assertFalse(HttpMethod::CONNECT->isIdempotent());
    }

    public function testAllowsBodyReturnsTrueForMethodsThatAllowBody(): void
    {
        $this->assertTrue(HttpMethod::POST->allowsBody());
        $this->assertTrue(HttpMethod::PUT->allowsBody());
        $this->assertTrue(HttpMethod::PATCH->allowsBody());
        $this->assertTrue(HttpMethod::DELETE->allowsBody());
    }

    public function testAllowsBodyReturnsFalseForMethodsThatDoNotAllowBody(): void
    {
        $this->assertFalse(HttpMethod::GET->allowsBody());
        $this->assertFalse(HttpMethod::HEAD->allowsBody());
        $this->assertFalse(HttpMethod::OPTIONS->allowsBody());
        $this->assertFalse(HttpMethod::TRACE->allowsBody());
        $this->assertFalse(HttpMethod::CONNECT->allowsBody());
    }

    public function testToArrayReturnsAllMethods(): void
    {
        $array = HttpMethod::toArray();

        $this->assertCount(9, $array);
        $this->assertEquals('GET', $array['GET']);
        $this->assertEquals('POST', $array['POST']);
    }

    public function testCanBeCreatedFromString(): void
    {
        $method = HttpMethod::from('POST');

        $this->assertEquals(HttpMethod::POST, $method);
    }

    public function testTryFromReturnsNullForInvalidMethod(): void
    {
        $method = HttpMethod::tryFrom('INVALID');

        $this->assertNull($method);
    }
}
