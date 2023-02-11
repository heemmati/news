<?php


namespace App\Traits;


trait Breadcrumb
{

    public function breadcrumb_generator($route)
    {
        $breadcrumbs = array();
        $breadcrumbs['links'][0] = [
            'route' => route('admin.panel'),
            'title' => __('site.dashboard')
        ];
        if ($route != 'comments.index') {
            $breadcrumbs['links'][1] = [
                'route' => null,
                'title' => $this->title_generator_via_route_name($route)
            ];
            $breadcrumbs['route'] = $this->routes_seperator($route);

        }


        return $breadcrumbs;
    }

    public function title_generator_via_route_name($route_name)
    {

        $routes = str_replace('.', '_', $route_name);
        $title = __('admin.' . $routes);
        return $title;

    }

    public function routes_seperator($route_name)
    {

        $routers = array();
        $routes = explode('.', $route_name);
        $routers['index']['name'] = $routes[0] . '_index';
        $routers['index']['route'] = $routes[0] . '.index';

        $routers['create']['name'] = $routes[0] . '_create';
        $routers['create']['route'] = $routes[0] . '.create';


        return $routers;


    }

}
