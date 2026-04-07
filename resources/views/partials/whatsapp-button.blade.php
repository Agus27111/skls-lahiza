<div class="fixed bottom-6 right-6 z-40 group" id="whatsapp-button">
    <!-- Floating Button -->
    <a href="https://wa.me/{{ config('app.whatsapp_phone') }}" target="_blank" rel="noopener noreferrer"

        class="flex items-center justify-center h-14 w-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-110 group-hover:-translate-y-2 no-print"
        title="Chat dengan kami di WhatsApp">
        <i data-lucide="message-circle" class="w-6 h-6"></i>
    </a>

    <!-- Pulse Animation Background -->
    <div class="absolute bottom-0 right-0 h-14 w-14 bg-green-500 rounded-full animate-pulse opacity-50 -z-10"></div>

    <!-- Tooltip -->
    <div
        class="absolute bottom-full right-0 mb-3 bg-gray-900 text-white text-sm rounded-lg px-3 py-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
        Hubungi kami
        <div class="absolute top-full right-4 border-4 border-transparent border-t-gray-900"></div>
    </div>
</div>

<style>
    /* Optional: Smooth fade-in animation when page loads */
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    #whatsapp-button {
        animation: slideInUp 0.5s ease-out;
    }

    /* Glow effect on hover */
    #whatsapp-button a:hover {
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.6);
    }
</style>
