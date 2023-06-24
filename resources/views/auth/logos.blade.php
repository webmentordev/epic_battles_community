<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Logos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('logo') }}" method="POST" class="mb-6" enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                            <p class="mb-6 p-6 border-l-4 border-green-600 bg-green-100 w-fit">{{ session('success') }}</p>
                        @endif
                        
                        <div class="flex items-center">
                            <div class="ml-3 w-full">
                                <x-input-label for="image" :value="__('Server Logo')" />
                                <x-text-input id="image" class="block mt-1 w-full"
                                                type="file"
                                                name="image"
                                                required />
                    
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>
                            <x-primary-button class="mt-6 ml-3">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                    
                    @if (count($logos))
                        <h1 class="text-3xl mb-3 font-semibold">Logos Database</h1>
                        <table class="w-full text-sm">
                            <tr class="bg-black text-white">
                                <th class="text-start p-2">ID</th>
                                <th class="text-start p-2">Image</th>
                                <th class="text-start p-2">User</th>
                                <th class="text-start p-2">Status</th>
                                <th class="text-end p-2">Created</th>
                                <th class="text-end p-2">Activate</th>
                            </tr>
                            @foreach ($logos as $logo)
                                <tr class="odd:bg-gray-100 odd:border-b border-gray-300 last:border-none">
                                    <td class="text-start p-2">{{ $logo->id }}</td>
                                    <td class="text-start p-2"><img src="{{ asset('/storage/'.$logo->image) }}" width="50" height="50" class="rounded-full"></td>
                                    <td class="text-start p-2">{{ $logo->user->name }}</td>
                                    <td class="text-start">
                                        @if ($logo->is_active == true)
                                            <p class="bg-green-600/10 rounded-full text-green-600 p-2 px-4 w-fit font-semibold">Active</p>
                                        @else
                                            <p class="bg-red-600/10 rounded-full text-red-600 p-2 px-4 w-fit font-semibold">InActive</p>
                                        @endif
                                    </td>
                                    <td class="text-end p-2">{{ $logo->created_at->format('D d/m/Y H:i:m A') }}</td>
                                    <td class="text-end p-2">
                                        @if ($logo->is_active == false)
                                        <form action="{{ route('logo.activate', $logo->id) }}" method="post">
                                            @method('PATCH')
                                            @csrf
                                            <x-primary-button>
                                                {{ __('Activate') }}
                                            </x-primary-button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-center">No servers exist. Database is empty</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>