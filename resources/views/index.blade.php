<x-SchipholLayout>
    <div class="flex w-full items-center px-6 py-3 dark:bg-schiphol-dark_gray transition-colors duration-200" id="filterbar">
        <form method="GET" action="{{ url('/') }}" class="flex items-center gap-3">
            <input type="date" id="date" name="date" value="{{ $selectedDate }}" class="inline-auto w-[10rem] shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input class="w-full bg-transparent outline-none" type="text" name="search" id="search" placeholder="Zoeken" value="{{ $searchQuery }}">
        </form>
        <div class="flex-1"></div>
        <!--  popup  | button  -->

        <button command='show-modal' commandfor="my-dialog-2">kalenderabonnementen</button>

    </div>
        <div class="w-full max-w-full overflow-x-auto">
        <table class="table-auto text-left w-full text-[clamp(0.55rem,1vw,1rem)] [&_th]:whitespace-nowrap [&_td]:whitespace-nowrap [&_th]:px-[0.6em] [&_th]:py-[0.35em] [&_td]:px-[0.6em] [&_td]:py-[0.35em]">
            <thead class="dark:bg-schiphol-dark_gray bg-gray-300 transition-colors duration-200">
                <tr class="dark:text-schiphol-light_gray transition-colors duration-200 text-[1.15em] dark:border-schiphol-dark_gray dark:text-[#FFCD00]">
                    <th scope="col">Tijd</th>
                    <th scope="col">Datum</th>
                    <th scope="col">Bestemming</th>
                    <th scope="col">Gate</th>
                    <th scope="col">Vluchtnummer</th>
                    <th scope="col">Vliegmaatschapij</th>
                    <th scope="col">Opmerkingen</th>
                </tr>
            </thead>
            <tbody id="activities-body">
                @foreach($activities as $activity)
                        <tr data-activity-id="{{ $activity->id }}" data-dt-start="{{ \Carbon\Carbon::parse($activity->dt_start)->toIso8601String() }}" data-dt-end="{{ \Carbon\Carbon::parse($activity->dt_end)->toIso8601String() }}">
                            <td>{{ \Carbon\Carbon::parse($activity->dt_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($activity->dt_end)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($activity->dt_start)->format('d-m-Y') }}</td>
                            <td>{{ $activity->summary }}</td>
                            <td>{{ $activity->location }}</td>
                            <td data-cell="classnames">{{ $activity->schoolClasses->pluck('classname')->join(', ') }}</td>
                            <td>{{ $activity->attendee}}</td>
                            @if (strtolower(trim((string) $activity->status)) === 'active')
                            <td>@if (\Carbon\Carbon::parse($activity->dt_end)->isPast()) <p class="text-red-500">Vertrokken</p> @elseif (\Carbon\Carbon::parse($activity->dt_start)->isPast()) <p class="text-green-500">Boarding</p> @else <p class="text-yellow-500">Gepland</p> @endif</td>
                            @else
                            <td><p class="text-gray-500">Geanuleerd</p></td>
                            @endif
                        </tr>
                @endforeach
            </tbody>
        </table>
        </div>

    <dialog id='my-dialog-2' closedby='any' class='popup-content background:black/20 backdrop-blur-sm m-auto p-5 shadow rounded dark:bg-schiphol-dark_gray dark:text-[#f0f0f0] dark:text-schiphol-light_gray'>
        <h2>Abonneer op een of meerdere kalenders</h2>
        <form action="{{ route('calendar.handle_request') }}" method="POST" class=''>
            @csrf
                <p class='italic'>- Selecteer klassen</p>
                <div class='p-2 pl-5 align-content' >
                    <ul>
                        @foreach ($school_classes as $class)
                            <li>
                            <label class="dropdown-item">
                                <input
                                    type="checkbox"
                                    name="school_classes[]"
                                    value="{{ $class->id }}"
                                >
                                <span>{{ $class->classname }}</span>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>


                <div>
                    <input name='qr-code' type='checkbox'> QR-Code</input>
                </div>
            <input class='underline' type='submit' value='Submit' />
        </form>
    </dialog>
    <script>
        const navigationEntry = performance.getEntriesByType('navigation')[0];
        const currentUrl = new URL(window.location.href);

        if (navigationEntry?.type === 'reload' && currentUrl.searchParams.has('date')) {
            currentUrl.searchParams.delete('date');
            window.location.replace(currentUrl.toString());
        }

        document.getElementById('date').addEventListener('change', function() {
            this.form.submit();
        });

        // document.getElementById('search').addEventListener('input', function() {
        //     this.form.submit();
        // });
    </script>
    @include('partials.activities-echo')
</x-SchipholLayout>
