<x-SchipholLayout>
    <div class="flex w-full items-center bg-gray-300 px-6 py-3 dark:bg-schiphol-dark_gray transition-colors duration-200" id="filterbar">
        <form method="GET" action="/" class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input class="w-full bg-transparent outline-none" type="text" name="Zoeken" id="search" placeholder="Zoeken">
        </form>
        <div class="flex-1"></div>
        <a href="">Kalenderabonomenten</a>
    </div>
    <div id="planningtable">
        <table class="table-auto text-left w-full m-3">
            <thead class="dark:bg-schiphol-dark_gray transition-colors duration-200">
            <tr class="dark:text-schiphol-light_gray transition-colors duration-200 text-2xl border-b border-gray-300 dark:border-schiphol-dark_gray">
                <th scope="col">Tijd</th>
                <th scope="col">Datum</th>
                <th scope="col">Bestemming</th>
                <th scope="col">Gate</th>
                <th scope="col">Vluchtnummer</th>
                <th scope="col">Vliegmaatschapij</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                    @if(\Carbon\Carbon::parse($activity->dt_strat)->isToday())
                        <tr class="dark:border-schiphol-dark_gray transition-colors duration-200 text-1xl">
                            <td>{{ \Carbon\Carbon::parse($activity->dt_strat)->format('H:i') }} - {{ \Carbon\Carbon::parse($activity->dt_end)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($activity->dt_strat)->format('d-m-Y') }}</td>
                            <td>{{ $activity->summary }}</td>
                            <td>{{ $activity->location }}</td>
                            <td>{{ $activity->class }}</td>
                            <td>{{ $activity->attendee}}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-SchipholLayout>
