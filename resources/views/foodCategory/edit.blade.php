<x-app-layout>




<form method="post" action="{{ route('foodCategories.update', $category) }}">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $category->name }}">
    <input type="submit">

</form>
</x-app-layout>

