<?php

namespace App\Http\Controllers;

use App\Filament\Pages\Settings;
use App\Models\SiteSetting;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function services()
    {
        $setting = SiteSetting::first();
        $socialLinks = SocialLink::active()->get();

        return view('services', compact('setting', 'socialLinks'));
    }

    public function faq()
    {
        $setting = SiteSetting::first();
        $socialLinks = SocialLink::active()->get();

        $faqs = [
            [
                'q' => 'Apakah bisa berangkat dari kota tujuan?',
                'a' => 'Bisa. Walaupun rute dibuat “Jakarta Utara - Malang”, kamu tetap bisa pilih berangkat dari Jakarta Utara atau dari Malang di halaman detail rute.',
            ],
            [
                'q' => 'Apa beda Reguler, Carter, dan Paket Kilat?',
                'a' => 'Reguler dihitung per orang, Carter dihitung per seat unit mobil (private), Paket Kilat untuk kirim barang dan dihitung seperti 1 orang sekali jalan.',
            ],
            [
                'q' => 'Apakah travel bisa PP (pulang-pergi)?',
                'a' => 'Bisa untuk Reguler dan Carter. Jika pilih PP, subtotal otomatis dikali 2. Paket Kilat hanya drop.',
            ],
            [
                'q' => 'Bagaimana sistem jam jemput?',
                'a' => 'Untuk Reguler, jam jemput mengikuti rute supir karena menjemput penumpang lain. Untuk Carter, kamu bisa request jam jemput/pulang.',
            ],
            [
                'q' => 'Bagaimana cara pembayaran?',
                'a' => 'Bisa cash ke driver, transfer bank, atau QRIS (tergantung yang aktif di website/admin).',
            ],
            [
                'q' => 'Apakah harga bisa berubah?',
                'a' => 'Estimasi harga dihitung otomatis dari website. Jika ada tambahan barang/permintaan khusus, biaya bisa menyesuaikan setelah konfirmasi WhatsApp admin.',
            ],
            [
                'q' => 'Bagaimana cara pembatalan atau ubah jadwal?',
                'a' => 'Hubungi admin via WhatsApp. Admin akan memproses pembatalan/perubahan sesuai ketentuan yang berlaku.',
            ],
            [
                'q' => 'Apakah dapat e-ticket?',
                'a' => 'Ya. Setelah booking, kamu akan mendapatkan link detail pesanan dan e-ticket QR untuk ditunjukkan saat penjemputan.',
            ],
        ];

        return view('faq', compact('setting', 'socialLinks', 'faqs'));
    }

    public function contact()
    {
        $setting = SiteSetting::first();
        $socialLinks = SocialLink::active()->get();

        return view('contact', compact('setting', 'socialLinks'));
    }
}
