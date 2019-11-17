<?php

namespace App\Http\Controllers;

use App\PokerSite;

class PokerSiteController extends Controller
{
    public function getData()
    {
        $return = [];

        $data = PokerSite::select('site', 'daily_date')->selectRaw('sum(balance) as total')->groupBy('site', 'daily_date')->get();

        $site_counter = -1;
        foreach ($data->groupBy('site') as $site_name => $value) {

            $site_counter++;

            $new_data[$site_counter] = [
                'name' => $site_name,
                'series' => [],
            ];

            foreach ($value as $v) {
                $new_data[$site_counter]['series'][] = ['date' => $v->daily_date, 'balance' => $v->total];
            }
        }
        return $new_data;

    }
}
