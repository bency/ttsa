var data = [
{time: new Date(1975,10,4) , episode: 1, name: '疏導復興橋下交通流量，市警局決報請市府建機車專用地下道'},
{time: new Date(1975,10,12), episode: 1, name: '體育家郝更生博士被摩托車撞倒逝世'},
{time: new Date(1975,10,13), episode: 1, name: '機車騎士殺人自殺，多少名人倒於輪下'},
{time: new Date(1975,10,13), episode: 1, name: '黑白集：摩托車殺人'},
{time: new Date(1975,10,14), episode: 1, name: '郝更生被機車撞傷致死，肇事人將移送法辦，高梓決定不予追訴'},
{time: new Date(1975,10,14), episode: 1, name: '機車肇禍嚴重 應抑制增加率 交通警察機關極表重視 釜底抽薪嚴格限制速度'},
{time: new Date(1975,10,14), episode: 2, name: '社論：機車問題的非感情觀'},
{time: new Date(1975,10,15), episode: 2, name: '安全島節目主持人被機車撞上安全島 羅蘭受傷住院 慨嘆騎士橫行 莫羨龍騰虎躍 轉眼人仰馬翻'},
{time: new Date(1975,10,16), episode: 2, name: '黑白集：龍騰虎躍'},
{time: new Date(1975,10,16), episode: 3, name: '財政部建議交通單位及省市政府強制辦理機車第三責任險'},
{time: new Date(1975,10,16), episode: 2, name: '機車肇禍喪生 去年數近千人 監委力促整頓交通秩序 主張禁止機車行駛市區'},
{time: new Date(1975,10,18), episode: 3, name: '駕駛機車違規下月重罰 獨輪蛇行要罰千元以上 交通部昨呼籲駕駛人戴安全帽附載人應跨坐'},
{time: new Date(1975,10,18), episode: 3, name: '大家談：機車騎士何去何從 逐漸淘汰標本兼治'},
{time: new Date(1975,10,18), episode: 3, name: '黑白集：寓禁於征'},
{time: new Date(1975,10,19), episode: 3, name: '機車肇禍 造成混亂 立委力促速謀改善 整頓交通秩序刻不容緩 交長答詢決採有效措施'},
{time: new Date(1975,10,20), episode: 3, name: '鬧區表演飛車 截獲拘留三天 陳期聰被捕受重罰'},
{time: new Date(1975,10,21), episode: 3, name: '謝主席昨表示 限發機車執照 降低國產汽車售價'},
{time: new Date(1975,10,21), episode: 3, name: '北市上月交通情形 機車肇禍數量最高 汽車違規停車最多'},
{time: new Date(1975,10,22), episode: 3, name: '女學士慘死機車輪下 男朋友舉行冥婚聯姻 台大畢業兩心相許 車禍香消玉殞 愛情間真生死不渝 殯儀館中成親'},
{time: new Date(1975,10,22), episode: 3, name: '台省主席建議中央 禁止國外機車進口'},
{time: new Date(1975,10,22), episode: 3, name: '根據交通單位統計資料 分析機車肇禍情形 似可採取自然淘汰'},
{time: new Date(1975,10,23), episode: 3, name: '機車問題嚴重 必須迅謀解決 交通法規決予修正 加重處罰違規行為 內政部長昨表示：將與有關機關協調限制機車增加'},
{time: new Date(1975,10,23), episode: 3, name: '台省交通安全會報 研討限制機車發展 將擬定辦法報中央核定'},
{time: new Date(1975,10,23), episode: 3, name: '交長慨談機車 目前無法禁絕 總數超過一百六十萬輛 七月份起月增三萬多輛'},
{time: new Date(1975,10,25), episode: 3, name: '籌募郝更生基金 獲各方熱烈響應'},
{time: new Date(1975,10,25), episode: 3, name: '推單車穿越馬路 被兩輛汽車輾撞 台大學生白光亮傷勢嚴重 兩腿折斷腦震盪 昏迷四天'},
{time: new Date(1975,10,27), episode: 3, name: '中華路東側及忠孝西路原則決定禁行機車 警局研擬疏導市區交通 考慮設公車專用道'},
{time: new Date(1975,10,27), episode: 3, name: '大家談：機車頻肇禍 限制面面觀'},
{time: new Date(1975,10,28), episode: 3, name: '立委李儒聰提建議 嚴限機車進口 劃定禁行地區 安全協會籲駕駛人守法'},
{time: new Date(1975,10,28), episode: 3, name: '滿載瓦斯貨車肇禍 楊梅路上火光燭天 煞車失靈連撞三輛汽車 引發爆炸造成四人重傷'},
{time: new Date(1975,10,29), episode: 2, name: '國產機車銷售量 今年已達最高峰 很多父母請求監理處 使其子弟考不取駕照'},
{time: new Date(1975,10,29), episode: 2, name: '機車騎士棄輕就重 呼嘯蛇行災禍迭起 專家分析 肇事因素多屬人為 正本清源 首應培養守法觀念'},
{time: new Date(1975,10,30), episode: 2, name: '騎重機車呼嘯過街 三名高中學生 被罰拘留三天'},
{time: new Date(1975,10,31), episode: 2, name: '機車違規行駛 警方全面取締 保安機車分隊加強巡邏'},
{time: new Date(1975,11,3) , episode: 2, name: '騎機車違規 兩少年被捕'},
{time: new Date(1975,11,4) , episode: 2, name: '使機車不能夠超速 結構上作特殊設計 交部將邀有關單位研商'},
{time: new Date(1975,11,4) , episode: 2, name: '公路客車超車肇禍 三十五人受傷'},
{time: new Date(1975,11,7) , episode: 2, name: '兩機車騎士 違規被拘留 警方昨呼籲駕駛人 應依照新號誌行車'},
{time: new Date(1975,11,9) , episode: 1, name: '騎士違規行車 涉嫌撞傷警員 陳崐龍被帶回警局偵訊 另八人分別受拘留處分'},
{time: new Date(1975,11,10), episode: 1, name: '機車造成交通混亂 省擬四項改善措施 加強公車營運 發展電動汽車 輔導廠商轉業 限制國外進口'},
{time: new Date(1975,11,10), episode: 1, name: '新購機車突然爆炸 引起火警燬屋四棟'},
{time: new Date(1975,11,11), episode: 1, name: '機車製噪音不甘被取締 表演孤輪術掉進窟窿裡'},
{time: new Date(1975,11,13), episode: 1, name: '取締飛車黨 已經有效果 警方想出許多辦法 十幾天取締廿一件 新訂處罰條款很重 奉勸騎士安份守法'},
{time: new Date(1975,11,13), episode: 1, name: '偷開鄰居轎車 載女友去兜風 兩高工學生被截獲'},
{time: new Date(1975,11,23), episode: 1, name: '機車問題莫衷一是 三部首長步調參差'},
{time: new Date(1975,11,23), episode: 1, name: '機車造成公害 尚難全面淘汰 管理未能改善 交長深感慚愧 務期整頓秩序 保障行人安全'},
{time: new Date(1975,11,23), episode: 1, name: '擴大管制機車行駛 市府擬定三種方案'},
{time: new Date(1975,11,23), episode: 1, name: '客車和卡車對撞 三死十八人受傷'},
{time: new Date(1975,11,27), episode: 1, name: '婦女動員減少機車公害 勸導期是注重行車安全 崇她設舉辦促進機車交通安全座談 母勸子女勸父妻勸夫遵守交通規定'},
{time: new Date(1975,11,27), episode: 1, name: '台省主席函覆監委 防止機車肇事 已採多項措施'},
{time: new Date(1975,11,27), episode: 1, name: '今後考機車駕照 將增加心理測驗'}
];
var chart = new d3KitTimeline('#timeline', {
    direction: 'right',
    initialHeight: 2250,
    layerGap: 100,
    margin: {left: 100, right: 150},
    labelPadding: {
        left: 20
    },
    scale: d3.time.scale(),
    labella: {
        algorithm: 'simple',
        stubWidth: 100,
    },
    timeFn: function (d) {
        return d.time;
    },
    textFn: d => d.time.getFullYear() + '-' + (d.time.getMonth()) + '-' + d.time.getDate() + ' ' + d.name
});

$.get('/api/report/' + location.pathname.split('/')[2]).done(function (ret) {
    var data = new Array();
    for (i in ret) {
        data.push({
            time: new Date(ret[i].time),
            name: ret[i].name
        });
    }
    chart.data(data).visualize().resizeToFit();
});
