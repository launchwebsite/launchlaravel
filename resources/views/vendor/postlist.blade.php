@extends('vendor-layout.app')
@section('content')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
          <div class="container">

    <h3>My Posts</h3>

    @if($products->count() > 0)

        @foreach($products as $product)

            <div class="card mb-3">
                <div class="card-body">

                    <h5>Product ID: {{ $product->PR_Id }}</h5>

                    <p>
                        Vendor ID:
                        {{ $product->VR_Id }}
                    </p>

                    <p>
                        Category ID:
                        {{ $product->CT_Id }}
                    </p>

                    <p>
                        Sub Category ID:
                        {{ $product->SC_Id }}
                    </p>

                    <pre>{{ json_encode($product->PR_Details, JSON_PRETTY_PRINT) }}</pre>

                </div>
            </div>

        @endforeach

    @else

        <div class="alert alert-info">
            You have not posted any products yet.
        </div>

    @endif

</div>



            @include('vendor.footer')

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
@endsection
