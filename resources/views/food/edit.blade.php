<x-app-layout>
    <div class="sm:p-8 bg-white shadow sm:rounded-lg p-6">
        <form method="POST" action="{{ route('foods.update',$food) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Name -->
            <div>
                <x-input-label for="name" class="'block font-medium text-sm text-pink-700" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $food->name }}"/>
            </div>
            <div>
                <x-input-label for="discount" class="'block font-medium text-sm text-pink-700" :value="__('discount')"/>
                <x-text-input id="discount" class="block mt-1 w-full" type="text" name="discount"
                              value="{{ $food->discount }}"/>
            </div>
            <!-- Materials -->
            <div>
                <x-input-label for="materials" class="'block font-medium text-sm text-pink-700"
                               :value="__('Materials')"/>
                <x-text-input id="materials" class="block mt-1 w-full" type="text" name="materials"
                              :value="old('materials')"/>
            </div>
            <!--Price  -->
            <div>
                <x-input-label for="price" class="'block font-medium text-sm text-pink-700" :value="__('Price')"/>
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                              value="{{ $food->price }}"/>
            </div>


            <!-- Category -->
            <div>
                <select id="category" class="block mt-1 w-full" type="text" name="food_category_id">
                    @foreach(\App\Models\FoodCategory::all() as $category)
                        <option value="{{$category->id}}"> {{$category->name}}</option>
                    @endforeach
                </select>

            </div>

            <input type="hidden" name="restaurant_id"
                   value="{{\Illuminate\Support\Facades\Auth::user()->restaurant->id}}">

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Edit') }}
                </x-primary-button>
            </div>
        </form>

        <div class="bg-white p-6">
</x-app-layout>
