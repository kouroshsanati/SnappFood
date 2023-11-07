{{--<x-app-layout>
    <form action="{{ route('restaurants.update', $restaurant) }}" method="post">
        @csrf
        @method('PUT')
        <label>restaurant_category_id</label>
        <select name="restaurant_category_id" id="restaurant_category_id">
            @foreach(\App\Models\RestaurantCategory::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach
        </select>
        <label>name</label>
        <input type="text" name="name" value="{{ $restaurant->name }}">
        <label>address</label>
        <input type="text" name="address" value="{{ $restaurant->address }}">
        <label>PhoneNumber</label>
        <input type="text" name="telephone" value="{{ $restaurant->telephone }}">
        <label>bank_account_number</label>
        <input type="text" name="bank_account_number" value="{{ $restaurant->bank_account_number}}">

        <input type="submit" name="submit">

    </form>

    <a href="{{ route('foods.index') }}">
        Foods
    </a>
</x-app-layout>--}}

<x-app-layout>

    <div class="form-container">
        <form action="{{ route('restaurants.update', $restaurant) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="restaurant_category_id">Restaurant Category</label>
                <select name="restaurant_category_id" id="restaurant_category_id" class="form-control rounded-md w-full text-center p-10">
                    @foreach(\App\Models\RestaurantCategory::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control rounded-md w-full text-center p-10" value="{{ $restaurant->name }}">
            </div>

            <div class="form-group mb-4">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control rounded-md w-full text-center p-10" value="{{ $restaurant->address }}">
            </div>

            <div class="form-group mb-4">
                <label for="telephone">Phone Number</label>
                <input type="text" name="telephone" id="telephone" class="form-control rounded-md w-full text-center p-10" value="{{ $restaurant->telephone }}">
            </div>

            <div class="form-group mb-4">
                <label for="bank_account_number">Bank Account Number</label>
                <input type="text" name="bank_account_number" id="bank_account_number" class="form-control rounded-md w-full text-center p-10" value="{{ $restaurant->bank_account_number }}">
            </div>

            <x-primary-button type="submit" class="flex justify-center items-center w-full btn btn-primary mb-4">Update</x-primary-button>

        </form>
    </div>

    <a href="{{ route('foods.index') }}" class="flex justify-center items-center w-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Foods</a>
</x-app-layout>

