<x-layouts::app :title="__('Dashboard')">
    <x-SchipholLayout>
        <div class="flex w-full items-center px-6 py-3 dark:bg-schiphol-dark_gray transition-colors duration-200" id="filterbar" >
            <form method="GET" action="{{ route('dashboard') }}" class="flex items-center gap-3">
                <input type="date" id="date" name="date" value="{{ $selectedDate }}" class="inline-auto w-[10rem] shrink-0">
                <input type="hidden" name="search" value="{{ $searchQuery }}">
            </form>
            <div class="flex-1"></div>
            <a href="">Kalenderabonomenten</a>
        </div>
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <table class="table-auto text-left w-full">
            <thead class="dark:bg-schiphol-dark_gray bg-gray-300 transition-colors duration-200">
            <tr class="dark:text-schiphol-light_gray transition-colors duration-200 text-2xl dark:border-schiphol-dark_gray">
                <th scope="col" class="px-4 py-2"></th>
                <th scope="col" class="px-4 py-2">Tijd</th>
                <th scope="col" class="px-4 py-2">Datum</th>
                <th scope="col" class="px-4 py-2">
                    <form method="GET" action="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        <input type="hidden" name="date" value="{{ $selectedDate }}">
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
                    <td class="px-4 py-2" data-cell="classnames">{{ $activity->schoolClasses->pluck('classname')->join(', ') }}</td>
                    <td class="px-4 py-2">{{ $activity->attendee}}</td>
                </tr>
                    <dialog id="my-dialog-{{ $activity->prod_id }}" closedby="any" class="backdrop:bg-black/50 p-5 rounded text-black dark:text-white">
                        <p>aan het bewerken: {{ $activity->summary }}!</p>
                        <form method="POST" action="{{ route('updateActivity') }}">
                            @csrf
                            @method('PATCH')
                            <label for="summary">Bestemming:</label>
                            <input type="text" name="summary" value="{{ $activity->summary }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <label for="">gate/klaslokaal</label>
                            <input type="text" name="location" value="{{ $activity->location }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <label for="">vluchtnummer/klas</label>
                            <input type="text" name="class" value="{{ $activity->class }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <label for="omscrhijving">omscrhijving</label>
                            <input type="text" name="description" value="{{ $activity->description }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <label for="">vliegmaatschapij/aanwezige</label>
                            <input type="text" name="attendee" value="{{ $activity->attendee }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            @if($activity->status == 'active')
                                <label for="">status</label>
                                <select name="status" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                                    <option value="active" selected>actief</option>
                                    <option value="inactive">inactief</option>
                                </select>
                            @elseif($activity->status == 'inactive')
                                <label for="">status</label>
                                <select name="status" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                                    <option value="active" >actief</option>
                                    <option value="inactive" selected>inactief</option>
                                </select>
                            @else
                                <label for="">status</label>
                                <select name="status" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                                    <option value="active" >actief</option>
                                    <option value="inactive">inactief</option>
                                </select>
                            @endif
                            <label for="">begin tijd</label>
                            <input type="datetime-local" name="dt_start" value="{{ \Carbon\Carbon::parse($activity->dt_start)->format('Y-m-d\TH:i') }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <label for="">eind tijd</label>
                            <input type="datetime-local" name="dt_end" value="{{ \Carbon\Carbon::parse($activity->dt_end)->format('Y-m-d\TH:i') }}" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <input type="hidden" name="id" value="{{ $activity->id }}">
                            <input type="submit" value="bewerkingen opslaan" class="mt-4 bg-gray-300 dark:bg-gray-700 p-2 rounded">
                        </form>
                        <button command="close" commandfor="my-dialog-{{ $activity->id }}" class="mt-4 bg-gray-300 dark:bg-gray-700 p-2 rounded">
                            Sluiten
                        </button>
                    </dialog>
            @endforeach
            </tbody>
        </table>

        <flux:modal name="add-lesson" class="md:max-w-lg">
            <div class="space-y-6">
                <form action="{{ route('storeLesson') }}" method="POST">
                    @csrf
                    <label for="summary">les:</label>
                    <input type="text" name="summary" value="^•⩊•^" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                    <label for="">gate/klaslokaal</label>
                    <input type="text" name="location" value="audiotorium" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                    <label for="">omscrhijving</label>
                    <input type="text" name="description" value="test" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                    <label for="">vluchtnummer/klas</label>
                    <div class="dropdown-menu">
                        @foreach ($school_classes as $class)
                            <label class="dropdown-item">
                                <input
                                    type="checkbox"
                                    name="school_classes[]"
                                    value="{{ $class->id }}"
                                >
                                <span>{{ $class->classname }}</span>
                            </label>
                        @endforeach
                    </div>
                    <label for="">vliegmaatschapij/aanwezige</label>
                    <input type="text" name="attendee" value="it-projecten@gmail.com" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                    <label for="">begin tijd</label>
                    <input type="datetime-local" value="2026-09-14T12:00" name="dt_start" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                    <label for="">eind tijd</label>
                    <input type="datetime-local" value="2026-09-14T13:00" name="dt_end" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                    <input type="submit" value="Les Invoeren" class="mt-4 bg-gray-300 dark:bg-gray-700 p-2 rounded">
                </form>
            </div>
        </flux:modal>
        <flux:modal name="add-school-class" class="md:max-w-lg">
            <div class="space-y-6">
                <form action="{{ route('storeSchoolClass') }}" method="POST">
                    @csrf
                    <label for="classname">les:</label>
                    <input type="text" name="classname" value="" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                    <input type="submit" value="Les Invoeren" class="mt-4 bg-gray-300 dark:bg-gray-700 p-2 rounded">
                </form>
            </div>
        </flux:modal>

        <flux:modal name="edit-school-class" class="md:max-w-lg">
            <div class="space-y-6 mt-10">
                @foreach ($school_classes as $class)
                    <div class="flex items-center gap-2">
                        <form id="edit-school-class-{{ $class->id }}" method="POST" action="{{ route('editSchoolClass') }}" class="flex min-w-0 flex-1 items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $class->id }}">
                            <label for="classname-{{ $class->id }}" class="sr-only">Klas</label>
                            <input id="classname-{{ $class->id }}" type="text" name="classname" value="{{ $class->classname }}" class="p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                            <button type="submit" form="edit-school-class-{{ $class->id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-700 rounded">
                                <flux:icon name="pencil-square" class="size-7" />
                            </button>
                        </form>
                        <form id="delete-school-class-{{ $class->id }}" method="POST" action="{{ route('deleteSchoolClass') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $class->id }}">
                            <button type="submit" form="delete-school-class-{{ $class->id }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-700 rounded">
                                <flux:icon name="trash" class="size-7" />
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </flux:modal>

        <!-- Super user | Add teacher accounts -->
        <flux:modal name="add-teacher-account" class="md:max-w-lg">
            <div class="space-y-6 mt-10">
                <form id='add-teacher' method='POST' action="{{ route('add.account') }}" class='flex min-w-0 flex flex-col items-center gap-2'>
                    @csrf

                    <label>Naam</label>
                    <input id='name' type='text' name='name' class='p-2 rounded border border-gray-300 dark:border-gray-700 w-full'>


                    <label>Email</label>
                    <input id='email' type='text' name='email' class='p-2 rounded border border-gray-300 dark:border-gray-700 w-full'>


                    <label>Wachtwoord</label>
                    <input id='password' type='text' name='password' class='p-2 rounded border border-gray-300 dark:border-gray-700 w-full'>

                    <button
                           type="submit"
                           form="add-teacher"
                           class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-700 rounded"
                    >
                    Maak account aan.
                    </button>

                </form>
            </div>
        </flux:modal>
    </x-SchipholLayout>
    <script>
        document.getElementById('date').addEventListener('change', function() {
            this.form.submit();
        });
    </script>
</x-layouts::app>

