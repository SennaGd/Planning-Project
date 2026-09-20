<x-SchipholLayout>
    <div id="planningtable" class="w-full max-w-full overflow-x-auto">
        <table class="table-auto text-left w-full text-[clamp(0.55rem,1vw,1rem)] [&_th]:whitespace-nowrap [&_td]:whitespace-nowrap [&_th]:px-[0.6em] [&_th]:py-[0.35em] [&_td]:px-[0.6em] [&_td]:py-[0.35em]">
            <thead class="dark:bg-schiphol-dark_gray bg-gray-300 transition-colors duration-200">
            <tr class="dark:text-schiphol-light_gray transition-colors duration-200 text-[1.15em] dark:border-schiphol-dark_gray">
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
    @include('partials.activities-echo')
</x-SchipholLayout>
