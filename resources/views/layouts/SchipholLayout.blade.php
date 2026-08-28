<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Planning</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <header class="flex items-center gap-4 bg-[#FFCD00] px-6 py-3 m-0">
            <img src="{{ asset('images/departure.png') }}" alt="Logo" class="h-16 w-16 object-contain">
            <h1 class="text-2xl font-semibold text-black">Planning</h1>
            @php
                if (Route::currentRouteName() === 'home') {
                    $link = route('dashboard');
                    $linkText = 'Inloggen';
                } else {
                    $link = route('home');
                    $linkText = 'Home';
                }
            @endphp
            <div class="flex-1"></div> <!-- Spacer  -->
            <a href="{{ $link }}" class="ml-auto text-black hover:text-gray-700">{{ $linkText }}</a>
            <!-- Dark mode toggle button -->
            <button id="darkModeToggle" class="ml-4 text-black hover:text-gray-700">Toggle Dark Mode</button> <!-- Make icon -->
        </header>
        <div class="flex w-full items-center bg-gray-300 px-6 py-3">
            <h2 id="currentTime" class="text-black text-2xl">{{ now()->format('H:i') }}</h2>
            <div class="flex-1"></div> <!-- Spacer  -->
            <h2 id="currentDate" class="text-black text-2xl">{{ now()->format('d-m-Y') }}</h2>
        </div>
        <main>
            {{ $slot }}
        </main>
        <footer></footer>
        <script>
            const updateClock = () => {
                const currentDateTime = new Date();
                document.getElementById('currentTime').textContent = currentDateTime.toLocaleTimeString('nl-NL', {
                    hour: '2-digit',
                    minute: '2-digit',
                });
                document.getElementById('currentDate').textContent = currentDateTime.toLocaleDateString('nl-NL', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric',
                });
            };

            updateClock();
            setInterval(updateClock, 1000);
        </script>
    </body>
</html>