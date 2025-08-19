<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\APIController;
use App\Http\Resources\MemberAPI\MemberResource;
use App\Services\MemberService;
use App\Http\Requests\MemberRequest;
use App\Http\Resources\MemberAPI\MemberResourceCollection;
use Illuminate\Http\Request;

class MemberController extends APIController
{
    public function __construct(protected MemberService $memberService) {}

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

    public function update($id, Request $request)
    {
        $member = $this->memberService->member->find($id);
        $member->status = $request->status;
        $member->paid_amount = $request->amount_paid;
        $member->sponsored_amount = $request->amount_sponsored;
        $member->save();

        return new MemberResource($member);
    }
}
