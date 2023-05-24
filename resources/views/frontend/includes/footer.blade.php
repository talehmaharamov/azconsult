<footer>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                <div class="leftFooter">
                    <ul>
                        <li><a target="_blank" href="{{ route('frontend.about') }}">@lang('backend.about')</a></li>
                        <li><a target="_blank" href="{{ route('frontend.service') }}">@lang('backend.services')</a></li>
                        <li><a target="_blank" href="{{ route('frontend.blog') }}">@lang('backend.blog')</a></li>
                        <li><a target="_blank"
                               href="{{ route('frontend.contact-us-page') }}">@lang('backend.contact-us')</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                <div class="logoFooter">
                    <img src="{{ asset('backend/images/logo.png') }}" alt="azconsult.az">
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="socialFooter">
                    <div class="topBox">
                        <a href="mailto:{{ settings('email') }}"><i class="fas fa-envelope"></i>{{ settings('email') }}
                        </a>
                        <a href="tel:{{ Str::replace(' ','',settings('phone'))}}"><i
                                class="fas fa-phone-alt"></i>{{ settings('phone') }}</a>
                    </div>
                    <div class="bottomBox">
                        <a href="{{ settings('facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ settings('instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="copy">
                    <span>© @lang('backend.copyright') {{ now()->year }} @lang('backend.azconsult'). @lang('backend.all-rights-reserved')</span>
                </div>
            </div>
        </div>
    </div>
</footer>
