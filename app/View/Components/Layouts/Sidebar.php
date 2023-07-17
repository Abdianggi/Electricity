<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Sidebar extends Component
{
    private $item;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->item = [
            [
                'name' => 'Menu',
                'link' => null,
                'isActive' => null,
                'isEnabled' => true,
                'icon' => null,
                'children' => [
                    [
                        'name' => 'Dashboard',
                        'url' => route('dashboard'),
                        'isActive' => request()->routeIs('dashboard'),
                        'isEnabled' => true,
                        'icon' => 'bi bi-grid-fill',
                        'children' => []
                    ],
                    [
                        'name' => 'Data Master',
                        'url' => null,
                        'isActive' => false,
                        'isEnabled' => true,
                        'icon' => 'bi bi-stack',
                        'children' => [
                            [
                                'name' => 'Electricity Meters',
                                'url' => route('master.electricity_meter.index'),
                                'isActive' => request()->routeIs('master.electricity_meter.*'),
                                'isEnabled' => true,
                                'icon' => '',
                                'children' => []
                            ],
                            [
                                'name' => 'Products',
                                'url' => route('master.product.index'),
                                'isActive' => request()->routeIs('master.product.*'),
                                'isEnabled' => true,
                                'icon' => '',
                                'children' => []
                            ],
                        ]
                    ],
                    [
                        'name' => 'Transaction',
                        'url' => route('master.transaction.index'),
                        'isActive' => false,
                        'isEnabled' => true,
                        'icon' => 'bi bi-grid-fill',
                        'children' => []
                    ],
                ]
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.sidebar', [
            'sidebarItems' => $this->item
        ]);
    }
}
