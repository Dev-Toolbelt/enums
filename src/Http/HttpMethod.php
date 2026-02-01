<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Http;

use DevToolbelt\Enums\EnumInterface;

enum HttpMethod: string implements EnumInterface
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case PATCH = 'PATCH';
    case DELETE = 'DELETE';
    case HEAD = 'HEAD';
    case OPTIONS = 'OPTIONS';
    case CONNECT = 'CONNECT';
    case TRACE = 'TRACE';

    public function label(): string
    {
        return match ($this) {
            self::GET => 'GET - Retrieve a resource',
            self::POST => 'POST - Create a new resource',
            self::PUT => 'PUT - Update/Replace a resource',
            self::PATCH => 'PATCH - Partial update a resource',
            self::DELETE => 'DELETE - Remove a resource',
            self::HEAD => 'HEAD - Retrieve headers only',
            self::OPTIONS => 'OPTIONS - Describe communication options',
            self::CONNECT => 'CONNECT - Establish a tunnel',
            self::TRACE => 'TRACE - Perform a message loop-back test',
        };
    }

    public function isSafe(): bool
    {
        return in_array($this, [self::GET, self::HEAD, self::OPTIONS, self::TRACE], true);
    }

    public function isIdempotent(): bool
    {
        return in_array($this, [self::GET, self::HEAD, self::PUT, self::DELETE, self::OPTIONS, self::TRACE], true);
    }

    public function allowsBody(): bool
    {
        return in_array($this, [self::POST, self::PUT, self::PATCH, self::DELETE], true);
    }

    /**
     * @return string[]
     */
    public function labelList(): array
    {
        return array_map(fn (self $case) => $case->label(), self::cases());
    }

    /**
     * @return array<string, string>
     */
    public static function toArray(): array
    {
        $result = [];

        foreach (self::cases() as $method) {
            $result[$method->value] = $method->value;
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayWithLabels(): array
    {
        $result = [];

        foreach (self::cases() as $method) {
            $result[$method->value] = $method->label();
        }

        return $result;
    }
}
