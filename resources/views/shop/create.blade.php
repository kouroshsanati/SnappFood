<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Restaurant
           {{-- //{{ __('Manage Restaurant') }}--}}
        </h2>
    </x-slot>

    <form method="post" action=" {{ route('shop.store') }}">
        @csrf
        <div class="mt-4">
            <x-label for="title" value="Restaurant Name" />
            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required  />
        </div>
        <div class="mt-4">
            <x-label for="firstname" value="Firstname" />
            <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required/>
        </div>
        <div class="mt-4">
            <x-label for="lastname" value="Lastname" />
            <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required />
        </div>
        <div class="mt-4">
            <x-label for="PhoneNumber" value="PhoneNumber" />
            <x-input id="PhoneNumber" class="block mt-1 w-full" type="text" name="PhoneNumber" :value="old('PhoneNumber')" required />
        </div>
        <div class="mt-4" >
            <x-label for="address" value="Address" />
            <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
        </div>




        <div class="mt-4">
            <x-label for="email" value="Email" />
            <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required />
        </div>

        <div class="mt-4">
            <x-label for="username" value="Username" />
            <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
        </div>

        <x-button class="mt-4 text-center">
            save
        </x-button>


    </form>


</x-app-layout>
