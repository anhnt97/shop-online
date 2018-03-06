@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản Phẩm {{$product->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trangchu')}}">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <div class="single-item">
                            @if($product->promotion_price != 0)
                                <div class="ribbon-wrapper">
                                    <div class="ribbon sale">Sale</div>
                                </div>
                            @endif
                        </div>
                        <img src="source/image/product/{{$product->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">{{$product->name}}</p>
                            <p class="single-item-price">
                                @if($product->promotion_price != 0)
                                    <span class="flash-del">{{$product->unit_price}}đ</span>
                                    <span class="flash-sale">{{$product->promotion_price}}đ</span>
                                @else
                                    <span class="flash-sale">{{$product->unit_price}}đ</span>
                                @endif
                            </p>
                        </div>


                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$product->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Số lượng:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="color">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="{{route('themgiohang',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                        <li><a href="#tab-reviews">Đánh giá</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                      <p>{{$product->description}}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>Chưa có đánh giá</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm khác</h4>

                    <div class="row">
                        @foreach($other_product as $item_other)
                        <div class="col-sm-4">
                            <div class="single-item">
                                @if($product->promotion_price != 0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                @endif
                                <div class="single-item-header">
                                    <a href="{{route('chitietsanpham',$item_other->id)}}"><img src="source/image/product/{{$item_other->image}}" height="200px" ></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$item_other->name}}</p>
                                    <p class="single-item-price">
                                        @if($product->promotion_price != 0)
                                            <span class="flash-del">{{$product->unit_price}}đ</span>
                                            <span class="flash-sale">{{$product->promotion_price}}đ</span>
                                        @else
                                            <span class="flash-sale">{{$product->unit_price}}đ</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('themgiohang',$item_other->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('chitietsanpham',$item_other->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div>
                        {{$other_product->links()}}
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection