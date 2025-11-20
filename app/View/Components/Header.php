<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Affiche le nom de l'utilisateur connecté dans le Header
     */
    public $username;

    public function __construct($username = null)
    {
        $this->username = $username;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }

    // Affiche le nom de l'utilisateur connecté dans le Header

    



}
