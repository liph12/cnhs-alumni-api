<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\APIController;
use App\Http\Resources\MemberAPI\MemberResource;
use App\Services\MemberService;
use App\Http\Requests\MemberRequest;
use App\Http\Resources\MemberAPI\MemberResourceCollection;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

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

    public function authenticate()
    {
        $user = auth()->user();

        return $this->successResponse(['email' => $user->email, 'name' => $user->name], "User authenticated.");
    }

    public function createPlainTextToken($user)
    {
        $secretKey = 'secret_' . $user->email;
        $authToken = $user->createToken($secretKey)->plainTextToken;
        $user->remember_token = $authToken;

        return $authToken;
    }

    public function loginAttempt(UserRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        $credentials = ['email' => $user->email, 'password' => $request->password];

        if(!$user)
        {
            return $this->failResponse("Invalid credentials.");
        }

        if(!Hash::check($credentials['password'], $user->password))
        {
            return $this->failResponse("Invalid credentials.");
        }

        if(!$user->remember_token)
        {
            $authToken = $this->createPlainTextToken($user);
        }else{
            $authToken = $user->remember_token;
        }

        return $this->successResponse(['authToken' => $authToken, 'message' => 'User authorized.', 'user' => ['email' => $user->email, 'name' => $user->name]]);
    }

    public function signOut()
    {
        // to do
    }
}
