{{-- Login Successfully --}}
@if (session()->has('login'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success ',
            'Logged in Successfully!',
            'success'
        )
    </script>
@endif
{{-- Login Successfully --}}
@if (session()->has('signin'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success ',
            'Created Successfully!',
            'success'
        )
    </script>
@endif
{{-- Logout Successfully --}}
@if (session()->has('logout'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success ',
            'Logged out Successfully!',
            'success'
        )
    </script>
@endif

{{-- Created Product Successfully --}}
@if (session()->has('create_product'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success ',
            'Product Successfully Created!',
            'success'
        )
    </script>
@endif
{{-- Update Product Successfully --}}
@if (session()->has('update_product'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success ',
            'Product Successfully Updated!',
            'success'
        )
    </script>
@endif
@if (session()->has('edit_user'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success ',
            'Account Successfully Updated!',
            'success'
        )
    </script>
@endif
{{-- Archive Product Successfully --}}
@if (session()->has('archive_product'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success ',
            'Product set to archived!',
            'success'
        )
    </script>
@endif

{{-- unArchive Product Successfully --}}
@if (session()->has('unarchive_product'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success ',
            'Product set to unarchived!',
            'success'
        )
    </script>
@endif

{{-- Added to Cart Successfully --}}
@if (session()->has('cart_added'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success ',
            'Product added to cart!',
            'success'
        )
    </script>
@endif

{{-- Already in Cart Successfully --}}
@if (session()->has('cart_exist'))
    <script>
        swalWithBootstrapButtons.fire(
            'Warning',
            'Product already in cart!',
            'warning'
        )
    </script>
@endif

{{-- Update in quantity in Cart Successfully --}}
@if (session()->has('cart_updated'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success',
            'Product quantity updated!',
            'success'
        )
    </script>
@endif

{{-- Remove in Cart Successfully --}}
@if (session()->has('cart_remove'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success',
            'Product removed in cart!',
            'success'
        )
    </script>
@endif

{{-- Checkout in Cart Successfully --}}
@if (session()->has('checkout'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success',
            'Receipt sent Successfully',
            'success'
        )
    </script>
@endif

{{-- Completed Successfully --}}
@if (session()->has('completed'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success',
            'Order Received Successfully!',
            'success'
        )
    </script>
@endif

{{-- Delivery Inserted Successfully --}}
@if (session()->has('delivery_inserted'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success',
            'Delivery Received Successfully!',
            'success'
        )
    </script>
@endif

{{-- Delivery Inserted Successfully --}}
@if (session()->has('low_stocks'))
    <script>
        swalWithBootstrapButtons.fire(
            'Sorry',
            'Product is out of stocks!',
            'warning'
        )
    </script>
@endif

{{-- Order Received Successfully --}}
@if (session()->has('to_received'))
    <script>
        swalWithBootstrapButtons.fire(
            'Confirmed',
            'Order confirmed Successfully!',
            'success'
        )
    </script>
@endif

{{-- Order Declined Successfully --}}
@if (session()->has('to_declined'))
    <script>
        swalWithBootstrapButtons.fire(
            'Declined',
            'Order Declined Successfully!',
            'success'
        )
    </script>
@endif

{{-- Old Password is not correct  --}}
@if (session()->has('old_password'))
    <script>
        swalWithBootstrapButtons.fire(
            'Sorry',
            'Old password is Incorrect!',
            'error'
        )
    </script>
@endif

{{-- Old Password is Correct  --}}
@if (session()->has('change_password'))
    <script>
        swalWithBootstrapButtons.fire(
            'Success',
            'Password has been changed Successfully!',
            'success'
        )
    </script>
@endif
