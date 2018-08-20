<?php

namespace SpringCms\SpringAdmins\Events;

use SpringCms\SpringAdmins\Menu\Builder;

class BuildingMenu
{
    public $menu;

    public function __construct(Builder $menu)
    {
        $this->menu = $menu;
    }
}
