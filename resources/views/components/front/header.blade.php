<header class="shadow-xs">
    <nav class="container mx-auto px-6 flex justify-between items-center py-4 h-20">
        <div class="flex gap-10">
            <div class="text-xl font-extrabold">
                <a href="#">{!! $settings['site_name']->value ?? 'Open Publicaties' !!}</a>
            </div>
            <div class="hidden lg:flex items-center space-x-6 font-medium">
                <div x-data="{ open: false }" @keydown.escape.window="open = false" class="relative">

                    <button @click="open = !open"
                            class="inline-flex items-center gap-1.5 hover:text-primary/70 transition-colors duration-100">
                        <span>Publicaties</span>
                        <i class="fa-solid fa-chevron-down text-xs transition-transform duration-300"
                           :class="open && 'rotate-180'"></i>
                    </button>

                    <div x-show="open"
                         x-cloak
                         @click.outside="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-56 bg-white rounded-lg shadow-xl border border-gray-100 z-10"
                         style="display: none;">

                        <div class="p-2 flex flex-col space-y-1">
                            {{-- Örnek alt menü linkleri --}}
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100 hover:text-primary">Thema's</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100 hover:text-primary">Dossiers</a>
                        </div>
                    </div>
                </div>
                <a href="#" class="hover:text-primary/70 transition-colors duration-100">Index</a>
                <a href="#" class="hover:text-primary/70 transition-colors duration-100">Kennisbank</a>
                <div x-data="{ open: false }" @keydown.escape.window="open = false" class="relative">

                    <button @click="open = !open"
                            class="inline-flex items-center gap-1.5 hover:text-primary/70 transition-colors duration-100">
                        <span>Over dit platform</span>
                        <i class="fa-solid fa-chevron-down text-xs transition-transform duration-300"
                           :class="open && 'rotate-180'"></i>
                    </button>

                    <div x-show="open"
                         x-cloak
                         @click.outside="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-56 bg-white rounded-lg shadow-xl border border-gray-100 z-10"
                         style="display: none;">

                        <div class="p-2 flex flex-col space-y-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100 hover:text-primary">Over ons</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100 hover:text-primary">Contact en service</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100 hover:text-primary">Missie en visie</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:flex items-center space-x-6">
            <div class="items-center font-medium">
                <a href="#" class="rounded-lg text-white font-normal mr-2"><i class="fa-regular fa-language text-primary text-2xl"></i></a>
                <a href="#" class="px-2 rounded-lg text-white font-normal mr-2"><i class="fa-regular fa-search text-primary text-xl"></i></a>
                <a href="#" class="py-2 rounded-lg text-white font-normal mr-2"><i class="fa-regular fa-user text-primary text-xl"></i></a>
                <a href="https://developer.opub.nl" target="_blank" class="ml-2 px-4 py-2 rounded-lg text-white font-normal bg-primary hover:bg-primary/90 transition-colors duration-300">Developer</a>
            </div>
        </div>
        <button class="lg:hidden" aria-label="Open Menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
        </button>
    </nav>
</header>
