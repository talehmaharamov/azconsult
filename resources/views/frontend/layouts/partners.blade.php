<section id="Partners">
    <div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-12">
                <div class="title">
                    <h2>@lang('backend.partners')</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="mySliderBox">
        <div class="slider">
            <div class="slide-track">
                @foreach($partners as $partner)
                    <div class="slide">
                        <a href="{{ $partner->link }}" target="_blank">
                            <img src="{{ asset($partner->photo) }}" height="100" width="250"
                                 alt="azconsult.az">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
