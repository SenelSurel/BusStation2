<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8769eb1509.js" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<style>
    .body-bg {
        background: url({{asset('/frontend/images/backgroundImage.jpeg')}});
        background-size: cover !important;
        background-attachment: fixed;
        background-position: center;
    }
</style>
<body class="font-sans antialiased dark:text-white/50 flex flex-col min-h-screen !z-40 body-bg">
<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">


                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center text-white text-sm md:text-lg ml-8 md:ml-0">
                    <i class=" fa fa-bus"> Bus Station</i>
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="{{route('index')}}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Anasayfa</a>
                        <a href="{{route('contact')}}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">İletişim</a>
                        <a href="{{route('tickets')}}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Biletlerim</a>
                    </div>
                </div>
            </div>
            <div class="relative inline-block text-left">
                <div class="flex space-x-5">
                        <select id="currency" wire:change="$emit('currencyChanged', $event.target.value)" class="flex justify-center
                        align-middle border-1 border-white p-2 rounded-lg text-white">
                            <option value="try" class="text-black text-xs md:text-base">TRY</option>
                            <option value="usd" class="text-black text-xs md:text-base">USD</option>
                            <option value="eur" class="text-black text-xs md:text-base">EUR</option>
                            <option value="gbp" class="text-black text-xs md:text-base">GBP</option>
                        </select>
                    <button type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md text-white px-3 py-2 text-sm font-semibold ring-1 shadow-xs hover:bg-gray-500/20  ring-gray-300 ring-inset" id="menu-button" aria-expanded="false" aria-haspopup="true">
                        Hesap
                        <svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white ring-1 shadow-lg ring-black/5 focus:outline-hidden transform opacity-0 scale-95 transition-all duration-200 ease-in-out" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" id="dropdown-menu">
                    <div class="py-1" role="none">
                        <form method="POST" action="#" role="none">
                            @livewire('auth.logout')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sm:hidden hidden" id="mobile-menu">
        <div  class="space-y-1 px-2 pt-2 pb-3">
            <a href="{{route('index')}}" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Anasayfa</a>
            <a href="{{route('contact')}}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">İletişim</a>
            <a href="{{route('tickets')}}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Biletlerim</a>
        </div>
    </div>
</nav>
    <main class="flex-1">
        {{$slot}}
    </main>

<footer class="py-16 text-center text-sm text-white dark:text-white/70 bg-gray-800 w-full">

    <p>Bus Station ©2025 | All rights are reserved.</p>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector("[aria-controls='mobile-menu']");
        const mobileMenu = document.getElementById("mobile-menu");

        mobileMenuButton.addEventListener("click", function () {
            const expanded = this.getAttribute("aria-expanded") === "true";
            this.setAttribute("aria-expanded", !expanded);
            mobileMenu.classList.toggle("hidden");
        });
    });
</script>
{{--CURRENCY--}}
<script>
    let exchangeRates = {};
    const apiEndpoint = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/try.json';

    document.addEventListener("DOMContentLoaded", function () {
        fetch(apiEndpoint)
            .then(response => {
                if (!response.ok) throw new Error('API yanıtı başarısız');
                return response.json();
            })
            .then(data => {
                exchangeRates = data.try;
                console.log("Döviz Kurları:", exchangeRates);
                convertPrice('try');
            })
            .catch(error => console.error("Döviz kurları alınamadı:", error));
    });

    function convertPrice(currency) {

        const priceElements = document.querySelectorAll('[id^="ticket-price-"]');

        if (!priceElements.length) {
            console.error("Fiyat elementleri bulunamadı!");
            return;
        }

        priceElements.forEach(element => {
            const basePrice = parseFloat(element.dataset.price);
            if (isNaN(basePrice)) {
                console.error("Bilet fiyatı geçersiz:", element.id);
                return;
            }

            let convertedPrice = basePrice;
            let currencySymbol = "₺";

            if (exchangeRates && Object.keys(exchangeRates).length > 0) {
                switch(currency) {
                    case "try":
                        convertedPrice = basePrice;
                        currencySymbol = "₺";
                        break;
                    case "usd":
                        convertedPrice = basePrice * exchangeRates.usd;
                        currencySymbol = "$";
                        break;
                    case "eur":
                        convertedPrice = basePrice * exchangeRates.eur;
                        currencySymbol = "€";
                        break;
                    case "gbp":
                        convertedPrice = basePrice * exchangeRates.gbp;
                        currencySymbol = "£";
                        break;
                    default:
                        convertedPrice = basePrice;
                        currencySymbol = "₺";
                }
            }

            element.textContent = convertedPrice.toFixed(2);
            document.getElementById(`currency-symbol-${element.id.split('-')[2]}`).textContent = currencySymbol;
        });
    }

    document.getElementById('currency').addEventListener('change', (event) => {
        convertPrice(event.target.value);
    });
</script>




<script>
    const button = document.getElementById('menu-button');
    const dropdown = document.getElementById('dropdown-menu');

    button.addEventListener('click', () => {
        const isOpen = dropdown.classList.contains('opacity-100');

        if (isOpen) {
            dropdown.classList.remove('opacity-100', 'scale-100');
            dropdown.classList.add('opacity-0', 'scale-95');
            button.setAttribute('aria-expanded', 'false');
        } else {
            dropdown.classList.remove('opacity-0', 'scale-95');
            dropdown.classList.add('opacity-100', 'scale-100');
            button.setAttribute('aria-expanded', 'true');
        }
    });
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@if(session('redirect_code'))
    <script>
        window.location.href = "{{ route('code') }}";
    </script>
@endif
@livewireScripts
</body>
</html>
