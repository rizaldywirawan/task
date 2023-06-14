<?php

namespace App\Actions\User;

use App\Models\User;
use Exception;

class DeleteUser
{
    /**
     * Delete the user
     *
     * @param User $user
     * @return User
     * @throws Exception
     */
    public function handle(User $user): User
    {
        $deletedUser = $user;

        $isDeleted = $user->delete();

        if ($isDeleted) {
            return $deletedUser;
        }

        throw new Exception('Something wen\'t wrong, call the administrator');

    }
}
