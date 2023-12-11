
<x-app-layout>

    <x-slot name="header">
        <h1 class="text-2xl font-semibold leading-tight">Comments for Carts</h1>
    </x-slot>

    @foreach($carts as $cart)
        <div class="mt-4">
            <h2 class="text-xl font-semibold">{{ __('Comments for Cart ID') }}: {{ $cart->id }}</h2>
            @foreach($cart->comments as $comment)
                <p class="mt-2">{{ $comment->content }}</p>
            @endforeach
        </div>
    @endforeach

</x-app-layout>



