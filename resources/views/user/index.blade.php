<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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

                    <a href="{{ route('user.create') }}" class="mb-4 px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 inline-block">
                        New User
                    </a>

                    <div class="mb-4">{{ $users->links() }}</div>


                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                        <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-left">Notes</th>
                            <th class="py-3 px-6 text-left">Roles</th>
                            <th class="py-3 px-6 text-left">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach( $users as $user )
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="py-3 px-6">{{ $user->id }}</td>
                                <td class="py-3 px-6">{{ $user->name }}</td>
                                <td class="py-3 px-6">{{ $user->email }}</td>
                                <td class="py-3 px-6">{{ $user->notes_count }}</td>
                                <td class="py-3 px-6">
                                    @if($user->roles->count() > 0)
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($user->roles as $role)
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded">
                                        {{ $role->name }}
                                    </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-gray-400 text-sm">No roles assigned</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{ route('user.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900 underline">
                                        Edit profile
                                    </a>
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
