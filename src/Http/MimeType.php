<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Http;

use DevToolbelt\Enums\EnumInterface;

enum MimeType: string implements EnumInterface
{
    // Application
    case APPLICATION_JSON = 'application/json';
    case APPLICATION_XML = 'application/xml';
    case APPLICATION_PDF = 'application/pdf';
    case APPLICATION_ZIP = 'application/zip';
    case APPLICATION_GZIP = 'application/gzip';
    case APPLICATION_OCTET_STREAM = 'application/octet-stream';
    case APPLICATION_FORM_URLENCODED = 'application/x-www-form-urlencoded';
    case APPLICATION_JAVASCRIPT = 'application/javascript';
    case APPLICATION_LD_JSON = 'application/ld+json';
    case APPLICATION_MSWORD = 'application/msword';
    case APPLICATION_DOCX = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
    case APPLICATION_XLS = 'application/vnd.ms-excel';
    case APPLICATION_XLSX = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
    case APPLICATION_PPT = 'application/vnd.ms-powerpoint';
    case APPLICATION_PPTX = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';
    case APPLICATION_RAR = 'application/vnd.rar';
    case APPLICATION_7Z = 'application/x-7z-compressed';
    case APPLICATION_TAR = 'application/x-tar';

    // Text
    case TEXT_PLAIN = 'text/plain';
    case TEXT_HTML = 'text/html';
    case TEXT_CSS = 'text/css';
    case TEXT_CSV = 'text/csv';
    case TEXT_JAVASCRIPT = 'text/javascript';
    case TEXT_XML = 'text/xml';
    case TEXT_MARKDOWN = 'text/markdown';
    case TEXT_CALENDAR = 'text/calendar';

    // Image
    case IMAGE_PNG = 'image/png';
    case IMAGE_JPEG = 'image/jpeg';
    case IMAGE_GIF = 'image/gif';
    case IMAGE_WEBP = 'image/webp';
    case IMAGE_SVG = 'image/svg+xml';
    case IMAGE_ICO = 'image/x-icon';
    case IMAGE_BMP = 'image/bmp';
    case IMAGE_TIFF = 'image/tiff';
    case IMAGE_AVIF = 'image/avif';

    // Audio
    case AUDIO_MPEG = 'audio/mpeg';
    case AUDIO_WAV = 'audio/wav';
    case AUDIO_OGG = 'audio/ogg';
    case AUDIO_WEBM = 'audio/webm';
    case AUDIO_AAC = 'audio/aac';
    case AUDIO_FLAC = 'audio/flac';
    case AUDIO_MIDI = 'audio/midi';

    // Video
    case VIDEO_MP4 = 'video/mp4';
    case VIDEO_WEBM = 'video/webm';
    case VIDEO_OGG = 'video/ogg';
    case VIDEO_AVI = 'video/x-msvideo';
    case VIDEO_MPEG = 'video/mpeg';
    case VIDEO_QUICKTIME = 'video/quicktime';

    // Font
    case FONT_WOFF = 'font/woff';
    case FONT_WOFF2 = 'font/woff2';
    case FONT_TTF = 'font/ttf';
    case FONT_OTF = 'font/otf';

    // Multipart
    case MULTIPART_FORM_DATA = 'multipart/form-data';
    case MULTIPART_BYTERANGES = 'multipart/byteranges';

    public function isApplication(): bool
    {
        return str_starts_with($this->value, 'application/');
    }

    public function isText(): bool
    {
        return str_starts_with($this->value, 'text/');
    }

    public function isImage(): bool
    {
        return str_starts_with($this->value, 'image/');
    }

    public function isAudio(): bool
    {
        return str_starts_with($this->value, 'audio/');
    }

    public function isVideo(): bool
    {
        return str_starts_with($this->value, 'video/');
    }

    public function isFont(): bool
    {
        return str_starts_with($this->value, 'font/');
    }

    public function isMultipart(): bool
    {
        return str_starts_with($this->value, 'multipart/');
    }

    public function isMedia(): bool
    {
        return $this->isImage() || $this->isAudio() || $this->isVideo();
    }

    /**
     * @return string[]
     */
    public function extensions(): array
    {
        return match ($this) {
            self::APPLICATION_JSON => ['json'],
            self::APPLICATION_XML, self::TEXT_XML => ['xml'],
            self::APPLICATION_PDF => ['pdf'],
            self::APPLICATION_ZIP => ['zip'],
            self::APPLICATION_GZIP => ['gz', 'gzip'],
            self::APPLICATION_JAVASCRIPT, self::TEXT_JAVASCRIPT => ['js', 'mjs'],
            self::APPLICATION_LD_JSON => ['jsonld'],
            self::APPLICATION_MSWORD => ['doc'],
            self::APPLICATION_DOCX => ['docx'],
            self::APPLICATION_XLS => ['xls'],
            self::APPLICATION_XLSX => ['xlsx'],
            self::APPLICATION_PPT => ['ppt'],
            self::APPLICATION_PPTX => ['pptx'],
            self::APPLICATION_RAR => ['rar'],
            self::APPLICATION_7Z => ['7z'],
            self::APPLICATION_TAR => ['tar'],
            self::TEXT_PLAIN => ['txt'],
            self::TEXT_HTML => ['html', 'htm'],
            self::TEXT_CSS => ['css'],
            self::TEXT_CSV => ['csv'],
            self::TEXT_MARKDOWN => ['md', 'markdown'],
            self::TEXT_CALENDAR => ['ics'],
            self::IMAGE_PNG => ['png'],
            self::IMAGE_JPEG => ['jpg', 'jpeg'],
            self::IMAGE_GIF => ['gif'],
            self::IMAGE_WEBP => ['webp'],
            self::IMAGE_SVG => ['svg'],
            self::IMAGE_ICO => ['ico'],
            self::IMAGE_BMP => ['bmp'],
            self::IMAGE_TIFF => ['tif', 'tiff'],
            self::IMAGE_AVIF => ['avif'],
            self::AUDIO_MPEG => ['mp3'],
            self::AUDIO_WAV => ['wav'],
            self::AUDIO_OGG => ['ogg', 'oga'],
            self::AUDIO_WEBM => ['weba'],
            self::AUDIO_AAC => ['aac'],
            self::AUDIO_FLAC => ['flac'],
            self::AUDIO_MIDI => ['mid', 'midi'],
            self::VIDEO_MP4 => ['mp4'],
            self::VIDEO_WEBM => ['webm'],
            self::VIDEO_OGG => ['ogv'],
            self::VIDEO_AVI => ['avi'],
            self::VIDEO_MPEG => ['mpeg', 'mpg'],
            self::VIDEO_QUICKTIME => ['mov', 'qt'],
            self::FONT_WOFF => ['woff'],
            self::FONT_WOFF2 => ['woff2'],
            self::FONT_TTF => ['ttf'],
            self::FONT_OTF => ['otf'],
            default => [],
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::APPLICATION_JSON => 'JSON',
            self::APPLICATION_XML => 'XML',
            self::APPLICATION_PDF => 'PDF Document',
            self::APPLICATION_ZIP => 'ZIP Archive',
            self::APPLICATION_GZIP => 'GZIP Archive',
            self::APPLICATION_OCTET_STREAM => 'Binary Data',
            self::APPLICATION_FORM_URLENCODED => 'URL Encoded Form',
            self::APPLICATION_JAVASCRIPT => 'JavaScript',
            self::APPLICATION_LD_JSON => 'JSON-LD',
            self::APPLICATION_MSWORD => 'Microsoft Word',
            self::APPLICATION_DOCX => 'Microsoft Word (DOCX)',
            self::APPLICATION_XLS => 'Microsoft Excel',
            self::APPLICATION_XLSX => 'Microsoft Excel (XLSX)',
            self::APPLICATION_PPT => 'Microsoft PowerPoint',
            self::APPLICATION_PPTX => 'Microsoft PowerPoint (PPTX)',
            self::APPLICATION_RAR => 'RAR Archive',
            self::APPLICATION_7Z => '7-Zip Archive',
            self::APPLICATION_TAR => 'TAR Archive',
            self::TEXT_PLAIN => 'Plain Text',
            self::TEXT_HTML => 'HTML',
            self::TEXT_CSS => 'CSS',
            self::TEXT_CSV => 'CSV',
            self::TEXT_JAVASCRIPT => 'JavaScript',
            self::TEXT_XML => 'XML',
            self::TEXT_MARKDOWN => 'Markdown',
            self::TEXT_CALENDAR => 'iCalendar',
            self::IMAGE_PNG => 'PNG Image',
            self::IMAGE_JPEG => 'JPEG Image',
            self::IMAGE_GIF => 'GIF Image',
            self::IMAGE_WEBP => 'WebP Image',
            self::IMAGE_SVG => 'SVG Image',
            self::IMAGE_ICO => 'ICO Icon',
            self::IMAGE_BMP => 'BMP Image',
            self::IMAGE_TIFF => 'TIFF Image',
            self::IMAGE_AVIF => 'AVIF Image',
            self::AUDIO_MPEG => 'MP3 Audio',
            self::AUDIO_WAV => 'WAV Audio',
            self::AUDIO_OGG => 'OGG Audio',
            self::AUDIO_WEBM => 'WebM Audio',
            self::AUDIO_AAC => 'AAC Audio',
            self::AUDIO_FLAC => 'FLAC Audio',
            self::AUDIO_MIDI => 'MIDI Audio',
            self::VIDEO_MP4 => 'MP4 Video',
            self::VIDEO_WEBM => 'WebM Video',
            self::VIDEO_OGG => 'OGG Video',
            self::VIDEO_AVI => 'AVI Video',
            self::VIDEO_MPEG => 'MPEG Video',
            self::VIDEO_QUICKTIME => 'QuickTime Video',
            self::FONT_WOFF => 'WOFF Font',
            self::FONT_WOFF2 => 'WOFF2 Font',
            self::FONT_TTF => 'TrueType Font',
            self::FONT_OTF => 'OpenType Font',
            self::MULTIPART_FORM_DATA => 'Multipart Form Data',
            self::MULTIPART_BYTERANGES => 'Multipart Byte Ranges',
        };
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

        foreach (self::cases() as $mimeType) {
            $result[$mimeType->value] = $mimeType->value;
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    public static function toArrayWithLabels(): array
    {
        $result = [];

        foreach (self::cases() as $mimeType) {
            $result[$mimeType->value] = $mimeType->label();
        }

        return $result;
    }
}
