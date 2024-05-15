<div class="row product-row  mt-5 mb-5  ">
    @yield('titles')
    <hr>
    <div class="product-card">
        @foreach ($products as $product)
            <products class="card">
                <a href="{{ route('view.product', $product->id) }}">
                    <img src="{{ url('storage/products/' . $product->file) }}" class="card-img-top" style="height: 150px">
                </a>
                <product class="body px-3 mb-3">
                    <productname>
                        <p><b>{{ $product->name }}</b></p>
                    </productname>
                    <price class="span">
                        <span>
                            @php
                                $convert = (string) $product->price; // convert into a string
                                $convert = strrev($convert); // reverse string
                                $arr = str_split($convert, '3'); // break string in 3 character sets
                                $converted = implode(',', $arr); // implode array with comma
                                $converted = strrev($converted); // reverse string back
                            @endphp
                            <i class="fa-solid fa-peso-sign"></i> {{ $converted }}.00</span>
                    </price>
                </product>
            </products>
        @endforeach
    </div>
</div>
