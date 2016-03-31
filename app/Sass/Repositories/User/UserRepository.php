<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  31/03/16
 */
namespace App\Sass\Repositories\User;

use App\User;

/**
 * Interface UserRepository.
 */
interface UserRepository
{
    /**
     * Check if given user has a role of tutor.
     *
     * @param User $user
     * @return mixed
     */
    public function hasTutorRole(User $user);

    /**
     * Assign the 'tutor' role to the given user.
     *
     * @param User $user
     * @return mixed
     */
    public function assignTutorRole(User $user);
}
