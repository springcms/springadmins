<?php

namespace SpringCms\SpringAdmins;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Container\Container;
use SpringCms\SpringAdmins\Menu\Builder;
use SpringCms\SpringAdmins\Events\BuildingMenu;

class SpringAdmins
{
    protected $menu;

    protected $filters;

    protected $events;

    protected $container;

    public function __construct(
        array $filters,
        Dispatcher $events,
        Container $container
    ) {
        $this->filters = $filters;
        $this->events = $events;
        $this->container = $container;
    }

    public function menu()
    {
        if (! $this->menu) {
            $this->menu = $this->buildMenu();
        }

        return $this->menu;
    }

    protected function buildMenu()
    {
        $builder = new Builder($this->buildFilters());

        $this->events->fire(new BuildingMenu($builder));

        return $builder->menu;
    }

    protected function buildFilters()
    {        
        return array_map([$this->container, 'make'], $this->filters);
    }

    protected function TestSing()
    {
        echo "Test Sinlegon";
    }
}
