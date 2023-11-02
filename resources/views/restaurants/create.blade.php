<x-app-layout>


    <form action="{{ route('restaurants.store') }}" method="post">
        @csrf

        <label>restaurant_category_id</label>
        <select name="restaurant_category_id" id="restaurant_category_id">
            @foreach(\App\Models\RestaurantCategory::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach
        </select>
        <label>name</label>
        <input type="text" name="name">
        <label>address</label>
        <input type="text" name="address">
        <label>PhoneNumber</label>
        <input type="text" name="telephone">
        <label>bank_account_number</label>
        <input type="text" name="bank_account_number">

        <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
        <input type="submit" name="submit">

    </form>
</x-app-layout>


