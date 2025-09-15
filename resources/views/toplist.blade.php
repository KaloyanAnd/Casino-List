<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Brands List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons/css/flag-icons.min.css">

</head>

<body>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-10 px-4">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-extrabold text-center text-blue-900 mb-10 drop-shadow">
                Top Brands
            </h1>

            <ul class="space-y-2">
                @foreach ($brands as $index => $brand)
                    <li
                        class="grid grid-cols-[60px_160px_1fr_250px] gap-4 items-center bg-white rounded-xl shadow-sm p-3 hover:shadow-md transition duration-300">

                        <!-- Rank -->
                        <div
                            class="flex items-center justify-center font-bold text-lg text-white bg-blue-500 rounded-lg h-12 w-12">
                            {{ $index + 1 }}
                        </div>

                        <!-- Logo -->
                        <div class="w-40 h-40 flex items-center justify-center">
                            <img src="{{ $brand->brand_image }}" alt="{{ $brand->brand_name }}"
                                class="max-w-full max-h-full object-contain" />
                        </div>

                        <!-- Brand name -->
                        <div class="flex items-center space-x-2">
                            <span class="fi fi-{{ $brand->country_code }} w-6 h-4"></span>
                            <span class="text-blue-800 font-bold text-2xl">{{ $brand->brand_name }}</span>
                        </div>

                        <!-- Stars + rating -->
                        <div class="flex items-center space-x-2">
                            <span
                                class="ml-2 text-gray-700 text-xl font-bold">{{ number_format($brand->rating, 1) }}</span>
                            @php
                                $fullStars = floor($brand->rating);
                                $halfStar = $brand->rating - $fullStars >= 0.5;
                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                            @endphp

                            @for ($i = 0; $i < $fullStars; $i++)
                                <i class="ri-star-fill text-yellow-400 text-3xl"></i>
                            @endfor
                            @if ($halfStar)
                                <i class="ri-star-half-fill text-yellow-400 text-3xl"></i>
                            @endif
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <i class="ri-star-line text-gray-300 text-3xl"></i>
                            @endfor

                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
