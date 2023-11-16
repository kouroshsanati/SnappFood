<x-app-layout>
    <x-slot name="header">
        <h2>
            order list
        </h2>
    </x-slot>


    @if($orders->count())
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            .btn-grad-gray {
                background-image: linear-gradient(to right, #000000 0%, #434343  51%, #000000  100%);
                margin: 10px;
                padding: 15px;
                text-align: center;
                text-transform: uppercase;
                transition: 0.5s;
                background-size: 100% auto;
                color: white;
                box-shadow: 0 0 20px #eee;
                border-radius: 10px;
                display: block;
            }

            .btn-grad-red {
                background-image: linear-gradient(to right, #D31027 0%, #EA384D  51%, #D31027  100%);
                margin: 10px;
                padding: 15px;
                text-align: center;
                text-transform: uppercase;
                transition: 0.5s;
                background-size: 100% auto;
                color: white;
                box-shadow: 0 0 20px #eee;
                border-radius: 10px;
                display: block;
            }

        </style>

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
        </div>
    @endif


</x-app-layout>
