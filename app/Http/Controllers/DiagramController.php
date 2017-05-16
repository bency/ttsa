<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiagramController extends Controller
{
    public function index()
    {
        return view('diagram');
    }

    public function data()
    {
        $data = [
            ['axis', '1989', '1990', '1991', '1992', '1993', '1994', '1995', '1996', '1997', '1998', '1999', '2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016'],
            [ 'data1' ,4766627,5285158,5717706,6170912,6333643,6853658,7167999,7465839,7770269,8045546,8349312,8692270,9023240,9611677,9969719,10334755,10649187,10885591,11149212,11390746,11656279,11942217,12221733,12481074,12719585,12996377,13244226,13513631],
            [ 'data2' ,463529,472780,479595,485445,469563,491568,472840,462832,456320,457664,461451,465117,473474,479541,482090,482931,485169,486501,485604,483240,480982,476944,475221,475003,470008,471687,467000,462145],
            [ 'data3' ,38200,42140,45931,53690,56165,59516,60191,63529,69959,75361,78429,82460,85008,88790,92593,96201,99482,108170,110046,111291,111262,111371,111796,111953,110945,111238,109649,107579],
            [ 'data3' ,95543,93022,91779,88414,81956,82372,76956,72163,69396,68378,67894,67826,67905,70945,72832,74218,75682,79180,80447,82045,84724,85828,87066,89083,89652,91248,91941,92465],
            [ 'data4' ,133635,135872,138387,144382,144118,148632,143725,139421,136220,136082,137481,136709,138117,138486,137938,136974,136980,136850,136109,134124,131847,129271,127752,126432,123402,121896,118239,114700],
            [ 'data5' ,196151,201746,203498,198959,187324,201048,191968,187719,180745,177843,177647,178122,182444,181320,178727,175538,173025,162301,159002,155780,153149,150474,148607,147535,146009,147305,147171,147401],
            [ 'data6' ,4303098,4812378,5238111,5685467,5864080,6362090,6695159,7003007,7313949,7587882,7887861,8227153,8549766,9132136,9487629,9851824,10164018,10399090,10663608,10907506,11175297,11465273,11746512,12006071,12249577,12524690,12777226,13051486],
            [ 'data7' ,2589,3332,4259,5551,6351,8015,9707,11750,13686,15515,16866,18157,19250,21305,23093,25185,26788,28192,29711,31478,33808,36477,39159,42474,45700,48543,51712,54943],
            [ 'data8' ,33901,37922,41961,45445,46162,51310,54431,57444,60413,62638,64372,67773,70436,77742,83297,89207,93291,96585,100371,103697,108196,112703,116714,120756,125066,129869,134159,138649],
            [ 'data9' ,187688,205190,225769,246935,256498,284498,303324,323294,344427,361969,380166,400630,414289,446380,463279,478777,489748,493249,502364,509645,516517,524715,530561,535305,540690,546103,548197,552317],
            [ 'data10',4078920,4565934,4966122,5387536,5555069,6018267,6327697,6610519,6895423,7147760,7426457,7740593,8045791,8586709,8917960,9258655,9554191,9781064,10031162,10262686,10516776,10791378,11060078,11307536,11538121,11800175,12043158,12305577],
            [ 'data11',0,0,0,0,0,0,0,0,0,0,0,0,0,4920,15537,24687,34691,44254,61147,74976,85807,98426,113629,142742,183316,222672,267487,305280],
            [ 'data12',5781691,6056519,6372518,6656996,6893714,7247589,7536319,7835157,8194793,8527700,8887513,9185365,9487453,9797172,10062497,10321061,10559473,10805409,11100152,11405342,11700125,11984701,12242544,12487913,12711102,13028113,13205190,13345983],
            [ 'data13',571274,603446,653151,700792,747008,799687,847416,893064,949809,991868,1032236,1056914,1073265,1095889,1118000,1122852,1119189,1111094,1092951,1068539,1041958,1018926,994810,966815,938708,904852,869307,837465],
            [ 'data14',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,3,5,3,4,4,3,3,2,4],
        ];
        $ret = [
            'xs' => [
                'data1' => 'axis',
                'data2' => 'axis',
                'data3' => 'axis',
                'data3' => 'axis',
                'data4' => 'axis',
                'data5' => 'axis',
                'data6' => 'axis',
                'data7' => 'axis',
                'data8' => 'axis',
                'data9' => 'axis',
                'data10' => 'axis',
                'data11' => 'axis',
                'data12' => 'axis',
                'data13' => 'axis',
                'data14' => 'axis',
            ],
            'columns' => $data,
            'names' => [
                'data1' => '駕照：汽車',
                'data2' => '駕照：職業駕照',
                'data3' => '駕照：職業聯結車',
                'data3' => '駕照：職業大客車',
                'data4' => '駕照：職業大貨車',
                'data5' => '駕照：職業小型車',
                'data6' => '駕照：普通駕照',
                'data7' => '駕照：普通聯結車',
                'data8' => '駕照：普通大客車',
                'data9' => '駕照：普通大貨車',
                'data10' => '駕照：普通小型車',
                'data11' => '駕照：大型重型機車',
                'data12' => '駕照：普通重型機車',
                'data13' => '駕照：普通輕型機車',
                'data14' => '駕照：小型輕型機車',
            ],
            'hide' => [
                'data1',
                'data2',
                'data3',
                'data4',
                'data5',
                'data6',
                'data7',
                'data8',
                'data9',
                'data10',
                'data12',
                'data13',
                'data14',
            ],
        ];
        return response()->json($ret);
    }
}
