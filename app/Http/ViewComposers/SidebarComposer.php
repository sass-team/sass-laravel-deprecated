<?php

namespace App\Http\ViewComposers;

use App\Sass\Repositories\User\UserRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\View;

class SidebarComposer
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var Guard
     */
    private $guard;

    public function __construct(UserRepository $userRepository, Guard $guard)
    {
        $this->userRepository = $userRepository;
        $this->guard = $guard;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = $this->guard->user();
        $currentUserHasTutorRole = false;

        if ($this->userRepository->hasTutorRole($user)) {
            $currentUserHasTutorRole = true;
        }

        $view->with('currentUserHasTutorRole', $currentUserHasTutorRole);
    }
}
