<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface LocationInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;
}