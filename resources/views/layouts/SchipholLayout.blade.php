<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Planning</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            schiphol: {
                                dark: '#0F172A',
                                slate: '#1E293B',
                                gold: '#FFCD00',
                            },
                        },
                    },
                },
            };
        </script>
    </head>
    <body class="min-h-full bg-white text-black transition-colors duration-200 dark:bg-schiphol-dark dark:text-white">
        <header class="flex items-center gap-4 bg-[#FFCD00] px-6 py-3 m-0 transition-colors duration-200 dark:bg-black" id="header">
            <img src="{{ asset('images/departure.png') }}" alt="Logo" class="h-16 w-16 object-contain">
            <h1 class="text-2xl font-semibold text-black dark:text-[#FFCD00]" id="title">Planning</h1>
            @php
                if (Route::currentRouteName() === 'home') {
                    $link = route('dashboard');
                    $linkText = 'Inloggen';
                } else {
                    $link = route('home');
                    $linkText = 'Home';
                }
            @endphp
            <div class="flex-1"></div>
            <a href="{{ $link }}" class="ml-auto flex items-center gap-2 text-black hover:text-gray-700 dark:text-schiphol-gold dark:hover:text-schiphol-gold/80" id="loginLink">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                </svg>
                <p>{{ $linkText }}</p>
            </a>
            <button type="button" id="darkModeToggle" aria-label="Toggle dark mode" class="flex items-center justify-center rounded-full p-1 text-black transition hover:text-gray-700 dark:text-schiphol-gold dark:hover:text-schiphol-gold/80">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 cursor-pointer" id="darkModeIcon">
                    <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd" />
                </svg>
            </button>
        </header>
        <div class="flex w-full items-center bg-gray-300 px-6 py-3">
            <h2 id="currentTime" class="text-2xl text-black">{{ now()->format('H:i') }}</h2>
            <div class="flex-1"></div>
            <h2 id="currentDate" class="text-2xl text-black">{{ now()->format('d-m-Y') }}</h2>
        </div>
        <main class="bg-white transition-colors duration-200 dark:bg-schiphol-dark">
            {{ $slot }}
        </main>
        <footer></footer>
        <script>
            const updateClock = () => {
                const currentDateTime = new Date();
                const timeElement = document.getElementById('currentTime');
                const dateElement = document.getElementById('currentDate');

                if (timeElement) {
                    timeElement.textContent = currentDateTime.toLocaleTimeString('nl-NL', {
                        hour: '2-digit',
                        minute: '2-digit',
                    });
                }

                if (dateElement) {
                    dateElement.textContent = currentDateTime.toLocaleDateString('nl-NL', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                    });
                }
            };

            const setThemeIcon = (isDark) => {
                const icon = document.getElementById('darkModeIcon');

                if (!icon) {
                    return;
                }

                icon.innerHTML = isDark
                    ? '<path d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75Zm0 15.75a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0v-2.25a.75.75 0 0 1 .75-.75ZM4.219 4.219a.75.75 0 0 1 1.06 0l1.59 1.59a.75.75 0 0 1-1.06 1.06L4.22 5.279a.75.75 0 0 1 0-1.06Zm13.562 13.562a.75.75 0 0 1 1.06 0l1.59 1.59a.75.75 0 1 1-1.06 1.06l-1.59-1.59a.75.75 0 0 1 0-1.06ZM2.25 12a.75.75 0 0 1 .75-.75h2.25a.75.75 0 0 1 0 1.5H3a.75.75 0 0 1-.75-.75Zm15.75 0a.75.75 0 0 1 .75-.75h2.25a.75.75 0 0 1 0 1.5h-2.25a.75.75 0 0 1-.75-.75ZM4.219 19.781a.75.75 0 0 1 0-1.06l1.59-1.59a.75.75 0 1 1 1.06 1.06l-1.59 1.59a.75.75 0 0 1-1.06 0Zm13.562-13.562a.75.75 0 0 1 0-1.06l1.59-1.59a.75.75 0 1 1 1.06 1.06l-1.59 1.59a.75.75 0 0 1-1.06 0ZM12 7.5a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9Z" fill="currentColor" />'
                    : '<path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd" />';
            };

            const applyTheme = (theme) => {
                const root = document.documentElement;

                if (theme === 'dark') {
                    root.classList.add('dark');
                } else {
                    root.classList.remove('dark');
                }

                setThemeIcon(theme === 'dark');
            };

            const toggleDarkMode = () => {
                const root = document.documentElement;
                const isDark = root.classList.toggle('dark');

                localStorage.setItem('theme', isDark ? 'dark' : 'light');
                setThemeIcon(isDark);
            };

            const savedTheme = localStorage.getItem('theme');

            if (savedTheme) {
                applyTheme(savedTheme);
            } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                applyTheme('dark');
            } else {
                applyTheme('light');
            }

            updateClock();
            setInterval(updateClock, 1000);
            document.getElementById('darkModeToggle')?.addEventListener('click', toggleDarkMode);
        </script>
    </body>
</html>