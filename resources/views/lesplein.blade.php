<x-SchipholLayout>
    <div id="planningtable">
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
                    @if(\Carbon\Carbon::parse($activity->dt_strat)->isToday())
                        <tr class="dark:border-schiphol-dark_gray transition-colors duration-200 text-1xl">
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($activity->dt_strat)->format('H:i') }} - {{ \Carbon\Carbon::parse($activity->dt_end)->format('H:i') }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($activity->dt_strat)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2">{{ $activity->summary }}</td>
                            <td class="px-4 py-2">{{ $activity->location }}</td>
                            <td class="px-4 py-2">{{ $activity->class }}</td>
                            <td class="px-4 py-2">{{ $activity->attendee}}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-SchipholLayout>
