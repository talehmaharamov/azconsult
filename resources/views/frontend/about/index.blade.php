@extends('master.frontend')
@section('title',__('backend.about').' | ' )
@section('front')
    <section id="About">
        <div class="container">
            <div class="row myRowMobile align-items-center">
                <div class="col-lg-6">
                    <div class="leftBox">
                        <h1>Geniş təcrübə və dərin biliklərə əsaslanan</h1>
                        <span>2004-cü ildən hüquq və mühasibat xidmətlərinin göstərilməsi ilə məşğul olan</span>
                        <strong>@lang('backend.azconsult-aze')</strong>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="positionImg">
                        <img src="{{asset('frontend/img/aboutImg.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach($abouts as $about)
        <section id="Second">
            <div class="container">
                <div class="row align-items-center my-5">
                    <div class="col-lg-6">
                        <div class="secondBoxImg">
                            <img src="{{ asset($about->photo) }}"
                                 alt="{{ $about->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="aboutTextBox">
                            <h1>{{ $about->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}</h1>
                            <p>{!!  $about->translate(app()->getLocale())->description ?? __('backend.translation-not-found') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection
