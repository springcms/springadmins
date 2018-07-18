<?php

namespace SpringCms\SpringAdmins\App\ViewComposers;

use Illuminate\View\View;
use SpringCms\SpringAdmins\SpringAdmins;

class SpringAdminsComposer
{
    /**
     * @var AdminLte
     */
    private $springadmins;

    public function __construct( SpringAdmins $springadmins) {
        $this->springadmins = $springadmins;
    }

    public function compose(View $view)
    {
        $view->with('springadmins', $this->springadmins);
    }
}
