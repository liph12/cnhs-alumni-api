<?php

namespace App\Services;

use App\Models\Member;
use App\Services\MemberServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class MemberService implements MemberServiceInterface
{
    public $member;

    public function __construct(Member $m)
    {
        $this->member = $m;
    }

    public function createMember(array $data): Member | null
    {
        DB::transaction(function() use($data){

            return $this->member->create($data);

        });

        return null;
    } 

    public function allActive(): Collection
    {
        return $this->member->active()->get();
    }
}