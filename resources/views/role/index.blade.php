<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
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


<a href="{{ route('role.create') }}" class="mb-4 px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 inline-block">
  New User
</a>

<div class="mb-4"></div>


                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <!-- <th class="py-3 px-6 text-left">Action</th> -->
                </tr>
            </thead>
            <tbody>

            @foreach( $roles as $role )
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $role->id }}</td>
                    <td class="py-3 px-6">{{ $role->name }}</td>
                    <td class="py-3 px-6">{{ $role->description }}</td>
                    <!-- <td class="py-3 px-6"> <a href="{{route('role.edit', $role->id)}}"> Edit Role </a> </td> -->
                </tr>
            @endforeach


            </tbody>
        </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
