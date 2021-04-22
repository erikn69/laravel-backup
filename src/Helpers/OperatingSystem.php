<?php

namespace Spatie\Backup\Helpers;

class OperatingSystem
{
    public const WINDOWS = 'windows';
    public const DARWIN = 'darwin';
    public const LINUX = 'linux';

    private static function get(): string
    {
        return match (strtoupper(substr(PHP_OS_FAMILY, 0, 3))) {
            'WIN' => self::WINDOWS,
            'DAR' => self::DARWIN,
            'LIN' => self::LINUX,
            'default' => 'unknown',
        };
    }

    public static function supportsSigInt(): bool
    {
        return self::get() !== self::WINDOWS &&
            self::get() !== self::LINUX;
    }
}
