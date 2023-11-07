<x-app-layout>




<form method="post" action="{{ route('foodCategories.store') }}">
    @csrf

    <input type="text" name="name">
    @error('name')
    {{ $message }}
    @enderror
    <input type="submit">


</form>

</x-app-layout>

