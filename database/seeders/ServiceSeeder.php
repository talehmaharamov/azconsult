<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['az' => 'Hüquq Xidməti', 'en' => 'Legal Service', 'ru' => 'Юридическая служба', 'tr' => 'Yasal hizmet'],
            ['az' => 'Müəssənin yaradılması və ləğvi', 'en' => 'Establishment and liquidation of the enterprise', 'ru' => 'Создание и ликвидация предприятия', 'tr' => 'İşletmenin kuruluşu ve tasfiyesi'],
            ['az' => 'Maliyyə & Mühasibatlıq', 'en' => 'Finance & Accounting', 'ru' => 'Финансы и бухгалтерский учет', 'tr' => 'Finans ve Muhasebe'],
            ['az' => 'Kadr işinin təşkili', 'en' => 'Organization of personnel work', 'ru' => 'Организация работы с персоналом', 'tr' => 'Personel çalışmasının organizasyonu'],
            ['az' => 'Miqrasiya Xidməti', 'en' => 'Migration Service', 'ru' => 'Миграционная служба', 'tr' => 'Taşıma Hizmeti'],
            ['az' => 'Mübahisələrin Həlli və Məhkəmələr', 'en' => 'Dispute Resolution and Courts', 'ru' => 'Разрешение споров и суды', 'tr' => 'Uyuşmazlık Çözümü ve Mahkemeler'],
            ['az' => 'Digər', 'en' => 'Other', 'ru' => 'Другой', 'tr' => 'Diğer'],
        ];
        foreach ($services as $service) {
            $Serv = new Service();
            $Serv->photo = 'null';
            $Serv->save();
            foreach (active_langs() as $lang) {
                $translate = new ServiceTranslation();
                $translate->service_id = $Serv->id;
                $translate->locale = $lang->code;
                $translate->name = $service[$lang->code];
                $translate->description = 'description';
                $translate->save();
            }
        }
    }
}
