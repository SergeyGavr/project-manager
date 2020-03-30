<?php

declare(strict_types=1);

namespace App\Model\User\Entity\User;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class NameType extends StringType
{
    public const NAME = 'cms_name';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof Name ? $value->getName() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return !empty($value) ? new Name($value) : null;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
