<?php

namespace App\Controller\Public;

use App\Utils\View;

class Home extends Page
{

    /**
     * Method to return home view
     * @return string
     */
    public static function getHome($request)
    {
        return View::render('views/home', [
        ]);
    }
}