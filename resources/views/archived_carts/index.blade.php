<x-app-layout>


    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">لیست سفارش‌های ارشیو شده</h2>

        @if($archivedCarts->isEmpty())
            <p class="text-gray-600">هیچ سفارش ارشیو شده‌ای وجود ندارد.</p>
        @else
            <table class="min-w-full border bg-white shadow-md">
                <thead>
                <tr>
                    <th class="border p-2">شماره سفارش</th>
                    <th class="border p-2"> اسم</th>
                    <th class="border p-2">وضعیت</th>
                    <th class="border p-2">تاریخ ایجاد</th>
                </tr>
                </thead>
                <tbody>
                @foreach($archivedCarts as $archivedCart)

                    <tr>
                        <td class="border p-2">{{ $archivedCart->id }}</td>
                        <td class="border p-2">{{ $archivedCart->user->name}}</td>
                        <td class="border p-2">{{ $archivedCart->status }}</td>
                        <td class="border p-2">{{ $archivedCart->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>



</x-app-layout>
