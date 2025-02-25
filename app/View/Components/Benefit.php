<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Benefit extends Component
{
    public array $benefits;

    public function __construct()
    {
        $this->benefits = [
            [
                'icon' => 'ticket',
                'title' => 'Tiket Mudah',
                'description' => 'Pesan tiket konser dengan cepat dan praktis.'
            ],
            [
                'icon' => 'secure',
                'title' => 'Aman',
                'description' => 'Pembayaran dijamin aman dan terpercaya.'
            ],
            [
                'icon' => 'discount',
                'title' => 'Harga Terbaik',
                'description' => 'Penawaran tiket dengan harga terbaik.'
            ],
            [
                'icon' => 'support',
                'title' => 'Bantuan 24/7',
                'description' => 'Layanan pelanggan siap membantu kapan saja.'
            ]
        ];
    }

    public function render()
    {
        return view('components.ui.why_us');
    }
}
