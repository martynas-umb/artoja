@extends('layouts.app')

@section('content')
    @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    <?php $slides = get_field('slider'); ?>
    @if($slides)
        <div class="hero-slider-area mb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-slider-wrapper">
                            <div class="ht-slick-slider">
                                @foreach($slides as $slide)
                                    <div class="slick-slide" style='background-image: url("{{$slide['image']}}")'>
                                        <div class="single-slider-item">
                                            <div class="hero-slider-item-wrapper hero-slider-item-wrapper--minimal-height hero-slider-bg-4">
                                                <div class="hero-slider-content pl-60 pl-sm-30">
                                                    <p class="slider-title slider-title--small">{{$slide['title']}}</p>
                                                    <p class="slider-title slider-title--big-bold">{{$slide['subtitle']}}</p>
                                                    <p class="slider-title slider-title--big-light">{{$slide['second_subtitle']}}</p>
                                                    <a class="theme-button hero-slider-button"
                                                       href="{{$slide['button']['url']}}"
                                                    >{{$slide['button']['title']}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="split-banner-area mb-40 mb-sm-30 mt-40">
        <div class="container">
            <div class="row row-5">
                <div class="col-md-6 mb-sm-10">
                    <!--=======  single split banner  =======-->
                    <div class="single-split-banner category">
                        <div class="single-split-banner__image">
                            <a href="{{get_term_link(get_field('first_category'))}}">
                                <img src="{{ get_field('image') }}" class="img-fluid" alt="category-img">
                                <div class="single-split-banner__image__content">
                                    <p class="split-banner-title split-banner-title--light">{{ get_field('category_title') }}</p>
                                    <p class="split-banner-title split-banner-title--bold split-banner-title--bold--small">{{ get_field('category_subtitle') }}</p>
                                    <p class="split-banner-title split-banner-title--price">from <span
                                                class="amount">{{ get_field('price') }}</span></p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!--=======  End of single split banner  =======-->
                </div>
                <div class="col-md-6 mb-sm-10">
                    <!--=======  single split banner  =======-->

                    <div class="single-split-banner category">
                        <div class="single-split-banner__image">
                            <a href="{{get_term_link(get_field('second_category'))}}">
                                <img src="{{ get_field('second_image') }}" class="img-fluid" alt="">
                                <div class="single-split-banner__image__content">
                                    <p class="split-banner-title split-banner-title--light">{{ get_field('second_title') }}</p>
                                    <p class="split-banner-title split-banner-title--bold split-banner-title--bold--small">{{ get_field('second_subtitle') }}</p>
                                    <p class="split-banner-title split-banner-title--price">from <span
                                                class="amount">{{ get_field('second_price') }}</span></p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!--=======  End of single split banner  =======-->
                </div>
            </div>
        </div>
    </div>
    <div class="product-double-row-slider-area mb-40" style="padding-bottom: 350px">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->

                    <div class="section-title mb-20">
                        <h2>New Products</h2>
                    </div>

                    <!--=======  End of section title  =======-->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!--=======  product double row slider wrapper  =======-->
                    <div class="page-wrapper-light-green">
                    <div class="product-double-row-slider-wrapper">
                        <div class="two-col-slider">
                            <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 10
                            );
                            $loop = new WP_Query( $args );
                            if ( $loop->have_posts() ) {
                                while ( $loop->have_posts() ) : $loop->the_post();
                                $product = wc_get_product(get_the_ID());
                                ?>
                                <div class="slick-slide">
                                    <div>
                                        <div class="single-slider-product-wrapper">
                                            <div class="single-slider-product">
                                                <div class="single-slider-product__image">
                                                    <a href="{{get_permalink()}}">
                                                        <img src="{{wp_get_attachment_url( $product->get_image_id() )}}" />
                                                    </a>
                                                    <span class="discount-label discount-label--green">-10%</span>
                                                </div>

                                                <div class="single-slider-product__content">
                                                    <p class="product-title"><a href="single-product.html">{{ the_title() }}</a></p>
                                                    <p class="product-price"><span class="discounted-price">

{{--                                                                @if($product->is_on_sale())--}}
{{--                                                                    <span class="regular-price">--}}
{{--                                                                        {!! get_woocommerce_currency_symbol().$product->get_regular_price() !!}--}}
{{--                                                                    </span>--}}
{{--                                                                <span class="sale-price">--}}
{{--                                                                        {!! get_woocommerce_currency_symbol().$product->get_sale_price() !!}--}}
{{--                                                                    </span>--}}
{{--                                                                @else--}}
{{--                                                                <span class="regular-price">--}}
{{--                                                                        {!! get_woocommerce_currency_symbol().$product->get_regular_price() !!}--}}
{{--                                                                    </span>--}}
{{--                                                                @endif--}}

                                                            {!! $product->get_price_html() !!}
                                                        </span>

                                                    <span class="cart-icon"><a href="javascript:void(0)"><i
                                                                    class="icon-shopping-cart"></i></a></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php endwhile;
                            }
                            wp_reset_postdata();
                            ?>
{{--                            <div class="slick-slide" >--}}
{{--                                <div>--}}
{{--                                    <div class="single-slider-product-wrapper">--}}
{{--                                        <div class="single-slider-product">--}}
{{--                                            <div class="single-slider-product__image">--}}
{{--                                                <a href="single-product.html">--}}
{{--                                                    <img src="/assets/img/products/medium1.jpg" class="img-fluid" alt="">--}}
{{--                                                    <img src="/assets/img/products/medium2.jpg" class="img-fluid" alt="">--}}
{{--                                                </a>--}}

{{--                                                <span class="discount-label discount-label--green">-10%</span>--}}

{{--                                                <div class="hover-icons">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a data-toggle="modal"--}}
{{--                                                               data-target="#quick-view-modal-container"--}}
{{--                                                               href="javascript:void(0)"><i class="icon-eye"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i class="icon-heart"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i--}}
{{--                                                                        class="icon-sliders"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="single-slider-product__content">--}}
{{--                                                <p class="product-title"><a href="single-product.html">Cillum dolore--}}
{{--                                                        garden tools</a></p>--}}
{{--                                                <div class="rating">--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star"></i>--}}
{{--                                                </div>--}}
{{--                                                <p class="product-price"><span class="discounted-price">$100.00</span>--}}
{{--                                                    <span class="main-price discounted">$120.00</span></p>--}}

{{--                                                <span class="cart-icon"><a href="javascript:void(0)"><i--}}
{{--                                                                class="icon-shopping-cart"></i></a></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="slick-slide" >--}}
{{--                                <div>--}}
{{--                                    <div class="single-slider-product-wrapper">--}}
{{--                                        <div class="single-slider-product">--}}
{{--                                            <div class="single-slider-product__image">--}}
{{--                                                <a href="single-product.html">--}}
{{--                                                    <img src="assets/img/products/medium5.jpg" class="img-fluid" alt="">--}}
{{--                                                    <img src="assets/img/products/medium6.jpg" class="img-fluid" alt="">--}}
{{--                                                </a>--}}

{{--                                                <span class="discount-label discount-label--green">-20%</span>--}}

{{--                                                <div class="hover-icons">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a data-toggle="modal"--}}
{{--                                                               data-target="#quick-view-modal-container"--}}
{{--                                                               href="javascript:void(0)"><i class="icon-eye"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i class="icon-heart"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i--}}
{{--                                                                        class="icon-sliders"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="single-slider-product__content">--}}
{{--                                                <p class="product-title"><a href="single-product.html">Cillum dolore--}}
{{--                                                        garden tools</a></p>--}}
{{--                                                <div class="rating">--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star"></i>--}}
{{--                                                </div>--}}
{{--                                                <p class="product-price"><span class="discounted-price">$30.00</span>--}}
{{--                                                    <span class="main-price discounted">$50.00</span></p>--}}

{{--                                                <span class="cart-icon"><a href="javascript:void(0)"><i--}}
{{--                                                                class="icon-shopping-cart"></i></a></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="slick-slide" >--}}
{{--                                <div>--}}
{{--                                    <div class="single-slider-product-wrapper">--}}
{{--                                        <div class="single-slider-product">--}}
{{--                                            <div class="single-slider-product__image">--}}
{{--                                                <a href="single-product.html">--}}
{{--                                                    <img src="assets/img/products/medium9.jpg" class="img-fluid" alt="">--}}
{{--                                                </a>--}}

{{--                                                <span class="discount-label discount-label--green">-10%</span>--}}

{{--                                                <div class="hover-icons">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a data-toggle="modal"--}}
{{--                                                               data-target="#quick-view-modal-container"--}}
{{--                                                               href="javascript:void(0)"><i class="icon-eye"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i class="icon-heart"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i--}}
{{--                                                                        class="icon-sliders"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="single-slider-product__content">--}}
{{--                                                <p class="product-title"><a href="single-product.html">Cillum dolore--}}
{{--                                                        garden tools</a></p>--}}
{{--                                                <div class="rating">--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star"></i>--}}
{{--                                                </div>--}}
{{--                                                <p class="product-price"><span class="discounted-price">$50.00</span>--}}
{{--                                                    <span class="main-price discounted">$120.00</span></p>--}}

{{--                                                <span class="cart-icon"><a href="javascript:void(0)"><i--}}
{{--                                                                class="icon-shopping-cart"></i></a></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="slick-slide">--}}
{{--                                <div>--}}
{{--                                    <div class="single-slider-product-wrapper">--}}
{{--                                        <div class="single-slider-product">--}}
{{--                                            <div class="single-slider-product__image">--}}
{{--                                                <a href="single-product.html">--}}
{{--                                                    <img src="assets/img/products/medium3.jpg" class="img-fluid" alt="">--}}
{{--                                                    <img src="assets/img/products/medium4.jpg" class="img-fluid" alt="">--}}
{{--                                                </a>--}}

{{--                                                <span class="discount-label discount-label--green">-15%</span>--}}

{{--                                                <div class="hover-icons">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a data-toggle="modal"--}}
{{--                                                               data-target="#quick-view-modal-container"--}}
{{--                                                               href="javascript:void(0)"><i class="icon-eye"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i class="icon-heart"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i--}}
{{--                                                                        class="icon-sliders"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="single-slider-product__content">--}}
{{--                                                <p class="product-title"><a href="single-product.html">Lorem ipsum--}}
{{--                                                        garden tools</a></p>--}}
{{--                                                <div class="rating">--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star"></i>--}}
{{--                                                </div>--}}
{{--                                                <p class="product-price"><span class="discounted-price">$50.00</span>--}}
{{--                                                    <span class="main-price discounted">$70.00</span></p>--}}

{{--                                                <span class="cart-icon"><a href="javascript:void(0)"><i--}}
{{--                                                                class="icon-shopping-cart"></i></a></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="slick-slide">--}}
{{--                                <div>--}}
{{--                                    <div class="single-slider-product-wrapper">--}}
{{--                                        <div class="single-slider-product">--}}
{{--                                            <div class="single-slider-product__image">--}}
{{--                                                <a href="single-product.html">--}}
{{--                                                    <img src="assets/img/products/medium7.jpg" class="img-fluid" alt="">--}}
{{--                                                    <img src="assets/img/products/medium8.jpg" class="img-fluid" alt="">--}}
{{--                                                </a>--}}

{{--                                                <span class="discount-label discount-label--green">-20%</span>--}}

{{--                                                <div class="hover-icons">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a data-toggle="modal"--}}
{{--                                                               data-target="#quick-view-modal-container"--}}
{{--                                                               href="javascript:void(0)"><i class="icon-eye"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i class="icon-heart"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i--}}
{{--                                                                        class="icon-sliders"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="single-slider-product__content">--}}
{{--                                                <p class="product-title"><a href="single-product.html">Lorem ipsum--}}
{{--                                                        garden tools</a></p>--}}
{{--                                                <div class="rating">--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star"></i>--}}
{{--                                                </div>--}}
{{--                                                <p class="product-price"><span class="discounted-price">$50.00</span>--}}
{{--                                                    <span class="main-price discounted">$120.00</span></p>--}}

{{--                                                <span class="cart-icon"><a href="javascript:void(0)"><i--}}
{{--                                                                class="icon-shopping-cart"></i></a></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="slick-slide">--}}
{{--                                <div>--}}
{{--                                    <div class="single-slider-product-wrapper">--}}
{{--                                        <div class="single-slider-product">--}}
{{--                                            <div class="single-slider-product__image">--}}
{{--                                                <a href="single-product.html">--}}
{{--                                                    <img src="assets/img/products/medium1.jpg" class="img-fluid" alt="">--}}
{{--                                                    <img src="assets/img/products/medium2.jpg" class="img-fluid" alt="">--}}
{{--                                                </a>--}}

{{--                                                <span class="discount-label discount-label--green">-10%</span>--}}

{{--                                                <div class="hover-icons">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a data-toggle="modal"--}}
{{--                                                               data-target="#quick-view-modal-container"--}}
{{--                                                               href="javascript:void(0)"><i class="icon-eye"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i class="icon-heart"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i--}}
{{--                                                                        class="icon-sliders"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="single-slider-product__content">--}}
{{--                                                <p class="product-title"><a href="single-product.html">Cillum dolore--}}
{{--                                                        garden tools</a></p>--}}
{{--                                                <div class="rating">--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star"></i>--}}
{{--                                                </div>--}}
{{--                                                <p class="product-price"><span class="discounted-price">$100.00</span>--}}
{{--                                                    <span class="main-price discounted">$120.00</span></p>--}}

{{--                                                <span class="cart-icon"><a href="javascript:void(0)"><i--}}
{{--                                                                class="icon-shopping-cart"></i></a></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="slick-slide">--}}
{{--                                <div>--}}
{{--                                    <div class="single-slider-product-wrapper">--}}
{{--                                        <div class="single-slider-product">--}}
{{--                                            <div class="single-slider-product__image">--}}
{{--                                                <a href="single-product.html">--}}
{{--                                                    <img src="assets/img/products/medium5.jpg" class="img-fluid" alt="">--}}
{{--                                                    <img src="assets/img/products/medium6.jpg" class="img-fluid" alt="">--}}
{{--                                                </a>--}}

{{--                                                <span class="discount-label discount-label--green">-20%</span>--}}

{{--                                                <div class="hover-icons">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a data-toggle="modal"--}}
{{--                                                               data-target="#quick-view-modal-container"--}}
{{--                                                               href="javascript:void(0)"><i class="icon-eye"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i class="icon-heart"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i--}}
{{--                                                                        class="icon-sliders"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="single-slider-product__content">--}}
{{--                                                <p class="product-title"><a href="single-product.html">Cillum dolore--}}
{{--                                                        garden tools</a></p>--}}
{{--                                                <div class="rating">--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star"></i>--}}
{{--                                                </div>--}}
{{--                                                <p class="product-price"><span class="discounted-price">$30.00</span>--}}
{{--                                                    <span class="main-price discounted">$50.00</span></p>--}}

{{--                                                <span class="cart-icon"><a href="javascript:void(0)"><i--}}
{{--                                                                class="icon-shopping-cart"></i></a></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="slick-slide">--}}
{{--                                <div>--}}
{{--                                    <div class="single-slider-product-wrapper">--}}
{{--                                        <div class="single-slider-product">--}}
{{--                                            <div class="single-slider-product__image">--}}
{{--                                                <a href="single-product.html">--}}
{{--                                                    <img src="assets/img/products/medium9.jpg" class="img-fluid" alt="">--}}
{{--                                                </a>--}}

{{--                                                <span class="discount-label discount-label--green">-10%</span>--}}

{{--                                                <div class="hover-icons">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a data-toggle="modal"--}}
{{--                                                               data-target="#quick-view-modal-container"--}}
{{--                                                               href="javascript:void(0)"><i class="icon-eye"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i class="icon-heart"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i--}}
{{--                                                                        class="icon-sliders"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="single-slider-product__content">--}}
{{--                                                <p class="product-title"><a href="single-product.html">Cillum dolore--}}
{{--                                                        garden tools</a></p>--}}
{{--                                                <div class="rating">--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star"></i>--}}
{{--                                                </div>--}}
{{--                                                <p class="product-price"><span class="discounted-price">$50.00</span>--}}
{{--                                                    <span class="main-price discounted">$120.00</span></p>--}}

{{--                                                <span class="cart-icon"><a href="javascript:void(0)"><i--}}
{{--                                                                class="icon-shopping-cart"></i></a></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="slick-slide">--}}
{{--                                <div>--}}
{{--                                    <div class="single-slider-product-wrapper">--}}
{{--                                        <div class="single-slider-product">--}}
{{--                                            <div class="single-slider-product__image">--}}
{{--                                                <a href="single-product.html">--}}
{{--                                                    <img src="assets/img/products/medium9.jpg" class="img-fluid" alt="">--}}
{{--                                                </a>--}}

{{--                                                <span class="discount-label discount-label--green">-10%</span>--}}

{{--                                                <div class="hover-icons">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a data-toggle="modal"--}}
{{--                                                               data-target="#quick-view-modal-container"--}}
{{--                                                               href="javascript:void(0)"><i class="icon-eye"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i class="icon-heart"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i--}}
{{--                                                                        class="icon-sliders"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="single-slider-product__content">--}}
{{--                                                <p class="product-title"><a href="single-product.html">Cillum dolore--}}
{{--                                                        garden tools</a></p>--}}
{{--                                                <div class="rating">--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star"></i>--}}
{{--                                                </div>--}}
{{--                                                <p class="product-price"><span class="discounted-price">$50.00</span>--}}
{{--                                                    <span class="main-price discounted">$120.00</span></p>--}}

{{--                                                <span class="cart-icon"><a href="javascript:void(0)"><i--}}
{{--                                                                class="icon-shopping-cart"></i></a></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="slick-slide">--}}
{{--                                <div>--}}
{{--                                    <div class="single-slider-product-wrapper">--}}
{{--                                        <div class="single-slider-product">--}}
{{--                                            <div class="single-slider-product__image">--}}
{{--                                                <a href="single-product.html">--}}
{{--                                                    <img src="assets/img/products/medium9.jpg" class="img-fluid" alt="">--}}
{{--                                                </a>--}}

{{--                                                <span class="discount-label discount-label--green">-10%</span>--}}

{{--                                                <div class="hover-icons">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a data-toggle="modal"--}}
{{--                                                               data-target="#quick-view-modal-container"--}}
{{--                                                               href="javascript:void(0)"><i class="icon-eye"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i class="icon-heart"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="javascript:void(0)"><i--}}
{{--                                                                        class="icon-sliders"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="single-slider-product__content">--}}
{{--                                                <p class="product-title"><a href="single-product.html">Cillum dolore--}}
{{--                                                        garden tools</a></p>--}}
{{--                                                <div class="rating">--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star active"></i>--}}
{{--                                                    <i class="ion-android-star"></i>--}}
{{--                                                </div>--}}
{{--                                                <p class="product-price"><span class="discounted-price">$50.00</span>--}}
{{--                                                    <span class="main-price discounted">$120.00</span></p>--}}

{{--                                                <span class="cart-icon"><a href="javascript:void(0)"><i--}}
{{--                                                                class="icon-shopping-cart"></i></a></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!--=======  End of product double row slider wrapper  =======-->
        </div>
    </div>
    @endwhile
@endsection
