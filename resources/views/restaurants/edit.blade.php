<x-app-layout>
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
</x-app-layout>
