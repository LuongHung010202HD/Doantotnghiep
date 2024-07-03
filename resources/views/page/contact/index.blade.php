@extends('page.layouts.page')
@section('title', 'Liên hệ')
@section('style')
@stop
@section('seo')
@stop
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('/page/images/hinh-nen.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('page.home') }}">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Liên hệ <i class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Liên hệ</h1>
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
                        <p>Số 3, Cầu Giấy</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <h3 class="mb-2">Số điện thoại liên hệ</h3>
                        <p><a href="tel://1234567920">1234567890</a></p>
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
                            <span class="fa fa-fw fa-facebook-f"></span>
                        </div>
                        <h3 class="mb-2">Website</h3>
                        <p><a href="https://www.facebook.com/profile.php?id=100061824732065&mibextid=LQQJ4d">Trang Facebook của tôi</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section contact-section ftco-no-pt">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-12 order-md-last d-flex">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.113115942606!2d105.8008455743061!3d21.028159487801087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab424a50fff9%3A0xbe3a7f3670c0a45f!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBHaWFvIFRow7RuZyBW4bqtbiBU4bqjaQ!5e0!3m2!1svi!2s!4v1714143227122!5m2!1svi!2s" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-intro ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="img" style="background-image: url({{ asset('page/images/bg_2.jpg') }});">
                        <div class="overlay"></div>
                        <h2>Chào mừng bạn đến với LQH Travel</h2>
                        <p>Chúng tôi sẽ đem đến trãi nghiệm các tour du lịch tốt nhất dành cho bạn</p>
                        <p class="mb-0"><a href="https://www.facebook.com/profile.php?id=100061824732065&mibextid=LQQJ4d" class="btn btn-primary px-4 py-3"> "Liên hệ qua Facebook của chúng tôi"</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('script')
@stop
