<?php

namespace App\Services;

use App\Models\Member;

interface MemberServiceInterface
{
    public function createMember(array $data): Member | null;

    public function allActive(): Member | null;
}