<div class="footer-area">
  <div class="container">
    <div class="row mb-40">
      <div class="col-lg-12">
        <div class="footer-content-wrapper border-top pt-40">
          <div class="row">
            <div class="col-lg-12">
              <div class="footer-logo mb-25">
                {!! wp_get_attachment_image(get_field('footer_logo','options'),'full') !!}
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <!--=======  single footer widget  =======-->
              <div class="single-footer-widget">
                <div class="footer-text-block mb-10">
                  <h5 class="footer-text-block__title">{{ __('Susisiekime:','artoja') }}</h5>
                  <p class="footer-text-block__content"><a href="tel:{{ get_field('phone','options') }}">{{ get_field('phone','options') }}</a></p>
                </div>

                <div class="footer-text-block mb-10">
                  <h5 class="footer-text-block__title">{{ __('Adresas:','artoja') }}</h5>
                  <p class="footer-text-block__content">{{ get_field('address','options') }}</p>
                </div>
                <div class="footer-text-block mb-10">
                  <h5 class="footer-text-block__title">{{ __('Darbo laikas:','artoja') }}</h5>
                  <div class="footer-text-block__content">{!! get_field('working_time','options') !!}</div>
                </div>
              </div>

              <!--=======  End of single footer widget  =======-->
            </div>
            @if(get_field('footer_links','option'))
            <div class="col-lg-6 col-md-6 mt-sm-30">
              <!--=======  single footer widget  =======-->
              <div class="single-footer-widget">
                <h4 class="footer-widget-title">Informacija</h4>
                <div class="footer-navigation">
                  <nav>
                    <ul>
                      @foreach(get_field('footer_links','option') as $item)
                      <li><a href="{{ $item['link']['url'] }}">{{ $item['link']['title'] }}</a></li>
                      @endforeach
                    </ul>
                  </nav>
                </div>
              </div>

              <!--=======  End of single footer widget  =======-->
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="copyright-text-area">
          <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-left mb-sm-15">
              <div class="copyright-text">
                <p>© 2021 <a href="#">Artoja</a></p>
              </div>
            </div>
            <div class="col-md-6 text-center text-md-right">
              <div class="payment-logo">
                <img src="assets/img/icons/payment.png" class="img-fluid" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
