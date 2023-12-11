<x-app-layout>



    <!-- resources/views/carts/index.blade.php -->

    <h1 class="text-3xl font-bold mb-4">لیست سبد خریدها</h1>

    @foreach($carts as $cart)
        <div class="bg-white shadow-md rounded p-4 mb-4">
            <p class="mb-2">
                <span class="font-bold">شماره سفارش:</span> {{ $cart->id }}
            </p>
            <p class="mb-2">
                <span class="font-bold">وضعیت:</span> {{ $cart->status }}
            </p>
            <p class="mb-2">
                <span class="font-bold">مجموع قیمت:</span> {{ $cart->price_total }}
            </p>

        <table class="my-4">
            <thead>
            <tr>
                <th>id</th>
                <th>Customer</th>
                <th>status</th>
                <th>Foods</th>
                <th>Total Price</th>
                <th>date</th>

                <th>operation</th>

            </tr>
            </thead>

            <tbody>
            @foreach($orders as $key => $order)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        @if($order->status === 'InProgress')
                            <span class="text-blue-800">in progress</span>
                        @elseif($order->status === 'preparing')
                            <span class="text-blue-800">preparing</span>
                        @elseif($order->status === 'send')
                            <span class="text-blue-800">send</span>
                        @elseif($order->status === 'delivered')
                            <span class="text-blue-800">delivered</span>
                        @endif
                    </td>
                    <td>
                        @foreach($order->foods as $food)
                        {{ $food->name }}

                        @endforeach
                    </td>
                    <td>
                        {{ $order->price_total }}
                    </td>
                    <td>{{ persianDate($order->created_at) }}</td>

                    <td>
                        <a href="#" type="button" class="btn-grad-red">Delete</a>
                    </td>



                </tr>


            @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $orders->links() }}

            <form method="post" action="{{ route('carts.updateStatus', ['cartId' => $cart->id]) }}" class="mb-2">
                @csrf
                @method('patch')

                <div class="flex items-center">
                    <label for="status" class="mr-2">تغییر وضعیت به:</label>
                    <select name="status" id="status" class="p-2 border rounded">
                        <option value="InProgress">InProgress</option>
                        <option value="preparing">preparing</option>
                        <option value="send">send</option>
                        <option value="delivered">delivered</option>
                    </select>

                    <button type="submit" class="bg-blue-500 text-white p-2 rounded ml-2">ذخیره تغییرات</button>
                </div>
            </form>

        </div>
    @endforeach



</x-app-layout>
