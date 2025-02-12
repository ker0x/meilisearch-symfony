<?php

declare(strict_types=1);

namespace Meilisearch\Bundle\Tests\Entity;

use Doctrine\ORM\Mapping as ORM;
use Meilisearch\Bundle\Searchable;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @ORM\Entity
 */
class SelfNormalizable implements NormalizableInterface
{
    /**
     * @ORM\Id
     *
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = []): array
    {
        if (Searchable::NORMALIZATION_FORMAT === $format) {
            return [
                'id' => $this->id,
                'name' => 'this test is correct',
                'self_normalized' => true,
            ];
        }

        return [];
    }
}
