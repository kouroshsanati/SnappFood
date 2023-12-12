<x-app-layout>
    <div class="container">
        <h1>Reports</h1>

        <div class="mb-4">
            <p>Total Orders: {{ count($reports) }}</p>
            <p>Total Price: {{ $reports->sum('price_total') }}</p>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>User Name</th>
                <th>Total Price</th>
                <th>Food Name</th>
                <th>Quantity</th>
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
</x-app-layout>
