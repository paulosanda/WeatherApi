<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

Class GetWeather extends BaseService
{    
    public function rules()
    {
        return [
            'lat' => 'string' ,
            'lon' => 'string',
            'user_ip' => 'required|string',
        ];
    }

    /**
     * uri
     *
     * @var mixed
     */
    private $uri;    
    /**
     * key
     *
     * @var mixed
     */
    private $key;
    
    /**
     * __construct
     *
     * @param  mixed $uri
     * @param  mixed $key
     * @return void
     */
    public function __construct()
    {
        $this->uri = config('services.gateways.hgbrasil.uri');
        
        $this->key = config('services.gateways.hgbrasil.api-key');
    }
    
    /**
     * execute
     *
     * @param  mixed $data
     * @return void
     */
    public function execute($data)
    {
        $this->validate($data);
        //dd($data);
        try {
            $urlConsulta = $this->uri.'?key='.$this->key.'&lat='.$data['lat'].'&lon='.$data['lon'].'&user_ip='.$data['user_ip'];
            //dd($urlConsulta);
            $weather = Http::get($urlConsulta);
            return $weather;

        } catch (\Exception $e) {
            return $e;
        }

    }

}