<?php

namespace SpringCms\SpringAdmins\Menu\Filters;

use SpringCms\SpringAdmins\Menu\Builder;

interface FilterInterface
{
    public function transform($item, Builder $builder);
}
