<?php

namespace App\Services;

use App\Models\Member;
use App\Models\Address;
use App\Services\MemberServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class MemberService implements MemberServiceInterface
{
    public $member;
    public $address;

    public function __construct(Member $m, Address $a)
    {
        $this->member = $m;
        $this->address = $a;
    }

    public function createMember(array $data): Member | null
    {
        $address = $this->address->create($data);
        $data['address_id'] = $address->id;
        $data['status'] = 'active';

        return $this->member->create($data);
    } 

    public function allActive(): Collection
    {
        return $this->member->get();
    }
}