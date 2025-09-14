<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Brands List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-200 py-10 px-2">
        <h1 class="text-4xl font-extrabold text-center text-blue-900 mb-10 drop-shadow">Top Brands</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach ($brands as $brand)
                <div class="flex flex-col items-center bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition duration-200 border border-blue-100">
                    <img src="{{ $brand->brand_image }}" alt="{{ $brand->brand_name }}" class="w-24 h-24 object-contain rounded-lg mb-4 border border-gray-200 bg-white" />
                    <div class="w-full text-center">
                        <div class="font-bold text-blue-800 text-xl mb-2">{{ $brand->brand_name }}</div>
                        <div class="flex items-center justify-center gap-1 mt-1">
                            @php
                                $fullStars = floor($brand->rating);
                                $halfStar = ($brand->rating - $fullStars) >= 0.5 ? true : false;
                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                            @endphp
                            @for ($i = 0; $i < $fullStars; $i++)
                                <i class="ri-star-fill text-yellow-400 text-2xl"></i>
                            @endfor
                            @if ($halfStar)
                                <i class="ri-star-half-fill text-yellow-400 text-2xl"></i>
                            @endif
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <i class="ri-star-line text-gray-300 text-2xl"></i>
                            @endfor
                            <span class="ml-2 text-base text-gray-600">{{ $brand->rating }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
