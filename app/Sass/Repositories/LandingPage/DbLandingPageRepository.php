<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 06/04/16
 */
namespace App\Sass\Repositories\LandingPage;

use App\LandingPage;
use App\Sass\Repositories\DbRepository;

/**
 * Class DbLandingPageRepository.
 */
class DbLandingPageRepository extends DbRepository implements LandingPageRepository
{
    /**
     * Return the active landing page.
     *
     * @return mixed
     */
    public function active()
    {
        return LandingPage::where('active', true)->first();
    }
}
