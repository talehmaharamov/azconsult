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
                                <a href="mailto:" target="_blank"><i class="fas  fa-envelope"></i></a>
                                <a href="" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="myFormBox">
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="title">
                                    <h2>Bizimlə əlaqə</h2>
                                </div>
                            </div>
                        </div>
                        <form action="">
                            <div class="nameSurname">
                                <div class="inpBox">
                                    <i class="fal fa-user"></i>
                                    <input type="text" placeholder="Ad" name="" id="">
                                </div>
                                <div class="inpBox">
                                    <i class="fal fa-user"></i>
                                    <input type="text" placeholder="Soyad" name="" id="">
                                </div>
                            </div>
                            <div class="inpBox">
                                <i class="fal fa-envelope"></i>
                                <input type="email" placeholder="Email" name="" id="">
                            </div>
                            <select name="" id="">
                                <option value="" disabled selected>Xidmət Növü</option>
                                <option value="">Hüquq xidməti</option>
                                <option value="">Müəssənin yaradılması və ləğvi</option>
                                <option value="">Maliyyə & Mühasibatlıq</option>
                                <option value="">Kadr işinin təşkili</option>
                                <option value="">Miqrasiya Xidməti</option>
                                <option value="">Mübahisələrin Həlli və Məhkəmələr</option>
                                <option value="">Digər</option>
                            </select>
                            <textarea name="" placeholder="Mesajınız" id="" cols="30" rows="10"></textarea>
                            <button>Göndər</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
