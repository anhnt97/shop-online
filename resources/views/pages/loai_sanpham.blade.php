@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$type_name->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trangchu')}}">Trang chủ</a> / <span>Sản phẩm {{$type_name->name}}</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($type_product)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($type_product as $type_item)
                            <div class="col-sm-3" style="padding-bottom: 15px">
                                <div class="single-item">
                                    @if($type_item->promotion_price != 0)
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon sale">Sale</div>
                                        </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsanpham',$type_item->id)}}"><img src="source/image/product/{{$type_item->image}}" height="250px" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$type_item->name}}</p>
                                        <p class="single-item-price">
                                            @if($type_item->promotion_price != 0)
                                                <span class="flash-del">{{$type_item->unit_price}}đ</span>
                                                <span class="flash-sale">{{$type_item->promotion_price}}đ</span>
                                            @else
                                                <span class="flash-sale">{{$type_item->unit_price}}đ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$type_item->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsanpham',$type_item->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                           @endforeach
                        </div>
                        <div class="row">
                            {{$type_product->links()}}
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khác</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($other_type)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($other_type as $other_item)
                                <div class="col-sm-3" style="padding-bottom: 15px">
                                    <div class="single-item">
                                        @if($other_item->promotion_price != 0)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon sale">Sale</div>
                                            </div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('chitietsanpham',$other_item->id)}}"><img src="source/image/product/{{$other_item->image}}" height="250px" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$other_item->name}}</p>
                                            <p class="single-item-price">
                                                @if($other_item->promotion_price != 0)
                                                    <span class="flash-del">{{$other_item->unit_price}}đ</span>
                                                    <span class="flash-sale">{{$other_item->promotion_price}}đ</span>
                                                @else
                                                    <span class="flash-sale">{{$other_item->unit_price}}đ</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{route('themgiohang',$other_item->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('chitietsanpham',$other_item->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            {{$other_type->links()}}
                        </div>
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection