<x-layouts::app :title="__('Dashboard')">

    <x-SchipholLayout>
        <div class="flex w-full items-center px-6 py-3 dark:bg-schiphol-dark_gray transition-colors duration-200" id="filterbar" >
            <form method="GET" action="/" class="flex items-center gap-3">
                <input type="date" id="date" name="date" value="{{ $selectedDate }}" class="inline-auto w-[10rem] shrink-0">
            </form>
            <div class="flex-1"></div>
            <a href="">Kalenderabonomenten</a>
        </div>
        <table class="table-auto text-left w-full">
            <thead class="dark:bg-schiphol-dark_gray bg-gray-300 transition-colors duration-200">
            <tr class="dark:text-schiphol-light_gray transition-colors duration-200 text-2xl dark:border-schiphol-dark_gray">
                <th scope="col" class="px-4 py-2"></th>
                <th scope="col" class="px-4 py-2">Tijd</th>
                <th scope="col" class="px-4 py-2">Datum</th>
                <th scope="col" class="px-4 py-2">
                    <form method="GET" action="/" class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        <input class="w-full bg-transparent outline-none" type="text" name="search" id="search" placeholder="Zoeken" value="{{ $searchQuery }}">
                    </form>
                </th>
                <th scope="col" class="px-4 py-2">Gate</th>
                <th scope="col" class="px-4 py-2">Vluchtnummer</th>
                <th scope="col" class="px-4 py-2">Vliegmaatschapij</th>
                </tr>
            </thead>
            <tbody>
            @foreach($activities as $activity)
{{--                onclick="alert('!world Hello ')"--}}
                <tr class="dark:border-schiphol-dark_gray transition-colors duration-200 text-1xl ">
                    <td>
                        <!-- De knop krijgt een uniek doelwit per rij -->
                        <button command="show-modal" commandfor="my-dialog-{{ $activity->prod_id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-700 rounded ml-3 ">
                            bewerk
                        </button>
                    </td>

                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($activity->dt_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($activity->dt_end)->format('H:i') }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($activity->dt_start)->format('d-m-Y') }}</td>
                    <td class="px-4 py-2">{{ $activity->summary }}</td>
                    <td class="px-4 py-2">{{ $activity->location }}</td>
                    <td class="px-4 py-2">{{ $activity->class }}</td>
                    <td class="px-4 py-2">{{ $activity->attendee}}</td>
                </tr>
                    <dialog id="my-dialog-{{ $activity->prod_id }}" closedby="any" class="backdrop:bg-black/50 p-5 rounded text-black dark:text-white">
                        <p>aan het bewerken: {{ $activity->summary }}!</p>
                        <form method="dialog">
                            <label for="summary">Bestemming/omscrhijving:</label>
                            <input type="text" name="summary" value="{{ $activity->summary }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <label for="">gate/klaslokaal</label>
                            <input type="text" name="location" value="{{ $activity->location }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <label for="">vluchtnummer/klas</label>
                            <input type="text" name="class" value="{{ $activity->class }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <label for="">vliegmaatschapij/aanwezige</label>
                            <input type="text" name="attendee" value="{{ $activity->attendee }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <label for="">begin tijd</label>
                            <input type="datetime-local" name="dt_start" value="{{ \Carbon\Carbon::parse($activity->dt_start)->format('Y-m-d\TH:i') }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <label for="">eind tijd</label>
                            <input type="datetime-local" name="dt_end" value="{{ \Carbon\Carbon::parse($activity->dt_end)->format('Y-m-d\TH:i') }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <input type="submit" value="bewerkingen opslaan" class="mt-4 bg-gray-300 dark:bg-gray-700 p-2 rounded">
                        </form>
                        <button command="close" commandfor="my-dialog-{{ $activity->id }}" class="mt-4 bg-gray-300 dark:bg-gray-700 p-2 rounded">
                            Sluiten
                        </button>
                    </dialog>
            @endforeach
            </tbody>
        </table>
    </x-SchipholLayout>
</x-layouts::app>

