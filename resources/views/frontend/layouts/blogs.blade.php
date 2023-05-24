<section id="HomeBlog">
    <div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-12">
                <div class="title">
                    <h2>@lang('backend.blog')</h2>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-5">
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="cardBoxBlog">
                        <div class="imgCard">
                            <img src="{{ asset($blog->photo) }}"
                                 alt="{{ $blog->translate(app()->getLocale())->name ?? '-' }}">
                        </div>
                        <div class="cardBodyBox">
                            <h5>{{ $blog->translate(app()->getLocale())->name ?? '-' }}</h5>
                            <p>{!! $blog->translate(app()->getLocale())->description ?? '-' !!}</p>
                            <div class="dateBox">
                                <span>{{ date('M d, Y',strtotime($blog->created_at))}}</span>
                            </div>
                            <a href="{{ route('frontend.blogSingle',$blog->id) }}"><i
                                    class="fal fa-long-arrow-right"></i>@lang('backend.read-more')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
