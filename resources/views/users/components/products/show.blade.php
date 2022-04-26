@extends('users.layout.index')

@section('title', $product->name )

@section('content')

    <div class="container" style="padding: 100px 0 0  0">
        <div class="content-header mb-5">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $product->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $product->name }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row">
            <div class="col-md-4">
                {{ Html::image('images/products/' . $product->image, 'img', ['class' => 'card-img-top']) }}
            </div>
            <div class="col-md-6 offset-md-2">
                <h2>{{ $product->name }}</h2>
                @if($product->productCampaigns()->where('status', 'active')->first() != null)
                    <h4 class="card-text">{{ $product->countDiscount() }} SAR
                        <span
                            class="text-danger text-decoration-line-through h6">{{ $product->price }} SAR</span>
                    </h4>
                @else
                    <h4 class="card-text">{{ $product->price }} SAR</h4>
                @endif

                <hr class="featurette-divider">

                <p class="card-text">{{ $product->description }}</p>

                <div class="card mb-5">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="row mb-5 mt-5">
                        <livewire:user.product.add-to-cart :wire:key="$product->id" :productId="$product->id"/>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
