@extends('client.master')
@section('title', 'Moonstore')
@section('content')

<div class="container margin-t-100">
    <div class="row">
        <div id="column-left" class="col-sm-3 hidden-xs column-left">
            <div class="Categories left-sidebar-widget">
                <div class="columnblock-title">Dòng sản phẩm nổi bật</div>
                <div class="category_block">
                    <ul class="box-category treeview">
                        @foreach($category as $item)
                        <li><a href="/category/{{$item->id}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="banner left-sidebar-widget">
                <a href="#">
                    <img src="{{asset('client-style/image/banners/leftbanner.jpg')}}" alt="Left Banner"
                        class="img-responsive" />
                </a>
            </div>
            <div class="special left-sidebar-widget">
                <div class="columnblock-title">Sản phẩm nổi bật</div>
                <ul class="row ">
                    @foreach($product_limit as $item)
                    <li class="product-layout">
                        <div class="product-list col-xs-4">
                            <div class="product-thumb">
                                <div class="image product-imageblock">
                                    <a href="#">
                                        <img class="img-responsive" alt="iPod Classic"
                                            src="{{asset('image/product/'.$item->image)}}">
                                        <img class="img-responsive" alt="iPod Classic"
                                            src="{{asset('image/product/'.$item->image)}}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="caption">
                                <h4 class="product-name">
                                    <a title="Product" href="#">{{$item->title}}</a>
                                </h4>
                                <p class="price product-price">
                                    <span class="price-new">${{$item->price}}.00</span>
                                </p>
                                <div class="addto-cart">
                                    <a class="latest-checkout" 
                                        href="/product/{{$item->id}}">
                                        Xem ngay
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class=" content col-sm-9">
            <div class="category-page-wrapper">
                <form action="/category/sort" method="get">
                    @csrf
                    <div class="col-md-2 text-right sort-wrapper">
                        <label class="control-label" for="input-sort">Sắp xếp :</label>
                        <div class="sort-inner">
                            <select id="input-sort" name="sort" class="form-control min-w-150">
                                <option value="default">Mặc định</option>
                                <option value="name asc">Tên (A - Z)</option>
                                <option value="name desc">Tên (Z - A)</option>
                                <option value="price asc">Giá (Thấp &gt; Cao)</option>
                                <option value="price desc">Giá (Cao &gt; Thấp)</option>
                            </select>
                            <i class="fas fa-caret-down"></i>
                        </div>
                    </div>
                    <div class="col-md-1 text-right page-wrapper">
                        <label class="control-label" for="input-limit">Hiển thị :</label>
                        <div class="limit">
                            <select id="input-limit" name="limit" class="form-control">
                                <option value="8">8</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select>
                            <i class="fas fa-caret-down"></i>
                        </div>
                    </div>
                    <button type="submit" class="refresh-btn">
                        Làm mới
                    </button>
                </form>
            </div>
            <br />
            <div class="grid-list-wrapper">
                @foreach($product as $item)
                <div class="product-layout product-list col-xs-12">
                    <div class="product-thumb">
                        <div class="image product-imageblock">
                            <a href="/product/{{$item->id}}">
                                <img src="{{asset('image/product/'.$item->image)}}" alt="iPod Classic" class="img-responsive"/>
                                <img src="{{asset('image/product/'.$item->image)}}" alt="iPod Classic" class="img-responsive" />
                            </a>
                        </div>
                        <div class="caption">
                            <h4 class="product-name highlight-blue">
                                <a href="/product/{{$item->id}}">{{$item->title}}</a>
                            </h4>
                            <p class="product-category">
                                <a href="#">{{$item->name}}</a>
                            </p>
                            <p class="price product-price">${{$item->price}}.00</p>
                            <p class="product-desc">{{$item->description}}</p>
                            <ul class="button-group list-btn padding-unset">
                                <li>
                                    <button onclick="addCart({{$item->id}})" type="button" class="addtocart-btn">
                                        <i class="fa fa-shopping-bag"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="category-page-wrapper">
                <div class="result-inner">Showing 1 to 8 of 10 (2 Pages)</div>
                <div class="pagination-inner">
                    <ul class="pagination">
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">&gt;</a></li>
                        <li><a href="#">&gt;|</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection