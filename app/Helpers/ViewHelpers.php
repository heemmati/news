<?php


namespace App\Helpers;


class ViewHelpers
{

    public $routes = array();

    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function second_routes_generator($name)
    {

       array_push($this->routes, $name);
    }

    public function get_input_name($value)
    {
        return $this->get_route_array($value);
    }

    protected function get_route_array($name, $i = 0)
    {

        if ($i >= count($this->routes)) {
            return $this->routes[$i] . "[0]['" . $name . "']";
        } else {
            if (!empty($this->routes[$i+1]) && isset($this->routes[$i+1])){
                return $this->routes[$i] . "[0][" . $this->get_route_array($name,  $i+1 ) . "]";
            }
            else{
                return $this->routes[$i] . "[0]['" . $name . "']";
            }

        }

    }


}
