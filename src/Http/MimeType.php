<?php

declare(strict_types=1);

namespace DevToolbelt\Enums\Http;

enum MimeType: string
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
}
