<?php

namespace Database\Seeders;

use App\Models\TariffsTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TariffsTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tariffs_translations = [
            'en' => [
                [
                    'tariff_id' => 1,
                    'name' => 'Basic',
                    'desc' => '1 invitation card',
                    'info_title' => 'You can create one invitation that includes',
                    'info_text' => '',
                    'info_items' => ['1. you will automatically create the appropriate one for you', '2. You will be able to quickly distribute invitations via Qr code', '3)  You will receive the guest list on the phone number you sent'],
                ],
                [
                    'tariff_id' => 2,
                    'name' => 'Standart',
                    'desc' => '3 months + 1 month free',
                    'info_title' => 'You can create one invitation that include',
                    'info_text' => 'As part of this package you will receive a code with which you will generate invitation cards as part of the package.',
                    'info_items' => ['1. you will automatically create the appropriate one for you', '2. You will be able to quickly distribute invitations via Qr code', '3)  You will receive the guest list on the phone number you sent'],
                ],
                [
                    'tariff_id' => 3,
                    'name' => 'Premium',
                    'desc' => '1 year + 3 months free',
                    'info_title' => 'You can create one invitation that includes',
                    'info_text' => 'As part of this package you will receive a code with which you will generate invitation cards as part of the package.',
                    'info_items' => ['1. you will automatically create the appropriate one for you', '2. You will be able to quickly distribute invitations via Qr code', '3)  You will receive the guest list on the phone number you sent'],
                ]

            ],
            'ru' => [
                [
                    'tariff_id' => 1,
                    'name' => 'Базовый',
                    'desc' => '1 пригласительный билет',
                    'info_title' => 'Вы можете создать одно приглашение, включающее в себя',
                    'info_text' => '',
                    'info_items' => ['1. Вы автоматически создадите подходящий для вас', '2. Вы сможете быстро разослать приглашения по Qr-коду', '3. Список гостей вы получите на отправленный номер телефона'],
                ],
                [
                    'tariff_id' => 2,
                    'name' => 'Стандарт',
                    'desc' => '3 месяца + 1 месяц бесплатно',
                    'info_title' => 'Вы можете создать одно приглашение, включающее',
                    'info_text' => 'В составе этого пакета вы получите код, с помощью которого вы будете генерировать пригласительные билеты как часть пакета.',
                    'info_items' => ['1. Вы автоматически создадите подходящий для вас', '2. Вы сможете быстро разослать приглашения по Qr-коду', '3. Список гостей вы получите на отправленный номер телефона'],
                ],
                [
                    'tariff_id' => 3,
                    'name' => 'Премиум',
                    'desc' => '1 год + 3 месяца бесплатно',
                    'info_title' => 'Вы можете создать одно приглашение, включающее в себя',
                    'info_text' => 'В составе этого пакета вы получите код, с помощью которого вы будете генерировать пригласительные билеты как часть пакета.',
                    'info_items' => ['1. Вы автоматически создадите подходящий для вас', '2. Вы сможете быстро разослать приглашения по Qr-коду', '3. Список гостей вы получите на отправленный номер телефона'],
                ]


            ],
            'am' => [
                [
                    'tariff_id' => 1,
                    'name' => 'Հիմնական',
                    'desc' => '1 հրավիրատոմս',
                    'info_title' => 'Դուք կարող եք ստեղծել մեկ հրավեր, որը ներառում է',
                    'info_text' => '',
                    'info_items' => ['1. Դուք ավտոմատ կերպով կստեղծեք համապատասխան հրավիրատոմս ձեզ համար', '2. Դուք կկարողանաք արագ տարածել հրավերները Qr կոդի միջոցով', '3. Դուք կստանաք հյուրերի ցուցակը ձեր տրամադրած հեռախոսահամարին'],
                ],

                [
                    'tariff_id' => 2,
                    'name' => 'Ստանդարտ',
                    'desc' => '3 ամիս + 1 ամիս անվճար',
                    'info_title' => 'Դուք կարող եք ստեղծել մեկ հրավեր, որը ներառում է',
                    'info_text' => 'Որպես այս փաթեթի մաս, դուք կստանաք ծածկագիր, որով դուք կստեղծեք հրավիրատոմսեր',
                    'info_items' => ['1. դուք ավտոմատ կերպով կստեղծեք համապատասխան հրավիրատոմս ձեզ համար', '2. Դուք կկարողանաք արագ տարածել հրավերները Qr կոդի միջոցով', '3. Դուք կստանաք հյուրերի ցուցակը ձեր տրամադրած հեռախոսահամարին'],
                ],
                [
                    'tariff_id' => 3,
                    'name' => 'Պրեմիում',
                    'desc' => '1 տարի + 3 ամիս անվճար',
                    'info_title' => 'Դուք կարող եք ստեղծել մեկ հրավեր, որը ներառում է',
                    'info_text' => 'Որպես այս փաթեթի մաս, դուք կստանաք ծածկագիր, որով դուք կստեղծեք հրավիրատոմսեր',
                    'info_items' => ['1. Դուք ավտոմատ կերպով կստեղծեք համապատասխան հրավիրատոմս ձեզ համար', '2. Դուք կկարողանաք արագ տարածել հրավերները Qr կոդի միջոցով', '3. Դուք կստանաք հյուրերի ցուցակը ձեր տրամադրած հեռախոսահամարին'],
                ]

            ],
        ];

        foreach ($tariffs_translations as $lang => $items) {
            foreach ($items as $key => $value) {
                TariffsTranslation::updateOrCreate(
                    ['tariff_id' => $value['tariff_id'], 'lang' => $lang],
                    [
                        'tariff_id' => $value['tariff_id'],
                        'lang' => $lang,
                        'name' => $value['name'],
                        'desc' => $value['desc'],
                        'info_title' => $value['info_title'],
                        'info_text' => $value['info_text'],
                        'info_items' => json_encode($value['info_items']),

                    ]);

            }

        }
    }
}
