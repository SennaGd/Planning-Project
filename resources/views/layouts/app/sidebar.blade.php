<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky collapsible="mobile" class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                <flux:sidebar.collapse class="lg:hidden" />
            </flux:sidebar.header>

            <flux:sidebar.nav class="space-y-2.5">
                <flux:sidebar.group :heading="__('beheer')" class="grid">
                    <flux:sidebar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:sidebar.item>
                    <flux:sidebar.item icon="academic-cap" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('klas toevoegen') }}
                    </flux:sidebar.item>
                    <flux:sidebar.item icon="academic-cap" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('les toevoegen') }}
                    </flux:sidebar.item>
                    <flux:sidebar.item icon="academic-cap" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate >
                        {{ __('les toevoegen') }}
                    </flux:sidebar.item>

                    <flux:modal.trigger name="add-class">
                        <flux:sidebar.item icon="academic-cap">
                            {{ __('Les Invoeren') }}
                        </flux:sidebar.item>
                    </flux:modal.trigger>
                    <flux:modal name="add-class" class="md:max-w-lg">
                            <div class="space-y-6">
                                <form action="{{ route('store') }}" method="POST">
                                    <label for="summary">les:</label>
                                    <input type="text" name="summary" value="^•⩊•^" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                                    <label for="">gate/klaslokaal</label>
                                    <input type="text" name="location" value="audiotorium" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
                                    <label for="">korte omschrijving</label>
                                    <input type="text" name="description" value="hier ga je je verdiepen in software" class="mt-2 p-2 rounded border border-gray-300 dark:border-gray-700 w-full">
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
                </flux:sidebar.group>
            </flux:sidebar.nav>

            <flux:spacer />


            <flux:sidebar.nav>
                <flux:sidebar.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                    {{ __('Repository') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                    {{ __('Documentation') }}
                </flux:sidebar.item>
            </flux:sidebar.nav>

            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <flux:avatar
                                    :name="auth()->user()->name"
                                    :initials="auth()->user()->initials()"
                                />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                    <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer"
                            data-test="logout-button"
                        >
                            {{ __('Log out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>
