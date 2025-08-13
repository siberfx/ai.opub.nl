<footer>
    <div class="container mx-auto px-6 pt-16 pb-8">
        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-10">
            <div>
                <a href="#" class="font-bold text-lg mb-4">{!! $settings['site_name']->value ?? 'Open Publicaties' !!}</a>
                <p class="text-gray-600 text-sm">{!! $settings['site_description']->value ?? 'Open Publicaties' !!}</p>
            </div>
            <div>
                <p class="font-semibold text-gray-900 mb-4">Data</p>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-600 hover:text-primary hover:underline">Datasets bekijken</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-primary hover:underline">API-toegang</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-primary hover:underline">Gegevenskwaliteit</a></li>
                </ul>
            </div>
            <div>
                <p class="font-semibold text-gray-900 mb-4">Hulpmiddelen</p>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-600 hover:text-primary hover:underline">Documentatie</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-primary hover:underline">Ondersteuning</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-primary hover:underline">Gebruiksvoorwaarden</a></li>
                </ul>
            </div>
            <div>
                <p class="font-semibold text-gray-900 mb-4">Contact</p>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-600 hover:text-primary hover:underline">Helpcentrum</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-primary hover:underline">Privacybeleid</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-primary hover:underline">Privacy</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-primary hover:underline">Toegankelijkheid</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-12 border-t border-gray-300 pt-6 text-center text-gray-500 text-sm">
            <p>&copy; 2025 Open Publicaties. Alle rechten voorbehouden.</p>
        </div>
    </div>
</footer>
