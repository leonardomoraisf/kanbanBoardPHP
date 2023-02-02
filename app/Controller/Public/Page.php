<?php

namespace App\Controller\Public;

use App\Utils\View;

class Page
{
    public static function getLinks(){
        return View::render('views/includes/links', [
        ]);
    }

    public static function getScriptLinks(){
        return View::render('views/includes/scriptlinks', [
        ]);
    }

    public static function getElements(){
        return [
            "links" => self::getLinks(),
            "scriptlinks" => self::getScriptLinks(),
        ];
    }
}
