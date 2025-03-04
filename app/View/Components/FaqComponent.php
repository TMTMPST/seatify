<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FaqComponent extends Component
{
    public $faqs;

    public function __construct()
    {
        $this->faqs = [
            [
                'question' => 'Bagaimana cara membeli tiket konser?',
                'answer' => 'Anda bisa membeli tiket konser melalui website kami dengan memilih konser yang diinginkan dan mengikuti proses pembayaran.'
            ],
            [
                'question' => 'Metode pembayaran apa saja yang tersedia?',
                'answer' => 'Kami menerima pembayaran melalui transfer bank, kartu kredit, dan e-wallet seperti OVO dan GoPay.'
            ],
            [
                'question' => 'Apakah tiket bisa dikembalikan jika saya batal datang?',
                'answer' => 'Sayangnya, tiket yang sudah dibeli tidak dapat dikembalikan, tetapi Anda dapat mentransfernya ke orang lain.'
            ]
        ];
    }

    public function render()
    {
        return view('components.ui.faq');
    }
}
