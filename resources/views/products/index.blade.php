<x-layout>

    @include('partials._hero')
    @include('partials._search')

    <x-card>
        @unless(count($products) == 0)
            @foreach($products as $product)
                <x-product-card :product="$product"></x-product-card>
            @endforeach
        @else
            <p>No products found</p>
        @endunless
        <div class="mt-6 p-4">
            {{$products->links()}}
        </div>
    </x-card>

    {{--    <div class="container mx-auto p-4">--}}
    {{--        <h1 class="text-2xl font-bold mb-4">Product List</h1>--}}

    {{--        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">--}}
    {{--            <!-- Loop through products -->--}}
    {{--            @foreach ($products as $product)--}}
    {{--                <div class="bg-white shadow-md rounded-lg p-4">--}}
    {{--                    <h2 class="text-lg font-bold mb-2">{{ $product->name }}</h2>--}}
    {{--                    <p class="text-gray-600">{{ $product->description }}</p>--}}
    {{--                    <p class="text-gray-800 mt-2">${{ $product->price }}</p>--}}
    {{--                </div>--}}
    {{--            @endforeach--}}
    {{--        </div>--}}
    {{--    </div>--}}



</x-layout>
