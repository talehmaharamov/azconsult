<?php

namespace Database\Seeders;

use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            ['name' => 'phone', 'link' => '+994512951211'],
            ['name' => 'facebook', 'link' => 'https://facebook.com/gead.az'],
            ['name' => 'instagram', 'link' => 'https://instagram.com/gead_ib'],
            ['name' => 'twitter', 'link' => 'https://twitter.com/GEAD_ib'],
            ['name' => 'youtube', 'link' => 'https://www.youtube.com/channel/UCxn8MoGUHPlGni6IbugpdNQ'],
            ['name' => 'email', 'link' => 'gead.mail@gmail.com'],
            ['name' => 'address_az', 'link' => 'Bakı şəhəri, Nərimanov rayonu'],
            ['name' => 'address_en', 'link' => 'Baku Yasamal r. Mirali Seyidov 31/38'],
            ['name' => 'address_ru', 'link' => 'Баку Ясамал р. Мирали Сеидов 31/38'],
            ['name' => 'address_tr', 'link' => 'Баку Ясамал р. Мирали Сеидов 31/38'],
            ['name' => 'location_link', 'link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.289020855274!2d49.86416357657487!3d40.3802865578558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d0355af9707%3A0x4d5d7e4271aaa462!2zw4fEsXJhcSBQbGF6YQ!5e0!3m2!1sru!2saz!4v1684752677212!5m2!1sru!2saz'],
        ];
        foreach ($settings as $key => $setting) {
            $set = new Setting();
            $set->name = $setting['name'];
            $set->link = $setting['link'];
            $set->status = 1;
            $set->save();
        }
    }
}
