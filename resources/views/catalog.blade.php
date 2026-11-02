@extends('layouts.landing.app')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-3">Catalog Bucket Bunga</h4>

    <div class="row">
        @foreach($products as $product)
        <div class="col-6 col-md-4 mb-3">
            <div class="card product-card shadow-sm">
                <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top">
                <div class="card-body">
                    <h6 class="fw-bold">{{ $product->name }}</h6>
                    <p class="text-success fw-semibold">
                        Rp {{ number_format($product->price,0,',','.') }}
                    </p>

                    <a href="/product/{{ $product->id }}" class="btn btn-outline-success btn-sm w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
