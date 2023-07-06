<?php

namespace App\Console\Commands;

use App\Models\Province;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class AddProvince extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:province';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This artisant for add province from rajaongkir';

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
            $this->error('Failed add data province');
            $this->error('URL or Key Invalid');
            return 0;
        }
        $check = Province::count();
        $response = Http::withHeaders([
            'key' => $key
        ])->get($urlRajaOngkir . '/province', []);
        if ($response->getstatusCode() == 200) {

            $result = json_decode($response->getBody())->rajaongkir->results;
            for ($i = 0; $i < count($result); $i++) {
                $dataProvince[] = [
                    'province_id' => $result[$i]->province_id,
                    'province' => $result[$i]->province,
                ];
            }
            if ($check == 0) {
                $this->info('Data added successfully');
            } else {
                $this->info('Data updated successfully');
            }
            Province::truncate();
            Province::insert($dataProvince);
            return 0;
        } else {
            $this->error('Failed added data');
            $this->info($response->getBody());
            return 0;
        }
    }
}
