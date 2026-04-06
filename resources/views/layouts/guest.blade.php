<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body>

    <flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">

        <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item icon="home" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                Home
            </flux:navbar.item>

            <flux:navbar.item icon="link" :href="route('edit.links')" :current="request()->routeIs('edit.links')"
                wire:navigate>
                Edit Links
            </flux:navbar.item>

            <flux:navbar.item icon="video-camera" :href="route('videos')" :current="request()->routeIs('videos')"
                wire:navigate>
                Videos
            </flux:navbar.item>

            <flux:navbar.item icon="document-text" :href="route('notes')" :current="request()->routeIs('notes')"
                wire:navigate>
                Notes
            </flux:navbar.item>

            <flux:navbar.item icon="calendar-days" :href="route('schedule')" :current="request()->routeIs('schedule')"
                wire:navigate>
                Schedule Reminders
            </flux:navbar.item>

            <flux:navbar.item icon="chevron-up" :href="route('home', 'sort')" wire:navigate>
                Sort
            </flux:navbar.item>

        </flux:navbar>

    </flux:header>

    <flux:main>
        @if (session('success'))
            <div class="mb-6 bg-green-200 border border-green-500 p-2 rounded wire:transition">
                <p class="text-sm text-green-950 italic">{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 bg-red-200 border border-red-500 p-2 rounded wire:transition">
                <p class="text-sm text-red-950 italic">{{ session('error') }}</p>
            </div>
        @endif
        {{ $slot }}
    </flux:main>

    @fluxScripts
</body>

</html>
