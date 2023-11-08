<x-app-layout>




<form method="post" action="{{ route('restaurantCategories.store') }}">
@csrf

    <input type="text" name="name">
    <input type="submit">


</form>

</x-app-layout>
