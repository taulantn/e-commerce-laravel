@extends('layouts.frontend')

@section('content')
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            
            <div class="row">
            <div class="section-title" style="margin-left:40%;">
                        <h2>Categories</h2>
                    </div>
                <div class="categories__slider owl-carousel">
                    
                @foreach($menu_categories as $menu_category)    
                <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ $menu_category->photo->getUrl() }}">
                            <h5><a href="{{ route('shop.index', $menu_category->slug) }}">{{$menu_category->name}}</a></h5>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter" id="product-list">
                
                
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
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
        </div>
    </div>
    <!-- Banner End -->


   
    @endsection

    
    