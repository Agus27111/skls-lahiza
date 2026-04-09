<?php

namespace Database\Seeders;

use App\Models\PpdbPaymentSetting;
use Illuminate\Database\Seeder;

class PpdbPaymentSettingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        PpdbPaymentSetting::updateOrCreate(
            ['is_active' => true],
            [
                'registration_fee' => 250000,
                'bank_name' => null,
                'account_number' => null,
                'account_holder_name' => null,
                'payment_notes' => 'Silakan transfer sesuai nominal pendaftaran dan konfirmasi ke admin setelah pembayaran dilakukan.',
                'is_active' => true,
            ],
        );
    }
}
