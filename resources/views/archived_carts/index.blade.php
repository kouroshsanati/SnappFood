<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="bg-gray-200 p-6 rounded-lg mb-6">
            <h2 class="text-3xl font-bold mb-6">لیست سفارش‌های ارشیو شده</h2>

            @if($archivedCarts->isEmpty())
                <p class="text-gray-600">هیچ سفارش ارشیو شده‌ای وجود ندارد.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border shadow-md">
                        <thead>
                        <tr>
                            <th class="py-3 px-6 border-b">شماره سفارش</th>
                            <th class="py-3 px-6 border-b">نام مشتری</th>
                            <th class="py-3 px-6 border-b">وضعیت</th>
                            <th class="py-3 px-6 border-b">تاریخ ایجاد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($archivedCarts as $archivedCart)
                            <tr class="hover:bg-gray-100">
                                <td class="py-3 px-6 border-b">{{ $archivedCart->id }}</td>
                                <td class="py-3 px-6 border-b">{{ $archivedCart->user->name}}</td>
                                <td class="py-3 px-6 border-b">{{ $archivedCart->status }}</td>
                                <td class="py-3 px-6 border-b">{{ $archivedCart->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
