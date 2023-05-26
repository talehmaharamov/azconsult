@extends('master.frontend')
@section('title',__('backend.contact-us').' | ' )
@section('front')
    <section id="Contact">
        <div class="container">
            <div class="row contactBox">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="leftContact">
                        <iframe src="{{ settings('location_link') }}" width="480" height="450" style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div class="socialContact">
                            <a href="tel:{{ settings(\Illuminate\Support\Str::replace(' ','',settings('phone'))) }}"><i
                                    class="fas fa-phone-alt"></i>{{ settings('phone') }}</a>
                            <a href=""><i
                                    class="fal fa-map-marker-alt"></i>{{ settings('address_'.app()->getLocale()) }}</a>
                            <div class="socialBox">
                                <a href="mailto:{{ settings('email') }}" target="_blank"><i
                                        class="fas  fa-envelope"></i></a>
                                <a href="{{ settings('facebook') }}" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="{{ settings('instagram') }}" target="_blank"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="myFormBox">
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="title">
                                    <h2>@lang('backend.contact-us')</h2>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('frontend.sendMessage') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="nameSurname">
                                <div class="inpBox">
                                    <i class="fal fa-user"></i>
                                    <input type="text" placeholder="@lang('backend.name')" name="name" id="">
                                </div>
                                <div class="inpBox">
                                    <i class="fal fa-user"></i>
                                    <input type="text" placeholder="@lang('backend.surname')" name="surname" id="">
                                </div>
                            </div>
                            <div class="inpBox">
                                <i class="fal fa-envelope"></i>
                                <input type="email" placeholder="@lang('backend.email')" name="email" id="">
                            </div>
                            <select name="service_type" id="">
                                <option value="" disabled selected>@lang('backend.service_type')</option>
                                @foreach($services as $service)
                                    <option
                                        value="{{ $service->id }}">{{ $service->translate(app()->getLocale())->name ?? '-' }}</option>
                                @endforeach
                            </select>
                            <textarea name="message" placeholder="@lang('backend.message')" id="" cols="30"
                                      rows="10"></textarea>
                            <button>@lang('backend.send')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
