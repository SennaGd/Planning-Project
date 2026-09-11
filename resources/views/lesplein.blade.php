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
            <tbody id="activities-body">
                @foreach($activities as $activity)
                        <tr class="text-1xl" data-activity-id="{{ $activity->id }}" data-dt-start="{{ \Carbon\Carbon::parse($activity->dt_start)->toIso8601String() }}" data-dt-end="{{ \Carbon\Carbon::parse($activity->dt_end)->toIso8601String() }}">
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($activity->dt_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($activity->dt_end)->format('H:i') }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($activity->dt_start)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2">{{ $activity->summary }}</td>
                            <td class="px-4 py-2">{{ $activity->location }}</td>
                            <td class="px-4 py-2" data-cell="classnames">{{ $activity->schoolClasses->pluck('classname')->join(', ') }}</td>
                            <td class="px-4 py-2">{{ $activity->attendee}}</td>
                            <td class="px-4 py-2" data-cell="status">@if (\Carbon\Carbon::parse($activity->dt_end)->isPast()) <p class="text-red-500">Vertrokken</p> @elseif (\Carbon\Carbon::parse($activity->dt_start)->isPast()) <p class="text-green-500">Boarding</p> @else <p class="text-yellow-500">Gepland</p> @endif</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('partials.activities-echo')
</x-SchipholLayout>
