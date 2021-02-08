<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModulesProvider extends ServiceProvider
{


    public function boot()
    {
        $pathList = explode('/', app('request')->getPathInfo());
        if(count($pathList) > 2) {
            $routeFile = APP_BASE_PATH . "/modules/" . ucfirst($pathList[2]) . "/routes.php";
            if (file_exists($routeFile)) {
                $this->loadRoutesFrom($routeFile);
                $this->loadViewsFrom(APP_BASE_PATH . "/views/" . $pathList[2], $pathList[2]);
            }
        }
    }
}
