<div class="row product-row  mt-5 mb-5  ">

    @yield('titles')
    <div class="col-md-12 ">
        <div class="text-end">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle rounded-0" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Price Range
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('index') }}">----Lowest to Highest----</a></li>
                    <li><a class="dropdown-item" href="{{ route('highestPrice') }}">----Highest to Lowest----</a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="product-card">
        @if (count($products) > 0)
            @foreach ($products as $product)
                <products class="card">
                    <a href="{{ route('view.product', $product->id) }}">
                        <img src="{{ url('storage/products/' . $product->file) }}" class="card-img-top"
                            style="height: 220px">
                    </a>
                    <product class="body px-3 mb-4">
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
        @else
            <h3 class="text-muted">No Products Available!</h3>
        @endif
    </div>
</div>
