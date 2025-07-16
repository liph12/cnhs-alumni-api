<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\APIController;
use App\Http\Resources\MemberAPI\MemberResource;
use App\Services\MemberServiceInterface;
use App\Http\Requests\MemberRequest;
use App\Http\Resources\MemberAPI\MemberResourceCollection;

class MemberController extends APIController
{
    public function __construct(protected MemberServiceInterface $memberService) {}

    public function index()
    {
        $activeMembers = $this->memberService->allActive();

        return new MemberResourceCollection($activeMembers);
    }

    public function store(MemberRequest $request)
    {
        $member = $this->memberService->createMember($request->all());

        return new MemberResource($member);
    }
}
