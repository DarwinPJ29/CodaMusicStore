<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center">Coda Music Store</h1>
    <p class="text-end"><b>Report Date:</b> <span>{{ date('F d, Y') }}</span></p>
    {{-- Table of Report --}}
    <table class="table table-hover  table-md table-striped table-bordered " id="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Code</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Sold</th>
                <th scope="col">Revenue</th>
                <th scope="col">Expenditures</th>
                <th scope="col">Profit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product_array as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        @php
                            $convert = (string) $product->price; // convert into a string
                            $convert = strrev($convert); // reverse string
                            $arr = str_split($convert, '3'); // break string in 3 character sets
                            $converted = implode(',', $arr); // implode array with comma
                            $converted = strrev($converted); // reverse string back
                        @endphp
                        <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                    </td>
                    <td>
                        @php
                            $convert = (string) $product->quantity; // convert into a string
                            $convert = strrev($convert); // reverse string
                            $arr = str_split($convert, '3'); // break string in 3 character sets
                            $converted = implode(',', $arr); // implode array with comma
                            $converted = strrev($converted); // reverse string back
                        @endphp
                        {{ $converted }}
                    </td>
                    <td>
                        @php
                            $convert = (string) $product->amount; // convert into a string
                            $convert = strrev($convert); // reverse string
                            $arr = str_split($convert, '3'); // break string in 3 character sets
                            $converted = implode(',', $arr); // implode array with comma
                            $converted = strrev($converted); // reverse string back
                        @endphp
                        <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                    </td>
                    <td>
                        @php
                            $convert = (string) $product->amount_bundle; // convert into a string
                            $convert = strrev($convert); // reverse string
                            $arr = str_split($convert, '3'); // break string in 3 character sets
                            $converted = implode(',', $arr); // implode array with comma
                            $converted = strrev($converted); // reverse string back
                        @endphp
                        <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                    </td>
                    <td>
                        @php
                            $profit = $product->amount - $product->amount_bundle;
                            $convert = (string) $profit; // convert into a string
                            $convert = strrev($convert); // reverse string
                            $arr = str_split($convert, '3'); // break string in 3 character sets
                            $converted = implode(',', $arr); // implode array with comma
                            $converted = strrev($converted); // reverse string back

                            $string = 'Net Income';
                            if ($converted < 1) {
                                $string = 'Net Loss';
                            }
                        @endphp
                        <p><span
                                class="Text-muted {{ $converted < 1 ? 'text-danger' : 'text-success' }}">{{ $string }}</span>
                            <br>
                            <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                        </p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="div" style="text-align:right">
        <p><b>Total Expenditures : </b>
            <span>
                @php
                    $convert = (string) $expenditures; // convert into a string
                    $convert = strrev($convert); // reverse string
                    $arr = str_split($convert, '3'); // break string in 3 character sets
                    $converted = implode(',', $arr); // implode array with comma
                    $converted = strrev($converted); // reverse string back
                @endphp
                <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
            </span> <br>
            <b>Total Revenues : </b>
            <span>
                @php
                    $convert = (string) $revenues; // convert into a string
                    $convert = strrev($convert); // reverse string
                    $arr = str_split($convert, '3'); // break string in 3 character sets
                    $converted = implode(',', $arr); // implode array with comma
                    $converted = strrev($converted); // reverse string back
                @endphp
                <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
            </span> <br>
            <b>Total Profit : </b>
            <span class="{{ $revenues - $expenditures < 1 ? 'text-danger' : '' }}">
                @php
                    $convert = (string) $revenues - $expenditures; // convert into a string
                    $convert = strrev($convert); // reverse string
                    $arr = str_split($convert, '3'); // break string in 3 character sets
                    $converted = implode(',', $arr); // implode array with comma
                    $converted = strrev($converted); // reverse string back
                @endphp
                <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
            </span>
        </p>
    </div>
</body>

</html>
