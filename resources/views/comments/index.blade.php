<x-app-layout>

    <x-slot name="header">
        <h1 class="text-2xl font-semibold leading-tight">Comments for Carts</h1>
    </x-slot>

    @foreach($carts as $cart)
        @if($cart->comments->isNotEmpty())
            <div class="mt-8">
                <h2 class="text-xl font-semibold">{{ __('Comments for Cart ID') }}: {{ $cart->id }}</h2>
                <div class="mt-4 space-y-4">
                    @foreach($cart->comments as $comment)
                        <div class="border p-4 rounded">
                            <p class="mb-2">{{ $comment->content }}</p>

                            {{-- Reply Form --}}
                            <form method="post" action="{{ route('comments.reply',  $comment->id) }}">
                                @csrf
                                <div class="mt-2">
                                    <label for="reply" class="block text-sm font-medium text-gray-600">Reply:</label>
                                    <input type="text" class="mt-1 p-2 border rounded-md w-full" id="reply" name="reply" required>
                                </div>
                                <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-md">Add Reply</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach

</x-app-layout>
