

<h1 class="text-3xl font-bold mb-4">لیست سفارش‌های انجام شده</h1>

@foreach($archivedCarts as $archivedCart)
    <div class="mb-4 p-4 border rounded shadow">
        <!-- نمایش اطلاعات مورد نظر از archivedCart -->
        <p class="mb-2">
            <span class="font-bold">شماره سفارش:</span> {{ $archivedCart->id }}
        </p>
        <p class="mb-2">
            <span class="font-bold">وضعیت:</span> {{ $archivedCart->status }}
        </p>
        <p class="mb-2">
            <span class="font-bold">مجموع قیمت:</span> {{ $archivedCart->price_total }}
        </p>
    </div>
@endforeach
