<?php


namespace App\Model\User\Entity\User;

use phpDocumentor\Reflection\Types\Self_;
use Webmozart\Assert\Assert;

class CsmName
{
    private const CSM_1 = 'CSM_1_NAME';
    private const CSM_2 = 'CSM_2_NAME';
    private const CSM_3 = 'CSM_3_NAME';
    private const CSM_4 = 'CSM_4_NAME';

    private $name;

    public function __construct(string $name)
    {
        Assert::oneOf($name, [
            self::CSM_1,
            self::CSM_2,
            self::CSM_3,
            self::CSM_4,
        ]);
    }

    public static function csm1(): self
    {
        return new self(self::CSM_1);
    }

    public static function csm2(): self
    {
        return new self(self::CSM_2);
    }

    public function isEqual(self $name): bool
    {
        return $this->getName() === $name->getName();
    }

    public function getName(): string
    {
        return $this->name;
    }
}