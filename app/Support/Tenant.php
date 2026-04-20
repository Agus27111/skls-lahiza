<?php

namespace App\Support;

final class Tenant
{
    private static ?int $schoolId = null;

    public static function setSchoolId(?int $schoolId): void
    {
        static::$schoolId = $schoolId;
    }

    public static function schoolId(): ?int
    {
        return static::$schoolId;
    }

    public static function forget(): void
    {
        static::$schoolId = null;
    }
}

