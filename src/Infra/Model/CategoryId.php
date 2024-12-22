<?php

declare(strict_types=1);

namespace App\Infra\Model;

use App\Domain\Model\CategoryId as BaseId;
use Symfony\Component\Uid\Uuid;

final class CategoryId extends BaseId
{
    public function __construct(
        ?string $value = null,
    ) {
        parent::__construct($value ?? Uuid::v7()->toRfc4122());
    }
}
