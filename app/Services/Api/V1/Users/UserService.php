<?php

declare(strict_types=1);

namespace App\Services\Api\V1\Users;

use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\Api\V1\Users\UserRequest;
use App\Http\Resources\Api\V1\Users\UserCollection;
use App\Http\Resources\Api\V1\Users\UserResource;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserService
{
    /**
     * @return UserCollection
     */
    public function index(): UserCollection
    {
        try {
            $users = QueryBuilder::for(User::class)
                ->allowedFilters(['name'])
                ->allowedSorts(['name'])
                ->paginate();

            return new UserCollection($users);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    /**
     * @param  User $user
     * @return array<string, mixed>
     */
    public function show(User $user): array
    {
        try {
            return [
                'message' => 'Success',
                'data' => UserResource::make($user)
            ];
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    /**
     * @param  UserRequest $request
     * @return array<string, mixed>
     */
    public function store(UserRequest $request): array
    {
        try {
            $user = User::query()->create($request->validated());

            return [
                'message' => 'Success',
                'data' => UserResource::make($user)
            ];
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    /**
     * @param  User $user
     * @param  UserRequest $request
     * @return array<string, mixed>
     */
    public function update(User $user, UserRequest $request): array
    {
        try {
            $user->update($request->validated());

            return [
                'message' => 'Success',
                'data' => UserResource::make($user)
            ];
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    /**
     * @param  User $user
     * @return array<string, mixed>
     */
    public function destroy(User $user): array
    {
        try {
            $user->delete();

            return [
                'message' => 'Success'
            ];
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
}
