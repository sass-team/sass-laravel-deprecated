<?php

namespace App\Http\Controllers;

use App\Sass\Repositories\LandingPage\LandingPageRepository;

class LandingPagesController extends Controller
{
    /**
     * @var LandingPageRepository
     */
    private $landingPageRepository;

    public function __construct(LandingPageRepository $landingPageRepository)
    {
        $this->landingPageRepository = $landingPageRepository;
    }

    public function getActive()
    {
        $landingPage = $this->landingPageRepository->active();

        return view('welcome', compact('landingPage'));
    }
}
