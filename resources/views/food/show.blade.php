<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

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
                <a href="{{ route('foods.edit', $food) }}" class="ml-4">
                    <x-primary-button
                        class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 m-2  rounded">
                        {{ __('Edit') }}
                    </x-primary-button>
                </a>
            </div>
        </tr>

    @endforeach

</table>

<a href="{{ route('foods.create') }}" class="ml-4">
    <x-primary-button
        class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 m-2  rounded">
        {{ __('Create Food') }}
    </x-primary-button>
</a>

</body>
</html>
