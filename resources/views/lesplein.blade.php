<x-SchipholLayout>
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
