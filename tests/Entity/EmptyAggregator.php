<?php

declare(strict_types=1);

namespace Meilisearch\Bundle\Tests\Entity;

use Doctrine\ORM\Mapping as ORM;
use Meilisearch\Bundle\Entity\Aggregator;

/**
 * @ORM\Entity
 */
class EmptyAggregator extends Aggregator
{
}
