<?php
namespace Thistle\App\Controller;

use Silex\Application;
use Thistle\App\Entity\User;

/**
 * ------------------------------------------------------------
 * Class Page
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */
class Page extends BaseController
{
    /**
     * ------------------------------------------------------------
     * Home Page
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.1
     *
     * @param Application $app
     * @return mixed
     */
    public function home(Application $app)
    {
        return view('home');
    }
}
