@extends('master.frontend')
@section('title',__('backend.services').' | ' )
@section('front')
    <section id="Servis">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <h2> {{ $service->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }} </h2>
                </div>
            </div>
        </div>
        <div class="imgServisBox">
            <img src="{{ asset($service->photo) }}" alt="{{ $service->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="paragraphBox">
                        <p>{!!$service->translate(app()->getLocale())->descrip ?? __('backend.translation-not-found')  !!}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="sendButton">
                        <a href="{{ route('frontend.contact-us-page') }}"><button>@lang('backend.apply')</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
