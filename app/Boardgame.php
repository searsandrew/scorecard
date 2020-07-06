<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GuzzleHttp\Client;

class Boardgame extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'ref_id', 'scorecard'];

    /**
     * A boardgame has many games of it played
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function games() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Game');
    }

    /**
     * A boardgame score card was created by a user
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\User');
    }

    /**
     * Use Guzzle to fetch game info from Board Game Geek
     */
    public function geekdoAPI()
    {
        $query = sprintf('%s%u', 'https://api.geekdo.com/xmlapi/boardgame/', $this->ref_id);

        $client = new Client();
        $results = $client->request('GET', $query);
        $boardgame = json_decode(json_encode(simplexml_load_string($results->getBody(),'SimpleXMLElement',LIBXML_NOCDATA)), true);
        return $boardgame['boardgame'];
    }
}
