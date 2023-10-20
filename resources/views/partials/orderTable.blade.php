<table class="w-full text-sm text-left text-gray-500 ">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
        <tr>

            <th scope="col" class="px-6 py-3">
                Product name
            </th>
            <th scope="col" class="px-6 py-3">
                Price
            </th>
            <th scope="col" class="px-6 py-3">
                Quantity
            </th>
            <th scope="col" class="px-6 py-3">
                Category
            </th>
            <th scope="col" class="px-6 py-3">
                Total Price
            </th>
            <th scope="col" class="px-6 py-3">
                Order Date
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($orders as $order)
        <tr class="bg-white border-b hover:bg-gray-50 ">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                @foreach(json_decode($order->cartInfo, true) as $item)
                    @php
                        $product = \App\Models\Product::find($item['product_id']);
                        $box = \App\Models\Box::find($item['box_id']);
                    @endphp
            
                    @if($box)
                        <div>
                            {{ $box->cheap_libelle }}
                        </div>
                    @endif
                    @if($product)
                        <div>{{ $product->nom }}</div>
                    @endif
                @endforeach
            </th>
            
            <td class="px-6 py-4">
                @foreach(json_decode($order->cartInfo, true) as $item)
                    @php
                        $product = \App\Models\Product::find($item['product_id']);
                        $box = \App\Models\Box::find($item['box_id']);
                    @endphp
                    @if($box)
                        <div>
                        @if($item['box_option'] == 'cheap')
                            ${{ $box->cheap_price }}
                        @elseif ($item['box_option'] == 'mid')
                            ${{ $box->med_price }}
                        @elseif ($item['box_option'] == 'expensive')
                            ${{ $box->exp_price }}
                        @endif
                        </div>
                    @endif
                    @if($product)
                        <div>${{ $product->prix }}</div>
                    @endif
                @endforeach

            </td>
            <!-- Add the rest of the columns as needed -->
            <td class="px-6 py-4">
                @foreach(json_decode($order->cartInfo, true) as $item)
                    {{ $item['quantity'] }}<br />
                @endforeach
            </td>
            <!-- Add other columns as needed -->
            <td class="px-6 py-4">
                @foreach(json_decode($order->cartInfo, true) as $item)
                    @php
                        $product = \App\Models\Product::find($item['product_id']);
                        $category = $product ? \App\Models\Categorie::find($product->category_id) : null;
                    @endphp
                    @if($product && $category)
                        <div>{{ $category->name }}</div>
                    @else
                        <div>Boxe du Mois</div>
                    @endif
                @endforeach
            </td>
            
            <!-- Add other columns as needed -->
            <td class="px-6 py-4">
                ${{ $order->total_price }}
            </td>
            <td class="w-32 p-4">
                <div class="flex gap-2">
                    <span
                    class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 w-32 text-xs font-semibold text-gray-600"
                    >
                    {{ date('D jS M Y',strtotime($order->created_at)) }} 
                    </span>
                </div>
            </td>
            <td class="px-6 py-4">
                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
            </td>
            <!-- Add other columns as needed -->
        </tr>
    @empty
    
    @endforelse
    
    </tbody>
</table>