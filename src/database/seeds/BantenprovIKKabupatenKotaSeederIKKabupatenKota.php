<?php

/* Require */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/* Models */
use Bantenprov\IKKabupatenKota\Models\Bantenprov\IKKabupatenKota\IKKabupatenKota;

class BantenprovIKKabupatenKotaSeederIKKabupatenKota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
        Model::unguard();

        $ik_kabupaten_kotas = (object) [
            (object) [
                'label' => 'G2G',
                'description' => 'Goverment to Goverment',
            ],
            (object) [
                'label' => 'G2E',
                'description' => 'Goverment to Employee',
            ],
            (object) [
                'label' => 'G2C',
                'description' => 'Goverment to Citizen',
            ],
            (object) [
                'label' => 'G2B',
                'description' => 'Goverment to Business',
            ],
        ];

        foreach ($ik_kabupaten_kotas as $ik_kabupaten_kota) {
            $model = IKKabupatenKota::updateOrCreate(
                [
                    'label' => $ik_kabupaten_kota->label,
                ],
                [
                    'description' => $ik_kabupaten_kota->description,
                ]
            );
            $model->save();
        }
	}
}
