<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a><i class="fa fa-home"></i> 144 Xuân Thủy, Cầu Giấy, Hà Nội</a></li>
                    <li><a><i class="fa fa-phone"></i> 0961706497</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                        <li><a href="{{route('dangnhap')}}">Chào bạn {{Auth::user()->full_name}}</a></li>
                        <li><a href="{{route('dangxuat')}}">Đăng xuất</a></li>
                    @else
                        <li><a href="{{route('dangki')}}">Đăng kí</a></li>
                        <li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('trangchu')}}" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    @if(Session::has('cart'))
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (
                        @if(Session::has('cart'))
                         {{ Session('cart')->totalQty}}
                        @else
                            Trống
                        @endif
                            )
                            <i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                                @foreach($product_cart as $product_item)
                                    <div class="cart-item">
                                        <a class="cart-item-delete" href="{{route('xoakhoigiohang',$product_item['item']['id'])}}"><i class="fa fa-times"></i></a>
                                        <div class="media">
                                            <a class="pull-left" href="#"><img src="source/image/product/{{$product_item['item']['image']}}" alt=""></a>
                                            <div class="media-body">
                                                <span class="cart-item-title">{{$product_item['item']['name']}}</span>
                                                @if($product_item['item']['promotion_price'] == 0)
                                                    <span class="cart-item-amount">Số lượng: {{$product_item['qty']}}</span>
                                                    <span>Giá: {{$product_item['item']['unit_price']}} VND</span>
                                                @else
                                                    <span class="cart-item-amount">Số lượng: {{$product_item['qty']}}</span>
                                                    <span>Giá: {{$product_item['item']['promotion_price']}} VND</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session('cart')->totalPrice}} VND</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .cart -->
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('trangchu')}}">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($type_product as $type_item)
                                <li><a href="{{route('loaisanpham',$type_item->id)}}">{{$type_item->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                    <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->