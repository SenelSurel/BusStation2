<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>BusStation | Login </title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/8769eb1509.js" crossorigin="anonymous"></script>
    @livewireStyles

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50 ">


<main class="p-2 mt-4 mb-12">
    <livewire:auth.login-account/>
</main>
<footer class="py-16 text-center text-sm text-white dark:text-white/70 bg-gray-800 w-full absolute bottom-0">
    <p>Bus Station ©2025 | All rights are reserved.</p>
</footer>
@livewireScripts

</body>
</html>
