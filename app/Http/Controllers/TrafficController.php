<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrafficController extends Controller
{
    public function predict()
    {
        return view('traffic.predict');
    }

    public function index()
    {
        $phases = [
            [
                'name' => '環中東路-強國路-榮民路',
                'intersection' => 4,
                'phases' => [
                    [
                        'lightset' => 'gggrrrrrrrrr',
                        'interval' => 18,
                    ],
                    [
                        'lightset' => 'rggrrrgggrrr',
                        'interval' => 39,
                    ],
                    [
                        'lightset' => 'rrrrrrrrrggg',
                        'interval' => 33,
                    ],
                    [
                        'lightset' => 'rrrgggrrrrrr',
                        'interval' => 30,
                    ],
                ],
                'spec' => [
                    [
                        'name' => '榮民路往南',
                        'id' => 0,
                    ],
                    [
                        'name' => '強國路',
                        'id' => 1,
                    ],
                    [
                        'name' => '還中東路',
                        'id' => 2,
                    ],
                    [
                        'name' => '榮民路往北',
                        'id' => 3,
                    ],
                ],
            ],
            [
                'name' => '錦州街',
                'intersection' => 4,
                'phases' => [
                    [
                        'lightset' => 'gggrrrgggrrr',
                        'interval' => 90,
                    ],
                    [
                        'lightset' => 'rrrgggrrrggg',
                        'interval' => 30,
                    ],
                ],
                'spec' => [
                    [
                        'name' => '錦州街往東',
                        'id' => 0,
                    ],
                    [
                        'name' => '民生東路二段 147 巷',
                        'id' => 1,
                    ],
                    [
                        'name' => '錦州街往西',
                        'id' => 2,
                    ],
                    [
                        'name' => '民權東路二段 152 巷',
                        'id' => 3,
                    ],
                ],
            ]
        ];
        $turn_map = [
            '左轉',
            '直行',
            '右轉'
        ];
        $offset = [];
        $j = 0;
        foreach ($phases as $phase) {
            $intersections = $phase['intersection'];
            $light_count = strlen($phase['phases'][0]['lightset']);
            $group_size = $light_count / $intersections;
            for ($i = 0; $i < $light_count; $i++) {
                $group = floor($i / $group_size);
                $data = ['green' => 0, 'red' => 0, 'period' => 0, 'offset' => null, 'id' => 0];
                $see_green = false;
                foreach ($phase['phases'] as $p) {
                    $light = substr($p['lightset'], $i, 1);
                    if ('g' == $light) {
                        $see_green = true;
                        $data['green'] += $p['interval'];
                    } elseif ('r' == $light) {
                        $data['red'] += $p['interval'];
                    }

                    if ($see_green and is_null($data['offset'])) {
                        $data['offset'] =  -$data['red'];
                    }
                }
                $data['period'] = $data['red'] + $data['green'];
                $data['offset'] = ($data['offset'] + $data['period']) % $data['period'];
                $data['id'] = $j++;
                $data['name'] = $phase['spec'][$group]['name'] . $turn_map[$i % $group_size];
                $data['countDown'] = 0;
                $data['width'] = [];
                $offset[] = $data;
            }
        }
        return response()->json($offset);
    }
}
