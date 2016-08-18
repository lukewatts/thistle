<?php
namespace Thistle\Controller;

use Thistle\Application;
use Thistle\Entity\User;

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
