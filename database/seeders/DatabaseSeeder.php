<?php

namespace Database\Seeders;

use App\Models\Hrana;
use App\Models\Porudzbina;
use App\Models\Restoran;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Restoran::truncate();
        Hrana::truncate();
        Porudzbina::truncate();

        $user1=User::factory()->create();
        $user2=User::factory()->create();
        $user3=User::factory()->create();

        $restorani=Restoran::factory(4)->create();

       $hrana1 =  Hrana::factory(6)->create([
           'restoran_id'=>$restorani[0]
        ]);
        $hrana2 = Hrana::factory(2)->create([
           'restoran_id'=>$restorani[1]
        ]);
        $hrana3 = Hrana::factory(3)->create([
           'restoran_id'=>$restorani[2]
        ]);
        $hrana4 = Hrana::factory(2)->create([
           'restoran_id'=>$restorani[3]
        ]);
        Porudzbina::factory()->create([
           'hrana_id'=>$hrana1[0]->id,
           'user_id'=>$user1->id,
           'dostava_cena' => $hrana1[0]->cena+200
        ]);
        Porudzbina::factory()->create([
           'hrana_id'=>$hrana1[2]->id,
           'user_id'=>$user1->id,
           'dostava_cena' => $hrana1[2]->cena+180
        ]);
        Porudzbina::factory()->create([
           'hrana_id'=>$hrana2[1]->id,
           'user_id'=>$user3->id,
           'dostava_cena' => $hrana1[2]->cena+220
        ]);
        Porudzbina::factory()->create([
           'hrana_id'=>$hrana3[1]->id,
           'user_id'=>$user1->id,
           'dostava_cena' => $hrana1[2]->cena+90
        ]);
        Porudzbina::factory()->create([
           'hrana_id'=>$hrana3[2]->id,
           'user_id'=>$user2->id,
           'dostava_cena' => $hrana1[2]->cena+150
        ]);
        Porudzbina::factory()->create([
           'hrana_id'=>$hrana3[2]->id,
           'user_id'=>$user2->id,
           'dostava_cena' => $hrana4[0]->cena+70
        ]);

    }
}
