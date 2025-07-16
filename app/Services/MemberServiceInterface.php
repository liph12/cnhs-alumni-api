<?php

namespace App\Services;

use App\Models\Member;
use Illuminate\Database\Eloquent\Collection;

interface MemberServiceInterface
{
    public function createMember(array $data): Member | null;

    public function allActive(): Collection;
}