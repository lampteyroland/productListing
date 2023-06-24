<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Add a Product
            </h2>
            <p class="mb-4">Post a product to find a buyer</p>
        </header>

        <form method="POST" action="/products" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Product Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{old('title')}}"/>

                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="department" class="inline-block text-lg mb-2">Department</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="department" value="{{old('department')}}"/>
                @error('department')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2">Price</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full"  name="price"  value="{{old('price')}}"   />
                @error('price')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" value="{{old('location')}}" />
                @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="manufacture" class="inline-block text-lg mb-2">Manufacturer</label>
                <input
                    type="text" class="border border-gray-200 rounded p-2 w-full" name="manufacture" value="{{old('manufacture')}}" />
                @error('manufacture')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">Tags (Comma Separated)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"  value="{{old('tags')}}"/>
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

                        <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                Company Logo
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="logo"
                            />
                            @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Product Description</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">
                    {{old('description')}}
                </textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Add Product</button>

                <a href="/products" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>
