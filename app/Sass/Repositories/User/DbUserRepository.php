<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  27/03/16
 */
namespace App\Sass\Repositories\User;

use App\Role;
use App\Sass\Repositories\DbRepository;
use App\User;

/**
 * Class DbUserRepository.
 */
class DbUserRepository extends DbRepository implements UserRepository
{
    /**
     * Check if given user has a role of tutor.
     *
     * @param User $user
     * @return mixed
     */
    public function hasTutorRole(User $user)
    {
        return $this->hasRole($user, Role::TUTOR_ROLE);
    }

    /**
     * @param User $user
     * @param      $requiredRole
     * @return bool
     */
    private function hasRole(User $user, $requiredRole)
    {
        foreach ($user->roles()->get() as $role) {
            if ($role->name === $requiredRole) {
                return true;
            }
        }

        return false;
    }

    /**
     * Assign the 'tutor' role to the given user.
     *
     * @param User $user
     * @return mixed
     */
    public function assignTutorRole(User $user)
    {
        $role = Role::where('name', Role::TUTOR_ROLE)->firstOrFail();

        return $this->assignRole($user, $role);
    }

    /**
     * @param User $user
     * @param      $role
     * @return User|bool
     */
    private function assignRole(User $user, $role)
    {
        $user->roles()->attach($role);

        return $user->save() ? $user : false;
    }

    /**
     * Check if given user has a role of admin.
     *
     * @param User $user
     * @return mixed
     */
    public function hasAdminRole(User $user)
    {
        return $this->hasRole($user, Role::ADMIN_ROLE);
    }

    /**
     * Assign the 'admin' role to the given user.
     *
     * @param User $user
     * @return mixed
     */
    public function assignAdminRole(User $user)
    {
        $role = Role::where('name', Role::ADMIN_ROLE)->firstOrFail();

        return $this->assignRole($user, $role);
    }
}
