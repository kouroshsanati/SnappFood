<x-app-layout>

    <div class="container mt-4 mx-auto text-center">
        <h1 class="mb-4">Reports</h1>

        <div class="mb-4">
            <p class="lead">Total Orders: {{ count($reports) }}</p>
            <p class="lead">Total Price: {{ $reports->sum('price_total') }}</p>
        </div>

        <div class="table-responsive mx-auto my-5 p-6 bg-gray-200 w-full">
            <table class="table table-bordered table-striped text-center mx-auto">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Food Name</th>
                    <th scope="col">Quantity</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->user_name }}</td>
                        <td>{{ $report->price_total }}</td>
                        <td>{{ $report->food_name }}</td>
                        <td>{{ $report->count }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>

</x-app-layout>
