<?php

namespace App\Livewire;

use App\Services\CartManager;
use Livewire\Component;
use App\Models\Navigation as NavigationModel;

class Navigation extends Component
{
    public ?NavigationModel $navigation = null;
    public array $navigationItems = [];
    public array $navigationItemsSidebar = [];

    protected $listeners = [
        'cart.updated' => '$refresh'
    ];

    public function mount()
    {
        $this->navigation = NavigationModel::where('is_active', true)->first();

        if ($this->navigation) {
            $this->navigationItems = $this->navigation->items;
            $this->navigationItemsSidebar = $this->navigation->items_sidebar;
        }
    }

    public function render()
    {
        return view('livewire.navigation', [
            'cart' => app(CartManager::class)
        ]);
    }
}
