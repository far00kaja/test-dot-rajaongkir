<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class AddCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:city';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This artisan command is used to add city data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $key = env('RAJAONGKIR_API_KEY');
        $urlRajaOngkir = env('RAJAONGKIR_URL');
        if ($key == null || $urlRajaOngkir == null) {
            $this->error('Failed add data city');
            $this->error('URL or Key Invalid');
            return 0;
        }
        $check = City::count();
        $response = Http::withHeaders([
            'key' => $key
        ])->get($urlRajaOngkir . '/city', []);
        if ($response->getstatusCode() == 200) {

            $result = json_decode($response->getBody())->rajaongkir->results;
            for ($i = 0; $i < count($result); $i++) {
                $dataCity[] = [
                    "city_id" => $result[$i]->city_id,
                    "province_id" => $result[$i]->province_id,
                    "province" => $result[$i]->province,
                    "type" => $result[$i]->type,
                    "city_name" => $result[$i]->city_name,
                    "postal_code" => $result[$i]->postal_code
                ];
            }
            if ($check == 0) {
                $this->info('Data city added successfully');
            } else {
                $this->info('Data city updated successfully');
            }
            City::truncate();
            City::insert($dataCity);
            return 0;
        } else {
            $this->error('Failed added data');
            $this->info($response->getBody());
            return 0;
        }
    }
}
