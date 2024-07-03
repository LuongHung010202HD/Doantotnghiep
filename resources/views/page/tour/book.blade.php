@extends('page.layouts.page')
@section('title', 'Đặt tour')
@section('style')
@stop
@section('seo')
@stop
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('/page/images/bg_1.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('page.home') }}">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Tours <i class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Đặt Tour</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pb contact-section mb-4">
        <div class="container">
            <div class="row d-flex contact-info">
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <h3 class="mb-2">Địa chỉ</h3>
                        <p>Số 3, Cầu Giấy, Hà Nội</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <h3 class="mb-2">Số điện thoại liên hệ</h3>
                        <p><a href="tel://1234567920">0123456789</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                        </div>
                        <h3 class="mb-2">Địa chỉ email</h3>
                        <p><a href="mailto:info@yoursite.com">luonghung@gmail.com</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-globe"></span>
                        </div>
                        <h3 class="mb-2">Website</h3>
                        <p><a href="#">http://lqhtravel.xyz</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section contact-section ftco-no-pt">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 order-md-last">
                    <p></p>
                    <form onsubmit="return confirm('Xác nhận đặt Tour')" action="{{ route('post.book.tour', $tour->id) }}" method="POST" class="bg-light p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label">Họ và tên <sup class="text-danger">(*)</sup></label>
                            <input type="text" name="b_name" value="{{ old('b_name', isset($user) ? $user->name : '') }}" class="form-control" placeholder="Họ và tên">
                            @if ($errors->first('b_name'))
                                <span class="text-danger">{{ $errors->first('b_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label">Email <sup class="text-danger">(*)</sup></label>
                            <input type="text" name="b_email" value="{{ old('b_email', isset($user) ? $user->email : '') }}" class="form-control" placeholder="Email">
                            @if ($errors->first('b_email'))
                                <span class="text-danger">{{ $errors->first('b_email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label">Số điện thoại <sup class="text-danger">(*)</sup></label>
                            <input type="text" name="b_phone" value="{{ old('b_phone', isset($user) ? $user->phone : '') }}" class="form-control" placeholder="Số điện thoại">
                            @if ($errors->first('b_phone'))
                                <span class="text-danger">{{ $errors->first('b_phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label">Địa chỉ <sup class="text-danger">(*)</sup></label>
                            <input type="text" name="b_address" value="{{ old('b_address', isset($user) ? $user->address : '') }}" class="form-control" placeholder="Địa chỉ">
                            @if ($errors->first('b_address'))
                                <span class="text-danger">{{ $errors->first('b_address') }}</span>
                            @endif
                        </div>
                        <!-- <div class="form-group">
                            <label for="inputEmail3" class="control-label">Ngày khởi hành dự kiến</label>
                            <input type="date" name="b_start_date" value="{{ old('b_address', isset($user) ? $user->address : '') }}" class="form-control">
                            @if ($errors->first('b_start_date'))
                                <span class="text-danger">{{ $errors->first('b_start_date') }}</span>
                            @endif
                        </div> -->
                       
                        <div class="form-group">
    <label for="inputEmail3" class="control-label">Số người lớn <sup class="text-danger">(*)</sup></label>
    <input type="number" min="0" value="0" name="b_number_adults" class="form-control ticket-quantity" data-price="{{ $tour->b_price_adults }}" placeholder="Số người lớn">
    @if ($errors->first('b_number_adults'))
        <span class="text-danger">{{ $errors->first('b_number_adults') }}</span>
    @endif
    <span id="adultsTotal"></span>
</div>
<div class="form-group">
    <label for="inputEmail3" class="control-label">Số trẻ em (6 - 12 tuổi) <sup class="text-danger">(*)</sup></label>
    <input type="number" min="0" value="0" name="b_number_children" class="form-control ticket-quantity" data-price="{{ $tour->b_price_children }}" placeholder="Số trẻ em">
    @if ($errors->first('b_number_children'))
        <span class="text-danger">{{ $errors->first('b_number_children') }}</span>
    @endif
    <span id="childrenTotal"></span>
</div>
<div class="form-group">
    <label for="inputEmail3" class="control-label">Số trẻ em (2-6 tuổi) <sup class="text-danger">(*)</sup></label>
    <input type="number" min="0" value="0" name="b_number_child6" class="form-control ticket-quantity" data-price="{{ $tour->b_price_child6 }}" placeholder="Số trẻ em">
    @if ($errors->first('b_number_children'))
        <span class="text-danger">{{ $errors->first('b_number_children') }}</span>
    @endif
    <span id="child6Total"></span>
</div>
<div class="form-group">
    <label for="inputEmail3" class="control-label">Số trẻ em (Dưới 2 tuổi) <sup class="text-danger">(*)</sup></label>
    <input type="number" min="0" value="0" name="b_number_child2" class="form-control ticket-quantity" data-price="{{ $tour->b_price_child2 }}" placeholder="Số trẻ em">
    @if ($errors->first('b_number_children'))
        <span class="text-danger">{{ $errors->first('b_number_children') }}</span>
    @endif
    <span id="child2Total"></span>
</div>
<div class="form-group">
    <label for="inputEmail3" class="control-label">Ghi chú</label>
    <textarea name="b_note" placeholder="Thông tin chi tiết để chúng tôi liên hệ nhanh chóng..." id="message" cols="20" rows="5" class="form-control"></textarea>
</div> 

<p><b>Số người lớn : </b> <b id="songuoilon"></b> - <b>Thành tiền</b>: <b id="thanhtien1"></b> vnd</p>
<p><b>Số trẻ em (6-12 tuổi) :</b> <b id="sotreem"></b> - <b>Thành tiền</b>: <b id="thanhtien2"></b> vnd</p>
<p><b>Số trẻ em (2-6 tuổi) :</b> <b id="sotreem6"></b> - <b>Thành tiền</b>: <b id="thanhtien3"></b> vnd</p>
<p><b>Số trẻ em (dưới 2 tuổi) :</b> <b id="sotreem2"></b> - <b>Thành tiền</b>: <b id="thanhtien4"></b> vnd</p>

<p><b>Tổng tiền: </b> <b id="totalPrice"></b> vnd<p>
<div class="col-md-12 text-center">
    <div class="form-group">
    <button type="submit" name="tiền" class="btn btn-success" >Thanh toán</button>
  
    </div>
</div>


<script>
    // Lắng nghe sự kiện thay đổi số lượng vé
    $('.ticket-quantity').on('input', function() {
        calculateTotalPrice();
    });

    // Hàm chuyển đổi số thành chuỗi có dấu chấm phân cách hàng nghìn
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Công thức tính tổng tiền
    function calculateTotalPrice() {
    var b_price_adults = parseFloat($('#adult_price').val()) || 0;
    var b_price_children = parseFloat($('#child_price').val()) || 0;
    var b_price_child6 = parseFloat($('#child6_price').val()) || 0;
    var b_price_child2 = parseFloat($('#child2_price').val()) || 0;

    var b_number_adults = parseInt($('input[name="b_number_adults"]').val());
    var b_number_children = parseInt($('input[name="b_number_children"]').val());
    var b_number_child6 = parseInt($('input[name="b_number_child6"]').val());
    var b_number_child2 = parseInt($('input[name="b_number_child2"]').val());


    var songuoilon = b_number_adults;
    var sotreem = b_number_children;
    var sotreem6 = b_number_child6;
    var sotreem2 = b_number_child2;
    var thanhtien1 = b_price_adults * b_number_adults;
    var thanhtien2 = b_price_children * b_number_children;
    var thanhtien3 = b_price_child6 * b_number_child6;
    var thanhtien4 = b_price_child2 * b_number_child2;
    var totalPrice = (b_price_adults * b_number_adults) + (b_price_children * b_number_children) + (b_price_child6 * b_number_child6) + (b_price_child2 * b_number_child2);

    $('#songuoilon').text(songuoilon);
    $('#sotreem').text(sotreem);
    $('#sotreem6').text(sotreem6);
    $('#sotreem2').text(sotreem2);
    $('#thanhtien1').text(numberWithCommas(thanhtien1));
    $('#thanhtien2').text(numberWithCommas(thanhtien2));
    $('#thanhtien3').text(numberWithCommas(thanhtien3));
    $('#thanhtien4').text(numberWithCommas(thanhtien4));
    $('#totalPrice').text(numberWithCommas(totalPrice));
}
    // Gọi hàm tính tổng tiền khi trang được tải
    $(document).ready(function() {
        calculateTotalPrice();
    });
   
</script>

                    </form>

                </div>

                <div class="col-md-6 text-center">
                    <div class="col-md-12">
                        <h2 class="mb-3 title-book">{{ $tour->t_title }}</h2>
                        <h2 class="mb-3">{{ isset($tour->location) ? $tour->location->l_name : '' }}</h2>
                        <p>Hành trình : {{ $tour->t_journeys }}</p>
                        <p>Lịch trình : {{ $tour->t_schedule }}</p>
                        <p>Vận chuyển : {{ $tour->t_move_method }}</p>
                        <p>Số người tham gia : {{ $tour->t_number_guests }}</p>
                        <p>Đã đăng ký : {{ $tour->t_number_registered }}</p>
                        <div class="phoneWrap">
                            <div class="hotline">0123456789</div>
                            <div class="hotline">1234567890</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <img src="{{ asset('page/images/travel.jpg') }}" alt="" class="image-book">
                    </div>
                    <div>
                    <table style="border-collapse: collapse; width: 100%;margin-top:20px" border="1">
<tbody>
<table style="border-collapse: collapse; width: 100%; margin-top: 20px" border="1">
<tbody>
<tr>
<td style="width: 10%;">Loại gi&aacute;/Độ tuổi</td>
<td style="width: 20%;">Người lớn(tr&ecirc;n 12 tuổi)</td>
<td style="width: 20%;">trẻ em(6-12 tuổi)</td>
<td style="width: 20%;">trẻ em(2-6 tuổi)</td>
<td style="width: 20%;">Sơ sinh( &lt;2 tuổi)</td>
</tr>
<tr>
<td style="width: 10%;">Gi&aacute;&nbsp;</td>
<td style="width: 20%;">{{ number_format($tour->t_price_adults-($tour->t_price_adults*$tour->t_sale/100),0,',','.') }} vnd</td>
<input type="hidden" id="adult_price" value="{{ $tour->t_price_adults }}">

<!-- Giá vé cho trẻ em -->
<td style="width: 20%;">{{ number_format($tour->t_price_children-($tour->t_price_children*$tour->t_sale/100),0,',','.') }} vnd</td>
<input type="hidden" id="child_price" value="{{ $tour->t_price_children }}">

<!-- Giảm giá 50% cho trẻ em (6 - 12 tuổi) -->
<td style="width: 20%;">{{ number_format(($tour->t_price_children-($tour->t_price_children*$tour->t_sale/100))*50/100,0,',','.') }} vnd</td>
<input type="hidden" id="child6_price" value="{{ ($tour->t_price_children - ($tour->t_price_children * $tour->t_sale / 100)) * 50 / 100 }}">

<!-- Giảm giá 25% cho trẻ em (Dưới 6 tuổi) -->
<td style="width: 20%;">{{ number_format(($tour->t_price_children-($tour->t_price_children*$tour->t_sale/100))*25/100,0,',','.') }} vnd</td>
<input type="hidden" id="child2_price" value="{{ ($tour->t_price_children - ($tour->t_price_children * $tour->t_sale / 100)) * 25 / 100 }}">

</tr>
</tbody>
</table>


</tbody>
</table>
</div>
                </div>
            </div>
        </div>

    </section>
@stop
@section('script')
@stop
   