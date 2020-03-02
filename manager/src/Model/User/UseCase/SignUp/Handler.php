<?php

declare(strict_types=1);

namespace App\Model\User\UseCase\SignUp;

use App\Model\User\Entity\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Ramsey\Uuid\Uuid;

class Handler
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Command $command
     * @throws Exception
     */
    public function handle(Command $command): void
    {
        $email = mb_strtolower($command->email);

        if ($this->em->getRepository(User::class)->findOneBy(['email' => $email])) {
            throw new \DomainException('User already exists.');
        }

        $user = new User(
            Uuid::uuid4()->toString(),
            new \DateTimeImmutable(),
            $email,
            password_hash($command->password, PASSWORD_ARGON2I)
        );

        $this->em->persist($user);
        $this->em->flush();
    }
}