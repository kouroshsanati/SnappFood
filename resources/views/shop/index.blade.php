<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Restaurant') }}
        </h2>
    </x-slot>

    <div class="flex justify-start">
        <a href="{{ route('shop.create') }} "
           class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Add New Restaurant
        </a>
    </div>

    @if($shops->count())

        <hr class="mt-4">

        <table class="border-2 border-solid text-center w-full">
            <thead>
            <tr>
                <th class="border-2 border-solid text-center p-2">Number</th>
                <th class="border-2 border-solid text-center p-2">Restaurant Name</th>
                <th class="border-2 border-solid text-center p-2">Firstname</th>
                <th class="border-2 border-solid text-center p-2">Lastname</th>
                <th class="border-2 border-solid text-center p-2">Phonenumber</th>
                <th class="border-2 border-solid text-center p-2">Date Restaurant Created</th>
            </tr>
            </thead>

            <tbody>

            @foreach($shops as $key=>$value)
                <tr>
                    <th class="border-2 border-solid text-center p-2"> {{ $key + 1 }}</th>
                    <td class="border-2 border-solid text-center p-2"> {{ $value->title }}</td>
                    <td class="border-2 border-solid text-center p-2"> {{ $value->firstname  }}</td>
                    <td class="border-2 border-solid text-center p-2"> {{ $value->lastname }}</td>
                    <td class="border-2 border-solid text-center p-2"> {{ $value->PhoneNumber }}</td>
                    <td class="border-2 border-solid text-center p-2"> {{ persianDate($value->created_at) }}</td>
                </tr>
            @endforeach

            </tbody>

        </table>
    @endif


</x-app-layout>
