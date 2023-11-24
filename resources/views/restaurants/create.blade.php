{{--<x-app-layout>

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
</x-app-layout>--}}



<x-app-layout>


    <form action="{{ route('restaurants.store') }}" method="post">
        @csrf

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
            <input type="text" name="name" id="name" class="form-control rounded-md w-full text-center p-10">
        </div>

        <div class="form-group mb-4">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control rounded-md w-full text-center p-10">
        </div>
        <div class="form-group mb-4">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" id="latitude" class="form-control rounded-md w-full text-center p-10">
        </div>
        <div class="form-group mb-4">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control rounded-md w-full text-center p-10">
        </div>

        <div class="form-group mb-4">
            <label for="telephone">Phone Number</label>
            <input type="text" name="telephone" id="telephone" class="form-control rounded-md w-full text-center p-10">
        </div>

        <div class="form-group mb-4">
            <label for="bank_account_number">Bank Account Number</label>
            <input type="text" name="bank_account_number" id="bank_account_number" class="form-control rounded-md w-full text-center p-10">
        </div>

        <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-app-layout>



