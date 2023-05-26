@extends('master.frontend')
@section('title',__('backend.contact-us').' | ' )
@section('front')
    <section id="Blog">
        <div class="container">
            <div class="row my-5">
                <div class="col-12">
                    <div class="title">
                        <h2>@lang('backend.blog')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-12">
                        <div class="blogBody">
                            <div class="upBox">
                                <img src="{{ asset($blog->photo) }}"
                                     alt="{{ $blog->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}">
                            </div>
                            <div class="downBox">
                                <h4>{{ $blog->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}</h4>
                                <p>{!! {{ $blog->translate(app()->getLocale())->description ?? __('backend.translation-not-found') }} !!}</p>
                                <div class="date">
                                    <i class="fal fa-calendar-alt"></i>
                                    <span>{{ date('d m, Y',strtotime($blog->created_at))}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
