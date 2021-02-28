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
    <?php $icons = get_field('icons'); ?>
    @if($icons)
        <div class="icon-feature-area mb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--=======  icon feature wrapper  =======-->

                        <div class="icon-feature-wrapper">
                            <div class="row">
                                @foreach($icons as $item)
                                    <div class="col-6 col-lg-2 col-sm-6 icon-item">
                                        <!--=======  single icon feature  =======-->

                                        <div class="item">
                                            <div class="icon">
                                                {!! wp_get_attachment_image($item['icon'],'full') !!}
                                            </div>
                                            <div class="title">
                                                <p>{{ $item['title'] }}</p>
                                            </div>
                                        </div>

                                        <!--=======  End of single icon feature  =======-->
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!--=======  End of icon feature wrapper  =======-->
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="product-double-row-slider-area mb-40">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->

                    <div class="section-title mb-20">
                        <h2>{{ get_field('product_slider_title') }}</h2>
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
                                    'posts_per_page' => -1,
                                    'tax_query'      => array( array(
                                        'taxonomy'   => 'product_cat',
                                        'field'      => 'term_id',
                                        'terms'      => get_field('category'),
                                    ))
                                    );
                                $loop = new WP_Query($args);
                                if ( $loop->have_posts() ) {
                                while ( $loop->have_posts() ) : $loop->the_post();
                                $product = wc_get_product(get_the_ID());
                                ?>

                                    <div>
                                        <div class="single-slider-product-wrapper">
                                            <div class="single-slider-product">
                                                <div class="single-slider-product__image">
                                                    <a href="{{get_permalink()}}">
                                                        <img src="{{wp_get_attachment_url( $product->get_image_id() )}}"/>
                                                    </a>
                                                    @if(sale_badge_percentage())
                                                        <span class="discount-label discount-label--green">{{ sale_badge_percentage() }}</span>
                                                    @endif
                                                </div>

                                                <div class="single-slider-product__content">
                                                    <p class="product-title"><a
                                                                href="{{get_permalink()}}}">{{ the_title() }}</a></p>
                                                    <p class="product-price">
                                                        <span class="discounted-price">
                                                            {!! $product->get_price_html() !!}
                                                        <span class="cart-icon buy-item"
                                                              data-id="{{$product->get_id()}}">
                                                        <span class="buy-item">
                                                            {!! apply_filters
                                                                (
                                                        'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
                                                        sprintf(
                                                            '<a href="%s" data-quantity="%s" class="%s" %s><i class="icon-shopping-cart"></i></a>',
                                                            esc_url( $product->add_to_cart_url() ),
                                                            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                                                            esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
                                                            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                                                            esc_html( $product->add_to_cart_text() )
                                                        ),
                                                        $product,
                                                        $args
                                                    ) !!}
                                                        </span>
                                                    </span>
                                                        </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                <?php endwhile;
                                }
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--=======  End of product double row slider wrapper  =======-->
        </div>
    </div>
    <div class="product-double-row-slider-area mb-40 banner-double-row-slider-area">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->

                    <div class="section-title mb-20">
                        <h2>{{ get_field('product_slider_title') }}</h2>
                    </div>

                    <!--=======  End of section title  =======-->
                </div>
            </div>

            <div class="row row-10">
                <div class="col-custom-5 mb-sm-30">
                    <div class="slider-banner">
                        <a href="{{ get_field('banner_link') }}">
                            {!! wp_get_attachment_image(get_field('banner_section_image'),'full') !!}
                        </a>
                    </div>
                </div>
                <div class="col-custom-7">
                    <!--=======  product double row slider wrapper  =======-->
                    <div class="page-wrapper-light-green">
                        <div class="product-double-row-slider-wrapper">
                            <div class="two-col-slider-small">
                                <?php
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => -1,
                                    'tax_query'      => array( array(
                                        'taxonomy'   => 'product_cat',
                                        'field'      => 'term_id',
                                        'terms'      => get_field('banner_category'),
                                    ))
                                );
                                $loop = new WP_Query($args);
                                if ( $loop->have_posts() ) {
                                while ( $loop->have_posts() ) : $loop->the_post();
                                $product = wc_get_product(get_the_ID());
                                ?>
                                    <div>
                                        <div class="single-slider-product-wrapper">
                                            <div class="single-slider-product">
                                                <div class="single-slider-product__image">
                                                    <a href="{{get_permalink()}}">
                                                        <img src="{{wp_get_attachment_url( $product->get_image_id() )}}"/>
                                                    </a>
                                                    @if(sale_badge_percentage())
                                                        <span class="discount-label discount-label--green">{{ sale_badge_percentage() }}</span>
                                                    @endif
                                                </div>

                                                <div class="single-slider-product__content">
                                                    <p class="product-title"><a
                                                                href="{{get_permalink()}}}">{{ the_title() }}</a></p>
                                                    <p class="product-price">
                                                        <span class="discounted-price">
                                                            {!! $product->get_price_html() !!}
                                                        <span class="cart-icon buy-item"
                                                              data-id="{{$product->get_id()}}">
                                                        <span class="buy-item">
                                                            {!! apply_filters
                                                                (
                                                        'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
                                                        sprintf(
                                                            '<a href="%s" data-quantity="%s" class="%s" %s><i class="icon-shopping-cart"></i></a>',
                                                            esc_url( $product->add_to_cart_url() ),
                                                            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                                                            esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
                                                            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                                                            esc_html( $product->add_to_cart_text() )
                                                        ),
                                                        $product,
                                                        $args
                                                    ) !!}
                                                        </span>
                                                    </span>
                                                        </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php endwhile;
                                }
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--=======  End of product double row slider wrapper  =======-->
        </div>
    </div>
    <div class="product-single-row-double-slider-area mb-40">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-7">
                    <!--=======  section title  =======-->

                    <div class="section-title mb-20">
                        <h2>{{ get_field('two_slide_title') }}</h2>
                    </div>
                    <!--=======  End of section title  =======-->
                </div>

                <div class="col-lg-5">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!--=======  product single row slider wrapper  =======-->
                    <div class="product-double-row-slider-wrapper">
                        <div class="ht-half-slider">
                            <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1,
                                'tax_query'      => array( array(
                                    'taxonomy'   => 'product_cat',
                                    'field'      => 'term_id',
                                    'terms'      => get_field('two_slide_product_category'),
                                ) )
                            );
                            $loop = new WP_Query($args);
                            if ( $loop->have_posts() ) :
                            while ( $loop->have_posts() ) : $loop->the_post();
                            $product = wc_get_product(get_the_ID());
                            ?>
                            <div>
                                <div class="double-slider-single-item-wrapper">
                                    <div class="double-slider-single-item">
                                        <div class="double-slider-single-item__inner-slider">
                                            <div class="big-image-slider-wrapper">
                                                    <div class="big-image-slider-single-item">
                                                        <img src="{{wp_get_attachment_url( $product->get_image_id() )}}"/>
                                                        @if(sale_badge_percentage())
                                                            <span class="discount-label discount-label--green">{{ sale_badge_percentage() }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="double-slider-single-item__content mt-20">
                                            <p class="product-title mb-15">
                                                <a href="{{ get_permalink() }}">{{ get_the_title() }}</a>
                                            </p>
                                            <p class="product-short-desc mb-25">{!! the_excerpt() !!}</p>
                                            <p class="product-price product-price--medium">
                                                        <span class="discounted-price">
                                                            {!! $product->get_price_html() !!}
                                                        <span class="cart-icon buy-item"
                                                              data-id="{{$product->get_id()}}">
                                                        <span class="buy-item">
                                                            {!! apply_filters
                                                                (
                                                        'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
                                                        sprintf(
                                                            '<a href="%s" data-quantity="%s" class="%s" %s><i class="icon-shopping-cart"></i></a>',
                                                            esc_url( $product->add_to_cart_url() ),
                                                            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                                                            esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
                                                            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                                                            esc_html( $product->add_to_cart_text() )
                                                        ),
                                                        $product,
                                                        $args
                                                    ) !!}
                                                        </span>
                                                    </span>
                                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            endwhile;
                            endif;
                            ?>
                        </div>
                </div>
                    <!--=======  End of product single row slider wrapper  =======-->
            </div>
    @endwhile

@endsection
