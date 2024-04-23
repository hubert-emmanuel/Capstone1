<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-700 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-7">
                    <p class="text-xl font-semibold">{{ __("Welcome to Your Dashboard!") }}</p>
                    <p class="text-sm">{{ __("You're logged in!") }}</p>
                </div>
                <div class="p-6">
                    @if(Auth::user()->role == 'admin')
                        <form action="{{ route('user-list') }}">
                            <button type="submit" class="btn btn-primary">Lanjut</button>
                        </form>
                    @endif
                        @if(Auth::user()->role == 'prodi')
                            <form action="{{ route('kurikulum-list') }}">
                                <button type="submit" class="btn btn-primary">Lanjut</button>
                            </form>
                        @endif
                        @if(Auth::user()->role == 'mahasiswa')
                            <form action="{{ route('polling-list-mahasiswa') }}">
                                <button type="submit" class="btn btn-primary">Lanjut</button>
                            </form>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
