<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\PriceItem;
use App\Models\PriceItemRule;
use App\Models\PriceOption;
use App\Models\Location;
use App\Models\Membership;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            ['name' => 'Bath'],
            ['name' => 'Birmingham'],
            ['name' => 'Bradford'],
            ['name' => 'Brighton'],
            ['name' => 'Bristol'],
            ['name' => 'Cambridge'],
            ['name' => 'Canterbury'],
            ['name' => 'Carlisle'],
            ['name' => 'Chester'],
            ['name' => 'Chichester'],
            ['name' => 'Coventry'],
            ['name' => 'Derby'],
            ['name' => 'Durham'],
            ['name' => 'Ely'],
            ['name' => 'Exeter'],
            ['name' => 'Gloucester'],
            ['name' => 'Hereford'],
            ['name' => 'Kingston upon Hull'],
            ['name' => 'Lancaster'],
            ['name' => 'Leeds'],
            ['name' => 'Leicester'],
            ['name' => 'Lichfield'],
            ['name' => 'Lincoln'],
            ['name' => 'Liverpool'],
            ['name' => 'London'],
            ['name' => 'Manchester'],
            ['name' => 'Newcastle upon Tyne'],
            ['name' => 'Norwich'],
            ['name' => 'Nottingham'],
            ['name' => 'Oxford'],
            ['name' => 'Peterborough'],
            ['name' => 'Plymouth'],
            ['name' => 'Portsmouth'],
            ['name' => 'Preston'],
            ['name' => 'Ripon'],
            ['name' => 'Salford'],
            ['name' => 'Salisbury'],
            ['name' => 'Sheffield'],
            ['name' => 'Southampton'],
            ['name' => 'St Albans'],
            ['name' => 'Stoke-on-Trent'],
            ['name' => 'Sunderland'],
            ['name' => 'Truro'],
            ['name' => 'Wakefield'],
            ['name' => 'Wells'],
            ['name' => 'Westminster'],
            ['name' => 'Winchester'],
            ['name' => 'Wolverhampton'],
            ['name' => 'Worcester'],
            ['name' => 'York']
        ];

        foreach ($locations as $item) {
            Location::create($item);
        }

        $memberships = [
            ['type' => Membership::TYPE_BASIC],
            ['type' => Membership::TYPE_STANDARD],
            ['type' => Membership::TYPE_PREMIUM]
        ];

        foreach ($memberships as $item) {
            Membership::create($item);
        }

        $priceOptions = [
            ['type' => 'STANDARD-CLASS'],
            ['type' => 'PREMIUM-CLASS'],
            ['type' => 'GOOGLES'],
            ['type' => 'SMALL-COFFEE']
        ];

        foreach ($priceOptions as $item) {
            PriceOption::create($item);
        }

        $priceItems = [
            [
                'type' => PriceItem::TYPE_CLASS,
                'name' => 'Cardio',
                'price_option_id' => 1,
                'price' => 3
            ],
            [
                'type' => PriceItem::TYPE_CLASS,
                'name' => 'Body bump',
                'price_option_id' => 1,
                'price' => 3
            ],
            [
                'type' => PriceItem::TYPE_CLASS,
                'name' => 'Zumba',
                'price_option_id' => 2,
                'price' => 6
            ],
            [
                'type' => PriceItem::TYPE_CLASS,
                'name' => 'Les mills',
                'price_option_id' => 2,
                'price' => 5
            ],
            [
                'type' => PriceItem::TYPE_PRODUCT,
                'name' => 'Red Swim googles',
                'price_option_id' => 3,
                'price' => 3
            ],
            [
                'type' => PriceItem::TYPE_PRODUCT,
                'name' => 'Blue Swim googles',
                'price_option_id' => 3,
                'price' => 3
            ],
            [
                'type' => PriceItem::TYPE_PRODUCT,
                'name' => 'Green Swim googles',
                'price_option_id' => 3,
                'price' => 3
            ],
            [
                'type' => PriceItem::TYPE_PRODUCT,
                'name' => 'Small flat whites',
                'price_option_id' => 4,
                'price' => 2
            ]
        ];

        foreach ($priceItems as $item) {
            PriceItem::create($item);
        }

        $priceItemRules = [
            [
                'price_overwrite' => 6,
                'is_weekday' => true,
                'price_item_id' => 3
            ],
            [
                'price_overwrite' => 8,
                'is_weekend' => true,
                'price_item_id' => 3
            ],
            [
                'markup' => 1.25,
                'location_id' => 1,
                'price_item_id' => 3
            ],
            [
                'membership_id' => 1,
                'disable' => true,
                'price_item_id' => 3
            ],
            [
                'markup' => 0.5,
                'membership_id' => 2,
                'price_item_id' => 3
            ],
            [
                'markup' => 0,
                'membership_id' => 3,
                'price_item_id' => 3
            ],
            [
                'markup' => 0.9,
                'membership_id' => 2,
                'price_item_id' => 8
            ],
            [
                'markup' => 0.9,
                'membership_id' => 3,
                'price_item_id' => 8
            ]
        ];

        foreach ($priceItemRules as $item) {
            PriceItemRule::create($item);
        }
    }
}
