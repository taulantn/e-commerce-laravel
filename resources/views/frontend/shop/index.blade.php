@extends('layouts.frontend')

@section('content')

   <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('homepage')}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                @foreach($menu_categories as $menu_category)
                                <li>
                                    <a href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a>
                                    <ul>
                                        @foreach($menu_category->children as $children)
                                        <li class="mx-2"><a style="color: #b4b4b4; " href="{{ route('shop.index', $children->slug) }}">{{ $children->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Tags</h4>
                            @foreach($menu_tags as $menu_tag)
                            <div class="sidebar__item__size">
                                <label for="large">
                                    <a href="{{ route('shop.tag', $menu_tag->slug) }}">{{ $menu_tag-> name}}</a>
                                </label>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <form method="get">
                                    <div class="filter__sort">
                                        <span>Sort By</span>
                                        <select name="sortingBy" onchange="this.form.submit()">
                                            <option {{ $sorting === 'default' ? 'selected' : null }} value="default">Default</option>
                                            <option {{ $sorting === 'popularity' ? 'selected' : null }} value="popularity">Popularity</option>
                                            <option {{ $sorting === 'low-high' ? 'selected' : null }} value="low-high">Low High</option>
                                            <option {{ $sorting === 'high-low' ? 'selected' : null }} value="high-low">High Low</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{$products->total()}}</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ $product->gallery->first()->getUrl() }}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{ route('product.show', $product->slug) }}">{{$product->name}}</a></h6>
                                    <h5>${{$product->price}}</h5>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col">
                            <h5 class="text-center">Product Empty</h5>
                        </div>
                        @endforelse
                    </div>
                    <div class="f-flex justify-content-center">
                        {{ $products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection