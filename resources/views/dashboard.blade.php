<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl mb-3 font-semibold">Registered Users!</h1>
                    <table class="w-full text-sm">
                        <tr class="bg-black text-white">
                            <th class="text-start p-2">Name</th>
                            <th class="text-start">SteamID</th>
                            <th class="text-end p-2">isAdmin</th>
                            <th class="text-end p-2">SignedUp</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr class="odd:bg-gray-100 odd:border-b border-gray-300 last:border-none">
                                <td class="text-start p-2">{{ $user->name }}</td>
                                <td class="text-start">{{ $user->steam_id }}</td>
                                <td class="text-end">
                                    @if ($user->is_admin == true)
                                        YES
                                    @else
                                        NO
                                    @endif
                                </td>
                                <td class="text-end p-2">{{ $user->created_at->format('D d/m/Y H:i:m A') }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>