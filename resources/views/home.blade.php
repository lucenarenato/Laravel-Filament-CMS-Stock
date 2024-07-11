<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="mb-4 text-4xl text-center">Featured Posts</h1>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                @foreach($posts as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="mb-4 text-4xl text-center">Produtos</h1>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                @foreach($products as $product)
                   <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
