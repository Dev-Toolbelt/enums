<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Tests\Unit\Http;

use DevToolbelt\Enums\Http\MimeType;
use DevToolbelt\Enums\Tests\TestCase;

final class MimeTypeTest extends TestCase
{
    public function testCommonMimeTypesHaveCorrectValues(): void
    {
        $this->assertEquals('application/json', MimeType::APPLICATION_JSON->value);
        $this->assertEquals('application/pdf', MimeType::APPLICATION_PDF->value);
        $this->assertEquals('text/html', MimeType::TEXT_HTML->value);
        $this->assertEquals('text/plain', MimeType::TEXT_PLAIN->value);
        $this->assertEquals('image/png', MimeType::IMAGE_PNG->value);
        $this->assertEquals('image/jpeg', MimeType::IMAGE_JPEG->value);
    }

    public function testIsApplicationReturnsTrueForApplicationTypes(): void
    {
        $this->assertTrue(MimeType::APPLICATION_JSON->isApplication());
        $this->assertTrue(MimeType::APPLICATION_PDF->isApplication());
        $this->assertTrue(MimeType::APPLICATION_XML->isApplication());
    }

    public function testIsApplicationReturnsFalseForNonApplicationTypes(): void
    {
        $this->assertFalse(MimeType::TEXT_HTML->isApplication());
        $this->assertFalse(MimeType::IMAGE_PNG->isApplication());
    }

    public function testIsTextReturnsTrueForTextTypes(): void
    {
        $this->assertTrue(MimeType::TEXT_PLAIN->isText());
        $this->assertTrue(MimeType::TEXT_HTML->isText());
        $this->assertTrue(MimeType::TEXT_CSS->isText());
        $this->assertTrue(MimeType::TEXT_CSV->isText());
    }

    public function testIsTextReturnsFalseForNonTextTypes(): void
    {
        $this->assertFalse(MimeType::APPLICATION_JSON->isText());
        $this->assertFalse(MimeType::IMAGE_PNG->isText());
    }

    public function testIsImageReturnsTrueForImageTypes(): void
    {
        $this->assertTrue(MimeType::IMAGE_PNG->isImage());
        $this->assertTrue(MimeType::IMAGE_JPEG->isImage());
        $this->assertTrue(MimeType::IMAGE_GIF->isImage());
        $this->assertTrue(MimeType::IMAGE_WEBP->isImage());
        $this->assertTrue(MimeType::IMAGE_SVG->isImage());
    }

    public function testIsImageReturnsFalseForNonImageTypes(): void
    {
        $this->assertFalse(MimeType::APPLICATION_JSON->isImage());
        $this->assertFalse(MimeType::VIDEO_MP4->isImage());
    }

    public function testIsAudioReturnsTrueForAudioTypes(): void
    {
        $this->assertTrue(MimeType::AUDIO_MPEG->isAudio());
        $this->assertTrue(MimeType::AUDIO_WAV->isAudio());
        $this->assertTrue(MimeType::AUDIO_OGG->isAudio());
    }

    public function testIsAudioReturnsFalseForNonAudioTypes(): void
    {
        $this->assertFalse(MimeType::VIDEO_MP4->isAudio());
        $this->assertFalse(MimeType::IMAGE_PNG->isAudio());
    }

    public function testIsVideoReturnsTrueForVideoTypes(): void
    {
        $this->assertTrue(MimeType::VIDEO_MP4->isVideo());
        $this->assertTrue(MimeType::VIDEO_WEBM->isVideo());
        $this->assertTrue(MimeType::VIDEO_OGG->isVideo());
    }

    public function testIsVideoReturnsFalseForNonVideoTypes(): void
    {
        $this->assertFalse(MimeType::AUDIO_MPEG->isVideo());
        $this->assertFalse(MimeType::IMAGE_PNG->isVideo());
    }

    public function testIsFontReturnsTrueForFontTypes(): void
    {
        $this->assertTrue(MimeType::FONT_WOFF->isFont());
        $this->assertTrue(MimeType::FONT_WOFF2->isFont());
        $this->assertTrue(MimeType::FONT_TTF->isFont());
        $this->assertTrue(MimeType::FONT_OTF->isFont());
    }

    public function testIsFontReturnsFalseForNonFontTypes(): void
    {
        $this->assertFalse(MimeType::APPLICATION_JSON->isFont());
        $this->assertFalse(MimeType::IMAGE_PNG->isFont());
    }

    public function testIsMultipartReturnsTrueForMultipartTypes(): void
    {
        $this->assertTrue(MimeType::MULTIPART_FORM_DATA->isMultipart());
        $this->assertTrue(MimeType::MULTIPART_BYTERANGES->isMultipart());
    }

    public function testIsMultipartReturnsFalseForNonMultipartTypes(): void
    {
        $this->assertFalse(MimeType::APPLICATION_JSON->isMultipart());
    }

    public function testIsMediaReturnsTrueForMediaTypes(): void
    {
        $this->assertTrue(MimeType::IMAGE_PNG->isMedia());
        $this->assertTrue(MimeType::AUDIO_MPEG->isMedia());
        $this->assertTrue(MimeType::VIDEO_MP4->isMedia());
    }

    public function testIsMediaReturnsFalseForNonMediaTypes(): void
    {
        $this->assertFalse(MimeType::APPLICATION_JSON->isMedia());
        $this->assertFalse(MimeType::TEXT_HTML->isMedia());
        $this->assertFalse(MimeType::FONT_WOFF->isMedia());
    }

    public function testExtensionsReturnsCorrectExtensions(): void
    {
        $this->assertEquals(['json'], MimeType::APPLICATION_JSON->extensions());
        $this->assertEquals(['pdf'], MimeType::APPLICATION_PDF->extensions());
        $this->assertEquals(['html', 'htm'], MimeType::TEXT_HTML->extensions());
        $this->assertEquals(['jpg', 'jpeg'], MimeType::IMAGE_JPEG->extensions());
        $this->assertEquals(['png'], MimeType::IMAGE_PNG->extensions());
        $this->assertEquals(['mp4'], MimeType::VIDEO_MP4->extensions());
        $this->assertEquals(['mp3'], MimeType::AUDIO_MPEG->extensions());
    }

    public function testCanBeCreatedFromString(): void
    {
        $mimeType = MimeType::from('application/json');

        $this->assertEquals(MimeType::APPLICATION_JSON, $mimeType);
    }

    public function testTryFromReturnsNullForInvalidMimeType(): void
    {
        $mimeType = MimeType::tryFrom('invalid/type');

        $this->assertNull($mimeType);
    }
}
