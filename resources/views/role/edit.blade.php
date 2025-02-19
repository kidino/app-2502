<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

        <form method="POST" action="{{ route('role.update', $role->id) }}">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text"
                name="name" :value="old('name', $user->name)" required autofocus />

                <x-input-error :messages="$errors->get('name')" />


            </div>

            <!-- Descriptions -->
             <div>
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text"
                name="description" :value="old('description', $role->description)" autofocus />

                <x-input-error :messages="$errors->get('name')" />


            </div>

        >
    
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('user.index') }}">
                    {{ __('Cancel') }}
                </a>

                <div class="mb-4">
                    @foreach($roles as $role)
                        <div class="flex items-center">
                            <input id="role-{{ $role->id }}" type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'checked' : '' }} class="mr-2">
                            <label for="role-{{ $role->id }}" class="text-sm">{{ $role->name }}</label>
                        </div>
                    @endforeach
                </div>


                <x-primary-button class="ml-4">
                    {{ __('Save Profile') }}
                </x-primary-button>
            </div>
        </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
