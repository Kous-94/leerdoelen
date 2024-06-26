<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg">{{ __('Contact Messages') }}</h3>
                    <table class="min-w-full bg-white dark:bg-gray-800 mt-4">
                        <thead>
                            <tr>
                                <th class="py-2">Voornaam</th>
                                <th class="py-2">Achternaam</th>
                                <th class="py-2">E-mail</th>
                                <th class="py-2">Bericht</th>
                                <th class="py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td class="border px-4 py-2">{{ $contact->first_name }}</td>
                                    <td class="border px-4 py-2">{{ $contact->last_name }}</td>
                                    <td class="border px-4 py-2">{{ $contact->email }}</td>
                                    <td class="border px-4 py-2">{{ $contact->message }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('contact.edit', $contact->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                        <form action="{{ route('contact.delete', $contact->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>