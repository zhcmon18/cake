<?php

namespace App\View;

use BootstrapUI\View\UIViewTrait;
use Cake\View\View;

class AppBootView extends View
{
    use UIViewTrait;

    public function initialize()
    {
        $this->initializeUI();
    }
}