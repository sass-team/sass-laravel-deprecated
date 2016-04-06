<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 06/04/16
 */
namespace App\Sass\Repositories\LandingPage;

/**
 * Interface LandingPageRepository.
 */
interface LandingPageRepository
{
    /**
     * Return the active landing page.
     *
     * @return mixed
     */
    public function active();
}