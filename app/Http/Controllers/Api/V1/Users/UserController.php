<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Users;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Users\UserRequest;
use App\Services\Api\V1\Users\UserService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    public function __construct(protected UserService $service)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->service->index());
    }

    /**
     * @param  User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return response()->json($this->service->show($user));
    }

    /**
     * @param  UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        return response()->json($this->service->store($request), Response::HTTP_CREATED);
    }

    /**
     * @param  User $user
     * @param  UserRequest $request
     * @return JsonResponse
     */
    public function update(User $user, UserRequest $request): JsonResponse
    {
        return response()->json($this->service->update($user, $request), Response::HTTP_ACCEPTED);
    }

    /**
     * @param  User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        return response()->json($this->service->destroy($user));
    }
}
