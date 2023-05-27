@extends('master.frontend')
@section('title',__('backend.services').' | ' )
@section('front')
    <section id="Services">
        <div class="container">
            <div class="row my-5">
                <div class="col-12">
                    <div class="title">
                        <h2>@lang('backend.services')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($services as $key => $service)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="servicesCard bgFirst">
                            <div class="topBox">
                                <div class="imgRadius">
                                    <div class="radiusBg">
                                        <img src="{{asset('frontend/img/card'.$key+1 .'.svg')}}"
                                             alt="{{ $service->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="bodyBox">
                                <h5>{{ $service->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}</h5>
                                <p>{!! $service->translate(app()->getLocale())->description ?? __('backend.translation-not-found') !!}</p>
                            </div>
                            <div class="footerBox">
                                {{--                                <form method="GET" action="{{ route('frontend.serviceSingle',$service->id) }}">--}}
                                {{--                                    @csrf--}}
                                {{--                                    <button type="submit">@lang('backend.load-more')--}}
                                {{--                                        <i class="far fa-chevron-right"></i></button>--}}
                                {{--                                </form>--}}
                                <a href="{{ route('frontend.serviceSingle',$service->id) }}">@lang('backend.load-more')
                                    <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
