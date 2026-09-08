<x-SchipholLayout>
    @vite('resources/css/app.css')
    <div class="flex w-full items-center px-6 py-3 dark:bg-schiphol-dark_gray transition-colors duration-200" id="filterbar">
        <form method="GET" action="/" class="flex items-center gap-3">
            <input type="date" id="date" name="date" value="{{ $selectedDate }}" class="inline-auto w-[10rem] shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input class="w-full bg-transparent outline-none" type="text" name="search" id="search" placeholder="Zoeken" value="{{ $searchQuery }}">
        </form>
        <div class="flex-1"></div>
        <!--  popup  | button  -->
        <button class='popup-button'>Kalenderabonomenten</button>

        <!--  popup  | content  -->
        <div class='popup-wrapper'>
            <div class='popup dark:text-schiphol-light_gray'>
                <div class='popup-close'>x</div>
                <div class='popup-content'>
                    <h2>Hello</h2>
                    <p>World!</p>

                </div>
            </div>
        </div>
        @vite('resources/js/popup.js')
    </div>
        <table class="table-auto text-left w-full">
            <thead class="dark:bg-schiphol-dark_gray bg-gray-300 transition-colors duration-200">
            <tr class="dark:text-schiphol-light_gray transition-colors duration-200 text-2xl dark:border-schiphol-dark_gray">
                <th scope="col" class="px-4 py-2">Tijd</th>
                <th scope="col" class="px-4 py-2">Datum</th>
                <th scope="col" class="px-4 py-2">Bestemming</th>
                <th scope="col" class="px-4 py-2">Gate</th>
                <th scope="col" class="px-4 py-2">Vluchtnummer</th>
                <th scope="col" class="px-4 py-2">Vliegmaatschapij</th>
                <th scope="col" class="px-4 py-2">Opmerkingen</th>
            </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                        <tr class="dark:border-schiphol-dark_gray transition-colors duration-200 text-1xl">
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($activity->dt_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($activity->dt_end)->format('H:i') }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($activity->dt_start)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2">{{ $activity->summary }}</td>
                            <td class="px-4 py-2">{{ $activity->location }}</td>
                            <td class="px-4 py-2">{{ $activity->class }}</td>
                            <td class="px-4 py-2">{{ $activity->attendee}}</td>
                            <td class="px-4 py-2">@if (\Carbon\Carbon::parse($activity->dt_end)->isPast()) <p class="text-red-500">Vertrokken</p> @elseif (\Carbon\Carbon::parse($activity->dt_start)->isPast()) <p class="text-green-500">Boarding</p> @else <p class="text-yellow-500">Gepland</p> @endif</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        document.getElementById('date').addEventListener('change', function() {
            this.form.submit();
        });

        // document.getElementById('search').addEventListener('input', function() {
        //     this.form.submit();
        // });
    </script>
</x-SchipholLayout>
