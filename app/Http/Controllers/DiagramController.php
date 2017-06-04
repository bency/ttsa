<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiagramController extends Controller
{
    public function index()
    {
        return view('diagram');
    }

    public function a1Ratio()
    {
        $axis = [
            'a1accident_axis','自用小客車','重型機車','輕型機車',
        ];
        $names = [
            'a11' => '肇事率',
            'a12' => '死亡率',
            'a13' => '受傷率',
        ];
        $columns = [
            $axis,
            ['a11',0.59,0.53,0.26],
            ['a12',0.64,0.54,0.26],
            ['a13',0.36,0.20,0.05],

        ];
        $xs = [
            'a11' => 'a1accident_axis',
            'a12' => 'a1accident_axis',
            'a13' => 'a1accident_axis',
        ];
        $hide = [
        ];
        $ret = [
            'columns' => $columns,
            'xs' => $xs,
            'type' => 'bar',
            'names' => $names,
            'hide' => $hide,
        ];
        return response()->json($ret);
    }

    public function accidentRatio()
    {
        $axis = [
            'accident_axis',
            'B03小客車-自用',
            'C01機車-大型重型1(550CC以上)',
            'C02機車-大型重型2(250-550CC)',
            'C03機車-普通重型',
            'C04機車-普通輕型',
            'C05機車-小型輕型',
        ];
        $columns = [
            $axis,
            [
                '2015',
                70.94,
                0.47 ,
                0.51 ,
                155.2,
                10.85,
                0.13 ,
            ],
        ];
        $xs = [
            '2015' => 'accident_axis',
        ];
        $hide = [
        ];
        $ret = [
            'columns' => $columns,
            'xs' => $xs,
            'type' => 'bar',
            'hide' => $hide,
        ];
        return response()->json($ret);
    }

    public function vehicles()
    {
        $data = [
            ['axis_vehicle', '1992', '1993', '1994', '1995', '1996', '1997', '1998', '1999', '2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016'],
            ['axis_motorcycle', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016'],
            ['axis_bigmotorcycle', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016'],
            ['vehicle1'  ,'3618946', '3989128', '4342573', '4684447', '4989551', '5294130', '5430095', '5359299', '5599517', '5731835', '5923200', '6133794', '6389186', '6667542', '6750169', '6768281', '6726916', '6769845', '6876515', '7053082', '7206770', '7367522', '7554319', '7739144', '7842423'],
            ['vehicle2'  ,'21294', '21210', '21252', '21598', '21772', '22743', '22871', '23798', '23923', '24053', '25079', '25628', '26453', '26967', '27522', '27361', '27339', '27667', '29030', '29991', '31098', '31960', '32928', '33890', '34531'],
            ['vehicle3'  ,'137535', '148297', '155256', '156756', '155740', '158000', '156239', '152878', '155623', '155140', '155805', '157156', '160460', '164248', '166211', '164004', '161231', '158812', '161084', '164221', '161256', '162122', '163446', '165695', '166943'],
            ['vehicle4'  ,'2900042', '3238754', '3570497', '3874203', '4146475', '4411911', '4545488', '4509430', '4716217', '4825581', '4989336', '5169733', '5390848', '5634362', '5698324', '5712842', '5674426', '5704312', '5803413', '5960088', '6091324', '6236879', '6405778', '6573746', '6666006'],
            ['vehicle5'  ,'533218', '548272', '556553', '591394', '622144', '655410', '657855', '627034', '652963', '675533', '700978', '728624', '758809', '789222', '805590', '811646', '812440', '827955', '832466', '848732', '862230', '875544', '890703', '903739', '911524'],
            ['vehicle6'  ,'26857', '32595', '39015', '40496', '43420', '46066', '47642', '46159', '50791', '51528', '52002', '52653', '52616', '52743', '52522', '52428', '51480', '51099', '50522', '50050', '60862', '61017', '61464', '62074', '63419'],
            ['vehicle7'  ,'7649308', '7867396', '8034509', '8517024', '9283914', '10051613', '10529040', '10958469', '11423172', '11733202', '11983757', '12366864', '12793950', '13195265', '13557028', '13943473', '14365442', '14604330', '14844932', '15173602', '15139628', '14195123', '13735960', '13661719', '13668227'],
            ['vehicle8'  ,'4793345', '4804375', '4802854', '5005035', '5455570', '5875734', '6199613', '6496189', '6848116', '7131438', '7386784', '7759650', '8239700', '8746286', '9225155', '9762555', '10349865', '10749348', '11112224', '11572658', '11820632', '11562830', '11586845', '11805195', '12113455'],
            ['vehicle9'  ,'7384902', '7755339', '8232759', '8735793', '9210821', '9744366', '10328010', '10725215', '11085431', '11542248', '11783803', '11512088', '11519825', '11716153', '12005298'],
            ['vehicle10' ,'1882', '4311', '6941', '10493', '14334', '18189', '21855', '24133', '26793', '30410', '36829', '50742', '67020', '89042', '108157'],
            ['vehicle11' ,'2954', '3053', '3123', '3420', '3719', '6127', '14923', '24778', '37307', '47688'],
            ['vehicle12' ,'15235', '18802', '21010', '23373', '26691', '30702', '35819', '42242', '51735', '60469'],
            ['vehicle13' ,'2855963', '3063021', '3231655', '3511989', '3828344', '4175879', '4329427', '4462280', '4575056', '4601764', '4596973', '4607214', '4554250', '4448979', '4331873', '4180918', '4015577', '3854982', '3732708', '3600944', '3318996', '2632293', '2149115', '1856524', '1554772'],
            ['vehicle14' ,'42', '21', '155', '1339', '1744', '1951', '2228', '1836', '1743', '1621'],
            ['vehicle15' ,'2855963', '3063021', '3231655', '3511989', '3828344', '4175879', '4329427', '4462280', '4575056', '4601764', '4596973', '4607214', '4554250', '4448979', '4331873', '4180876', '4015556', '3854827', '3731369', '3599200', '3317045', '2630065', '2147279', '1854781', '1553151'],
        ];
        $ret = [
            'names' => [
                'vehicle1' => '汽車總和',
                'vehicle2' => '大客車',
                'vehicle3' => '大貨車',
                'vehicle4' => '小客車',
                'vehicle5' => '小貨車',
                'vehicle6' => '特種車',
                'vehicle7' => '機車總和',
                'vehicle8' => '機車重型總和',
                'vehicle9' => '普通重型',
                'vehicle10' => '大型重型總和',
                'vehicle11' => '未滿550cc',
                'vehicle12' => '550cc以上',
                'vehicle13' => '機車輕型總和',
                'vehicle14' => '小型輕型',
                'vehicle15' => '普通輕型',
            ],
            'type' => 'line',
            'xs' => [
                'vehicle1'  => 'axis_vehicle',
                'vehicle2'  => 'axis_vehicle',
                'vehicle3'  => 'axis_vehicle',
                'vehicle4'  => 'axis_vehicle',
                'vehicle5'  => 'axis_vehicle',
                'vehicle6'  => 'axis_vehicle',
                'vehicle7'  => 'axis_vehicle',
                'vehicle8'  => 'axis_vehicle',
                'vehicle9'  => 'axis_motorcycle',
                'vehicle10' => 'axis_motorcycle',
                'vehicle11' => 'axis_bigmotorcycle',
                'vehicle12' => 'axis_bigmotorcycle',
                'vehicle13' => 'axis_vehicle',
                'vehicle14' => 'axis_bigmotorcycle',
                'vehicle15' => 'axis_vehicle',
            ],
            'hide' => [
                'vehicle1',
                'vehicle2',
                'vehicle3',
                'vehicle4',
                'vehicle5',
                'vehicle6',
                'vehicle7',
                'vehicle8',
                'vehicle9',
                'vehicle13',
                'vehicle14',
                'vehicle15',
            ],
            'columns' => $data,
        ];
        return response()->json($ret);
    }

    public function driverLicenses()
    {
        $data = [
            ['axis', '1989', '1990', '1991', '1992', '1993', '1994', '1995', '1996', '1997', '1998', '1999', '2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016'],
            ['axis2', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016'],
            [ 'data1' ,4766627,5285158,5717706,6170912,6333643,6853658,7167999,7465839,7770269,8045546,8349312,8692270,9023240,9611677,9969719,10334755,10649187,10885591,11149212,11390746,11656279,11942217,12221733,12481074,12719585,12996377,13244226,13513631],
            [ 'data2' ,463529,472780,479595,485445,469563,491568,472840,462832,456320,457664,461451,465117,473474,479541,482090,482931,485169,486501,485604,483240,480982,476944,475221,475003,470008,471687,467000,462145],
            [ 'data3' ,38200,42140,45931,53690,56165,59516,60191,63529,69959,75361,78429,82460,85008,88790,92593,96201,99482,108170,110046,111291,111262,111371,111796,111953,110945,111238,109649,107579],
            [ 'data4' ,95543,93022,91779,88414,81956,82372,76956,72163,69396,68378,67894,67826,67905,70945,72832,74218,75682,79180,80447,82045,84724,85828,87066,89083,89652,91248,91941,92465],
            [ 'data5' ,133635,135872,138387,144382,144118,148632,143725,139421,136220,136082,137481,136709,138117,138486,137938,136974,136980,136850,136109,134124,131847,129271,127752,126432,123402,121896,118239,114700],
            [ 'data6' ,196151,201746,203498,198959,187324,201048,191968,187719,180745,177843,177647,178122,182444,181320,178727,175538,173025,162301,159002,155780,153149,150474,148607,147535,146009,147305,147171,147401],
            [ 'data7' ,4303098,4812378,5238111,5685467,5864080,6362090,6695159,7003007,7313949,7587882,7887861,8227153,8549766,9132136,9487629,9851824,10164018,10399090,10663608,10907506,11175297,11465273,11746512,12006071,12249577,12524690,12777226,13051486],
            [ 'data8' ,2589,3332,4259,5551,6351,8015,9707,11750,13686,15515,16866,18157,19250,21305,23093,25185,26788,28192,29711,31478,33808,36477,39159,42474,45700,48543,51712,54943],
            [ 'data9' ,33901,37922,41961,45445,46162,51310,54431,57444,60413,62638,64372,67773,70436,77742,83297,89207,93291,96585,100371,103697,108196,112703,116714,120756,125066,129869,134159,138649],
            [ 'data10',187688,205190,225769,246935,256498,284498,303324,323294,344427,361969,380166,400630,414289,446380,463279,478777,489748,493249,502364,509645,516517,524715,530561,535305,540690,546103,548197,552317],
            [ 'data11',4078920,4565934,4966122,5387536,5555069,6018267,6327697,6610519,6895423,7147760,7426457,7740593,8045791,8586709,8917960,9258655,9554191,9781064,10031162,10262686,10516776,10791378,11060078,11307536,11538121,11800175,12043158,12305577],
            [ 'data12',4920,15537,24687,34691,44254,61147,74976,85807,98426,113629,142742,183316,222672,267487,305280],
            [ 'data13',5781691,6056519,6372518,6656996,6893714,7247589,7536319,7835157,8194793,8527700,8887513,9185365,9487453,9797172,10062497,10321061,10559473,10805409,11100152,11405342,11700125,11984701,12242544,12487913,12711102,13028113,13205190,13345983],
            [ 'data14',571274,603446,653151,700792,747008,799687,847416,893064,949809,991868,1032236,1056914,1073265,1095889,1118000,1122852,1119189,1111094,1092951,1068539,1041958,1018926,994810,966815,938708,904852,869307,837465],
            [ 'data15',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,3,5,3,4,4,3,3,2,4],
        ];
        $ret = [
            'axes' => [
                'data1' => 'y2',
                'data2' => 'y2',
                'data3' => 'y2',
                'data4' => 'y2',
                'data5' => 'y2',
                'data6' => 'y2',
                'data7' => 'y2',
                'data8' => 'y2',
                'data9' => 'y2',
                'data10' => 'y2',
                'data11' => 'y2',
                'data12' => 'y2',
                'data13' => 'y2',
                'data14' => 'y2',
                'data15' => 'y2',
            ],
            'xs' => [
                'data1' => 'axis',
                'data2' => 'axis',
                'data3' => 'axis',
                'data4' => 'axis',
                'data5' => 'axis',
                'data6' => 'axis',
                'data7' => 'axis',
                'data8' => 'axis',
                'data9' => 'axis',
                'data10' => 'axis',
                'data11' => 'axis',
                'data12' => 'axis2',
                'data13' => 'axis',
                'data14' => 'axis',
                'data15' => 'axis',
            ],
            'type' => 'bar',
            'types' => [
                'data1'  => 'line',
                'data2'  => 'line',
                'data7'  => 'line',
                'data12' => 'line',
                'data13' => 'line',
                'data14' => 'line',
                'data15' => 'line',
            ],
            'columns' => $data,
            'groups' => [
                ['data3', 'data4', 'data5', 'data6'],
                ['data8', 'data9', 'data10', 'data11']
            ],
            'names' => [
                'data1' => '駕照：汽車',
                'data2' => '駕照：職業駕照',
                'data3' => '駕照：職業聯結車',
                'data4' => '駕照：職業大客車',
                'data5' => '駕照：職業大貨車',
                'data6' => '駕照：職業小型車',
                'data7' => '駕照：普通駕照',
                'data8' => '駕照：普通聯結車',
                'data9' => '駕照：普通大客車',
                'data10' => '駕照：普通大貨車',
                'data11' => '駕照：普通小型車',
                'data12' => '駕照：大型重型機車',
                'data13' => '駕照：普通重型機車',
                'data14' => '駕照：普通輕型機車',
                'data15' => '駕照：小型輕型機車',
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
                'data11',
                'data13',
                'data14',
                'data15',
            ],
        ];
        return response()->json($ret);
    }
}