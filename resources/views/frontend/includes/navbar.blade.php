<section id="myNavigation">
    <div class="topNav">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="leftNav">
                        <a href="{{ route('frontend.about') }}">@lang('backend.about')</a>
                        <a href="{{ route('frontend.service') }}">@lang('backend.services')</a>
                        <a href="{{ route('frontend.blog') }}">@lang('backend.blog')</a>
                        <a href="{{ route('frontend.contact-us-page') }}">@lang('backend.contact-us')</a>
                        <a href="{{ route('frontend.contact-us-page') }}"
                           class="consultBtn">@lang('backend.consultation')</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="rightNav">
                        <div class="dropdown">
                            <button class="dropdown-toggle btn" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">{{  \Illuminate\Support\Str::upper(app()->getLocale()) }}</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach(active_langs() as $lang)
                                    @continue($lang->code == app()->getLocale())
                                    <li><a class="dropdown-item"
                                           href="{{ route('frontend.frontLanguage',$lang->code) }}">{{ Str::upper($lang->code) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            |
                        </div>
                        <a href="tel:{{ Str::replace(' ','',settings('phone')) }}"><i
                                class="fas fa-phone-alt"></i>{{ settings('phone') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('frontend.index') }}"><img
                    src="{{ asset('backend/images/logo.png') }}" alt="azconsult.az"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="social">
                    <a href="{{ settings('facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ settings('instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <hr>
</section>
<section id="myMobileNavigation">
    <div class="my_logo">
        <img src="{{ asset('backend/images/logo.png') }}" alt="">
    </div>
    <nav class="main-nav hamburger-menu">
        <input id="menu__toggle" type="checkbox"/>
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>
        <ul class="menu__box">
            <a class="menu__item" href="{{ route('frontend.about') }}">@lang('backend.about')</a>
            <a class="menu__item" href="{{ route('frontend.service') }}">@lang('backend.services')</a>
            <a class="menu__item" href="{{ route('frontend.blog') }}">@lang('backend.blog')</a>
            <a class="menu__item"
               href="{{ route('frontend.contact-us-page') }}">@lang('backend.contact-us')</a>
            <a class="menu__item consultBtn"
               href="{{ route('frontend.contact-us-page') }}">@lang('backend.consultation')</a>
            <li>
                <div class="rightNav">
                    <div class="dropdown">
                        <button class="dropdown-toggle btn" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            {{ \Illuminate\Support\Str::upper(app()->getLocale()) }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach(active_langs() as $lang)
                                @continue($lang->code == app()->getLocale())
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('frontend.frontLanguage',$lang->code) }}"> {{ \Illuminate\Support\Str::upper($lang->code) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="tel:{{ \Illuminate\Support\Str::replace(' ','',settings('phone')) }}"><i
                            class="fas fa-phone-alt"></i>{{ settings('phone') }}</a>
                </div>
            </li>
            <li>
                <div class="social">
                    <a href="{{ settings('facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ settings('instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </li>
        </ul>
    </nav>
</section>
<div class="servicesNav">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="servicesNavBox">
                    @foreach($services as $service)
                        <a href="{{ route('frontend.serviceSingle',$service->id) }}">{{ $service->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
