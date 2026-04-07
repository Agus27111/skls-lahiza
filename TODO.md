# WhatsApp Centralization & User Management TODO

## Status: In Progress

1. [x] Update `config/app.php` - Add `whatsapp_phone` config from env('WA_PHONE_NUMBER')
2. [x] Create migration `add_whatsapp_number_to_users_table.php` 
3. [x] Update `app/Models/User.php` - Add `whatsapp_number` to fillable
4. [x] Edit `resources/views/partials/whatsapp-button.blade.php` - Use config('app.whatsapp_phone')
5. [x] Edit `resources/views/welcome.blade.php` - Replace hardcoded ADMIN_WA with config
6. [x] Create Filament UserResource (`app/Filament/Resources/UserResource.php` + Pages/Schemas/Tables)
7. [x] Execute `php artisan migrate`
8. [x] Test WhatsApp links & Filament user editing
9. [x] [COMPLETED] Update TODO.md as done

**Instructions for user:**
- Add `WA_PHONE_NUMBER=6285716528671` to `.env`
- After migration, edit first user in Filament to set whatsapp_number (overrides env)
- Run `php artisan config:cache` in production
