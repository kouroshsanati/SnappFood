<x-app-layout>

    <x-slot name="header">
        <h1 class="text-2xl font-semibold leading-tight">Comments for Carts</h1>
    </x-slot>

    @foreach($carts as $cart)
        @if($cart->comments->isNotEmpty())
            <div class="mt-4">
                <h2 class="text-xl font-semibold">{{ __('Comments for Cart ID') }}: {{ $cart->id }}</h2>
                @foreach($cart->comments as $comment)
                    <p class="mt-2">{{ $comment->content }}</p>

                    {{-- Reply Form --}}
                    <form method="post" action="{{ route('comments.reply',  $comment->id) }}" class="mt-2">
                        @csrf
                        <div class="mb-3">
                            <label for="reply" class="form-label">Reply:</label>
                            <input type="text" class="form-control" id="reply" name="reply" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Reply</button>
                    </form>
                @endforeach
            </div>
        @endif
    @endforeach



</x-app-layout>




