<main class="pt-8 pb-16 antialiased bg-white lg:pt-16 lg:pb-24 dark:bg-gray-900">
    <div class="flex justify-between max-w-screen-xl px-4 mx-auto ">
        <div class="container px-4 mx-auto">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div wire:ignore>
                    @if (count($product->getMedia()) > 1)
                        <x-gallery :media="$product->getMedia()"/>
                    @else
                        <img src="{{ $product->getFirstMediaUrl() }}" alt="{{ $product->meta_description }}"/>
                    @endif
                </div>
                <div>
                    <div class="mt-10">
                        <h2 class="mb-3 text-2xl font-bold">
                            {{ $product->title }}
                        </h2>

                        {!! tiptap_converter()->asHTML($product->content) !!}
                    </div>
                    <div>
                        @if ($product->variations->count() > 0)
                            <livewire:variant-selector :product="$product"/>
                        @endif
                        @if ($finalVariantId)
                            <x-button wire:click="addToCart">
                                Pay {{ money($product->price) }}
                            </x-button>
                        @elseif($product->variations->count() === 0)
                            <x-button wire:click="addToCart">
                                Pay {{ money($product->price) }}
                            </x-button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
