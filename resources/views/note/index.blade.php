<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
        {{ session('success') }}
    </div>
@endif


<a href="{{ route('note.create') }}" class="mb-4 px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 inline-block">
  New Note
</a>

<div class="mb-4">{{ $notes->links() }}</div>

                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Action</th>
                </tr>
            </thead>
            <tbody>

            @forelse( $notes as $note )
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $note->id }}</td>
                    <td class="py-3 px-6">{{ $note->title }}</td>
                    <td class="py-3 px-6">

                        <a href="{{route('note.edit', $note->id)}}" class="px-2 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                            Edit
                        </a>                        
                    </td>
                </tr>

            @empty  

            <tr>
                <td class="py-6 px-6 text-center" colspan="3">
                    <p>No data found. Create a new record now.</p>
                    <a href="{{ route('note.create') }}" 
                    class="mb-4 px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 inline-block">
                        New Note
                    </a>  
                </td>
            </tr>
            @endforelse


            </tbody>
        </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
