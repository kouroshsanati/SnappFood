<x-app-layout>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Materials</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Action</th>
            <th>Action</th>
        </tr>

        @foreach($foods as $food)
            <tr>
                <td>{{ $food->id }}</td>
                <td>{{ $food->name }}</td>
                <td>{{ $food->materials }}</td>
                <td>{{ $food->price }}</td>
                <td>{{ $food->discount }}</td>
                <td>
                    <div class="flex mt-4">
                        <form action="{{ route('foods.destroy', $food) }}"
                              method="post">
                            @csrf
                            @method("DELETE")
                            <x-primary-button
                                class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 m-2  rounded">
                                {{ __('Delete') }}
                            </x-primary-button>
                        </form>
                    </div>
                </td>
                <td>
                    <div class="flex mt-4">


                        <a href="{{ route('foods.edit', $food) }}" class="ml-4">
                            <x-primary-button
                                class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 m-2  rounded">
                                {{ __('Edit') }}
                            </x-primary-button>
                        </a>
                    </div>
                </td>


            </tr>
        @endforeach

            <form >
                {{--sort bt name--}}
                <label for="name">sort by name</label>
                <select name="name">

                    <option value="asc">Asc</option>
                    <option value="desc">Desc</option>

                </select>
                <input type="submit" name="submit">

            </form>
            <form>

                {{--Filter by Category--}}
                <label for="category">Filter by Category</label>

                <select name="category" id="category">
                    @foreach($foodCategory as $food)
                        <option value="{{ $food->id }}">{{ $food->name }}</option>
                    @endforeach
                </select>
                <input type="submit" name="submit">


            </form>






    </table>

    <a href="{{ route('foods.create') }}" class="ml-4">
        <x-primary-button
            class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 m-2  rounded">
            {{ __('Create Food') }}
        </x-primary-button>
    </a>


</x-app-layout>
