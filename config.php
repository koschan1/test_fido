<?php

return [
   "display_errors" => false,
   "https" => true,
   "private_hash" => "8bd0fb862fff9416fd51c809cff28a9f",
   "private_hex" => "ab70445e1d3cb3bfce165244543f6e55",
   "feed_ads_key" => "33697351",
   "cron_key" => "41963437",
   "folder_admin" => "cp_615dbaa20a2ac",
   "basePath" => __dir__,
   "urlPrefix" => "/",
   "urlPath" => "https://ttxon.uz",
   "key_rand" => mt_rand(100000000, 999999999),
   "create_mode" => 0777,
   "template_path" => __dir__."/templates",
   "template_folder" => "templates",

   "elasticsearch" => [
     "status" => false,
   ],

   "db" => [
     "port" => "",
     "host" => "localhost",
     "database" => "cx67296_ttxon",
     "user" => "root",
     "pass" => "",
     "charset" => "utf8",
   ],

   "number_format" => [
      "decimals" => 0,
      "dec_point" => ".",
      "thousands_sep" => ",",
      "currency_spacing" => " ",
   ],

   "media" => [
      "temp_images" => "temp/images",
      "other" => "media/others",
      "attach" => "media/attach",
      "no_image" => "media/others/icon_photo.png",
      "avatar" => "media/images_users",
      "users" => "media/images_users",
      "avatar_admin" => "media/others",
      "no_avatar" => "media/others/no_avatar.png",
      "big_image_blog" => "media/images_blog/big",
      "banners" => "media/promo",
      "image_category" => "media/others",
      "big_image_ads" => "media/images_boards/big",
      "small_image_ads" => "media/images_boards/small",
      "manager" => "media/manager",
   ],

   "css_styles" => [
        'css/line-awesome.min.css',
        'css/bootstrap.min.css',
        'css/ionicons/ionicons.min.css',
        'css/styles.css',
        'js/owl-carousel/owl.carousel.min.css',
        'js/owl-carousel/owl.theme.default.css',
        'js/slick/slick-theme.css',
        'js/slick/slick.css',
        'css/lightgallery.css',
        'css/lightslider.css',
        'js/dragula/dragula.min.css',
        'js/ion/css/ion.rangeSlider.min.css',
        'css/animate.css',
        'js/summernote/summernote-lite.css',
        'js/summernote/summernote.min.css',
        'js/summernote/summernote-bs4.css',
        'js/minicolors/jquery.minicolors.css',
        'js/dropzone/dropzone.min.css',
        'js/apexcharts/apexcharts.css',
   ],

   "js_plugins" => [
        'js/jquery-3.6.0.min.js',
        'js/bootstrap.bundle.min.js',
        'js/bootstrap.bundle.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',  
        'js/jquery.cookie.js',
        'js/owl-carousel/owl.carousel.min.js',
        'js/slick/slick.min.js',
        'js/unisite-select.js',
        'js/vendor.js',
        'js/cart.js',
        'js/chat.js',
        'https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js',
        'js/lightgallery.min.js',
        'js/lightslider.min.js',
        'js/lg-zoom.min.js',
        'js/lg-thumbnail.min.js',
        'js/lg-video.js',
        'js/lg-autoplay.js',
        'js/ion/js/ion.rangeSlider.min.js',
        'js/jquery-inputformat.min.js',
        'js/dragula/dragula.min.js',
        'js/jquery.maskedinput.min.js',
        'js/jquery.countdown.min.js',
        'js/apexcharts/apexcharts.min.js',
        'js/auth.js',
        'js/tippy.all.min.js',
        [ 'ad_create'=> ['js/create.js','js/dropzone/dropzone.min.js','js/jquery-ui.min.js','js/jquery.ui.touch-punch.min.js'] ],
        [ 'ad_update'=> ['js/create.js','js/dropzone/dropzone.min.js','js/jquery-ui.min.js','js/jquery.ui.touch-punch.min.js'] ],
        [ 'ad_view'=> ['js/view.js'] ],
        [ 'profile'=> ['js/user.js'] ],
        [ 'chat'=> ['js/user.js'] ],
        [ 'catalog'=> ['js/catalog.js'] ],
        [ 'blog'=> ['js/blog.js'] ],
        [ 'blog_view'=> ['js/blog.js'] ],
        [ 'index'=> ['js/index.js'] ],
        [ 'map'=> ['js/map.js'] ],
        [ 'order'=> ['js/order.js'] ],
        [ 'shop'=> ['js/shop.js','js/ckeditor5-inline/ckeditor.min.js'] ],
        [ 'shops'=> ['js/shops.js'] ],
        [ 'promo'=> ['js/summernote/summernote-lite.js','js/summernote/summernote.min.js','js/summernote/summernote-bs4.js','js/summernote/lang/summernote-ru-RU.min.js','js/minicolors/jquery.minicolors.min.js'] ],
   ],

   "timezone" => [
        '(UTC-11:00) Midway Island' => 'Pacific/Midway',
        '(UTC-11:00) Samoa' => 'Pacific/Samoa',
        '(UTC-10:00) Hawaii' => 'Pacific/Honolulu',
        '(UTC-09:00) Alaska' => 'US/Alaska',
        '(UTC-08:00) Pacific Time (US &amp; Canada)' => 'America/Los_Angeles',
        '(UTC-08:00) Tijuana' => 'America/Tijuana',
        '(UTC-07:00) Arizona' => 'US/Arizona',
        '(UTC-07:00) Chihuahua' => 'America/Chihuahua',
        '(UTC-07:00) Mazatlan' => 'America/Mazatlan',
        '(UTC-07:00) Mountain Time (US &amp; Canada)' => 'US/Mountain',
        '(UTC-06:00) Central America' => 'America/Managua',
        '(UTC-06:00) Central Time (US &amp; Canada)' => 'US/Central',
        '(UTC-06:00) Mexico City' => 'America/Mexico_City',
        '(UTC-06:00) Monterrey' => 'America/Monterrey',
        '(UTC-06:00) Saskatchewan' => 'Canada/Saskatchewan',
        '(UTC-05:00) Bogota' => 'America/Bogota',
        '(UTC-05:00) Eastern Time (US &amp; Canada)' => 'US/Eastern',
        '(UTC-05:00) Indiana (East)' => 'US/East-Indiana',
        '(UTC-05:00) Lima' => 'America/Lima',
        '(UTC-05:00) Quito' => 'America/Bogota',
        '(UTC-04:00) Atlantic Time (Canada)' => 'Canada/Atlantic',
        '(UTC-04:30) Caracas' => 'America/Caracas',
        '(UTC-04:00) La Paz' => 'America/La_Paz',
        '(UTC-04:00) Santiago' => 'America/Santiago',
        '(UTC-03:30) Newfoundland' => 'Canada/Newfoundland',
        '(UTC-03:00) Brasilia' => 'America/Sao_Paulo',
        '(UTC-03:00) Buenos Aires' => 'America/Argentina/Buenos_Aires',
        '(UTC-03:00) Greenland' => 'America/Godthab',
        '(UTC-02:00) Mid-Atlantic' => 'America/Noronha',
        '(UTC-01:00) Azores' => 'Atlantic/Azores',
        '(UTC-01:00) Cape Verde Is.' => 'Atlantic/Cape_Verde',
        '(UTC+00:00) Casablanca' => 'Africa/Casablanca',
        '(UTC+00:00) Edinburgh' => 'Europe/London',
        '(UTC+00:00) Greenwich Mean Time : Dublin' => 'Etc/Greenwich',
        '(UTC+00:00) Lisbon' => 'Europe/Lisbon',
        '(UTC+00:00) London' => 'Europe/London',
        '(UTC+00:00) Monrovia' => 'Africa/Monrovia',
        '(UTC+01:00) Amsterdam' => 'Europe/Amsterdam',
        '(UTC+01:00) Belgrade' => 'Europe/Belgrade',
        '(UTC+01:00) Berlin' => 'Europe/Berlin',
        '(UTC+01:00) Bratislava' => 'Europe/Bratislava',
        '(UTC+01:00) Brussels' => 'Europe/Brussels',
        '(UTC+01:00) Budapest' => 'Europe/Budapest',
        '(UTC+01:00) Copenhagen' => 'Europe/Copenhagen',
        '(UTC+01:00) Ljubljana' => 'Europe/Ljubljana',
        '(UTC+01:00) Madrid' => 'Europe/Madrid',
        '(UTC+01:00) Paris' => 'Europe/Paris',
        '(UTC+01:00) Prague' => 'Europe/Prague',
        '(UTC+01:00) Rome' => 'Europe/Rome',
        '(UTC+01:00) Sarajevo' => 'Europe/Sarajevo',
        '(UTC+01:00) Skopje' => 'Europe/Skopje',
        '(UTC+01:00) Stockholm' => 'Europe/Stockholm',
        '(UTC+01:00) Vienna' => 'Europe/Vienna',
        '(UTC+01:00) Warsaw' => 'Europe/Warsaw',
        '(UTC+01:00) West Central Africa' => 'Africa/Lagos',
        '(UTC+01:00) Zagreb' => 'Europe/Zagreb',
        '(UTC+02:00) Athens' => 'Europe/Athens',
        '(UTC+02:00) Bucharest' => 'Europe/Bucharest',
        '(UTC+02:00) Cairo' => 'Africa/Cairo',
        '(UTC+02:00) Harare' => 'Africa/Harare',
        '(UTC+02:00) Helsinki' => 'Europe/Helsinki',
        '(UTC+02:00) Istanbul' => 'Europe/Istanbul',
        '(UTC+02:00) Jerusalem' => 'Asia/Jerusalem',
        '(UTC+02:00) Kyiv' => 'Europe/Helsinki',
        '(UTC+02:00) Pretoria' => 'Africa/Johannesburg',
        '(UTC+02:00) Riga' => 'Europe/Riga',
        '(UTC+02:00) Sofia' => 'Europe/Sofia',
        '(UTC+02:00) Tallinn' => 'Europe/Tallinn',
        '(UTC+02:00) Vilnius' => 'Europe/Vilnius',
        '(UTC+03:00) Baghdad' => 'Asia/Baghdad',
        '(UTC+03:00) Kuwait' => 'Asia/Kuwait',
        '(UTC+03:00) Minsk' => 'Europe/Minsk',
        '(UTC+03:00) Nairobi' => 'Africa/Nairobi',
        '(UTC+03:00) Riyadh' => 'Asia/Riyadh',
        '(UTC+03:00) Volgograd' => 'Europe/Volgograd',
        '(UTC+03:30) Tehran' => 'Asia/Tehran',
        '(UTC+04:00) Abu Dhabi' => 'Asia/Muscat',
        '(UTC+04:00) Baku' => 'Asia/Baku',
        '(UTC+04:00) Moscow' => 'Europe/Moscow',
        '(UTC+04:00) Muscat' => 'Asia/Muscat',
        '(UTC+04:00) St. Petersburg' => 'Europe/Moscow',
        '(UTC+04:00) Tbilisi' => 'Asia/Tbilisi',
        '(UTC+04:00) Yerevan' => 'Asia/Yerevan',
        '(UTC+04:30) Kabul' => 'Asia/Kabul',
        '(UTC+05:00) Islamabad' => 'Asia/Karachi',
        '(UTC+05:00) Karachi' => 'Asia/Karachi',
        '(UTC+05:00) Tashkent' => 'Asia/Tashkent',
        '(UTC+05:30) Chennai' => 'Asia/Calcutta',
        '(UTC+05:30) Kolkata' => 'Asia/Kolkata',
        '(UTC+05:30) Mumbai' => 'Asia/Calcutta',
        '(UTC+05:30) New Delhi' => 'Asia/Calcutta',
        '(UTC+05:30) Sri Jayawardenepura' => 'Asia/Calcutta',
        '(UTC+05:45) Kathmandu' => 'Asia/Katmandu',
        '(UTC+06:00) Almaty' => 'Asia/Almaty',
        '(UTC+06:00) Astana' => 'Asia/Dhaka',
        '(UTC+06:00) Dhaka' => 'Asia/Dhaka',
        '(UTC+06:00) Ekaterinburg' => 'Asia/Yekaterinburg',
        '(UTC+06:30) Rangoon' => 'Asia/Rangoon',
        '(UTC+07:00) Bangkok' => 'Asia/Bangkok',
        '(UTC+07:00) Hanoi' => 'Asia/Bangkok',
        '(UTC+07:00) Jakarta' => 'Asia/Jakarta',
        '(UTC+07:00) Novosibirsk' => 'Asia/Novosibirsk',
        '(UTC+08:00) Beijing' => 'Asia/Hong_Kong',
        '(UTC+08:00) Chongqing' => 'Asia/Chongqing',
        '(UTC+08:00) Hong Kong' => 'Asia/Hong_Kong',
        '(UTC+08:00) Krasnoyarsk' => 'Asia/Krasnoyarsk',
        '(UTC+08:00) Kuala Lumpur' => 'Asia/Kuala_Lumpur',
        '(UTC+08:00) Perth' => 'Australia/Perth',
        '(UTC+08:00) Singapore' => 'Asia/Singapore',
        '(UTC+08:00) Taipei' => 'Asia/Taipei',
        '(UTC+08:00) Ulaan Bataar' => 'Asia/Ulan_Bator',
        '(UTC+08:00) Urumqi' => 'Asia/Urumqi',
        '(UTC+09:00) Irkutsk' => 'Asia/Irkutsk',
        '(UTC+09:00) Osaka' => 'Asia/Tokyo',
        '(UTC+09:00) Sapporo' => 'Asia/Tokyo',
        '(UTC+09:00) Seoul' => 'Asia/Seoul',
        '(UTC+09:00) Tokyo' => 'Asia/Tokyo',
        '(UTC+09:30) Adelaide' => 'Australia/Adelaide',
        '(UTC+09:30) Darwin' => 'Australia/Darwin',
        '(UTC+10:00) Brisbane' => 'Australia/Brisbane',
        '(UTC+10:00) Canberra' => 'Australia/Canberra',
        '(UTC+10:00) Guam' => 'Pacific/Guam',
        '(UTC+10:00) Hobart' => 'Australia/Hobart',
        '(UTC+10:00) Melbourne' => 'Australia/Melbourne',
        '(UTC+10:00) Port Moresby' => 'Pacific/Port_Moresby',
        '(UTC+10:00) Sydney' => 'Australia/Sydney',
        '(UTC+10:00) Yakutsk' => 'Asia/Yakutsk',
        '(UTC+11:00) Vladivostok' => 'Asia/Vladivostok',
        '(UTC+12:00) Auckland' => 'Pacific/Auckland',
        '(UTC+12:00) Fiji' => 'Pacific/Fiji',
        '(UTC+12:00) International Date Line West' => 'Pacific/Kwajalein',
        '(UTC+12:00) Kamchatka' => 'Asia/Kamchatka',
        '(UTC+12:00) Magadan' => 'Asia/Magadan',
        '(UTC+12:00) Marshall Is.' => 'Pacific/Fiji',
        '(UTC+12:00) New Caledonia' => 'Asia/Magadan',
        '(UTC+12:00) Solomon Is.' => 'Asia/Magadan',
        '(UTC+12:00) Wellington' => 'Pacific/Auckland',
        '(UTC+13:00) Nuku\'alofa' => 'Pacific/Tongatapu'
   ],

   "format_phone" => [
        "AB" => ["country_ru" => "Абхазия","country_lat" => "Abkhazia","iso" => "AB","code" => "7940","length" => "11"],
        "JM" => ["country_ru" => "Ямайка","country_lat" => "Jamaica","iso" => "JM","code" => "1876","length" => "11"],
        "KN" => ["country_ru" => "Сент-Китс и Невис","country_lat" => "Saint Kitts And Nevis","iso" => "KN","code" => "1869","length" => "11"],
        "TT" => ["country_ru" => "Тринидад и Тобаго","country_lat" => "Trinidad And Tobago","iso" => "TT","code" => "1868","length" => "11"],
        "DO" => ["country_ru" => "Доминиканская республика","country_lat" => "Dominican Republic","iso" => "DO","code" => "1809","length" => "11"],
        "PR" => ["country_ru" => "Пуэрто Рико","country_lat" => "Puerto Rico","iso" => "PR","code" => "1787","length" => "11"],
        "VC" => ["country_ru" => "Сент Винцент и Гренадины","country_lat" => "Saint Vincent And The Grenadines","iso" => "VC","code" => "1784","length" => "11"],
        "DM" => ["country_ru" => "Доминика","country_lat" => "Dominica","iso" => "DM","code" => "1767","length" => "11"],
        "LC" => ["country_ru" => "Санта Лючия","country_lat" => "Saint Lucia","iso" => "LC","code" => "1758","length" => "11"],
        "GD" => ["country_ru" => "Гренада","country_lat" => "Grenada","iso" => "GD","code" => "1473","length" => "11"],
        "BM" => ["country_ru" => "Бермуды","country_lat" => "Bermuda","iso" => "BM","code" => "1441","length" => "11"],
        "KY" => ["country_ru" => "Каймановы о-ва","country_lat" => "Cayman Islands","iso" => "KY","code" => "1345","length" => "11"],
        "VG" => ["country_ru" => "Британские Вирджинские о-ва","country_lat" => "British Virgin Islands","iso" => "VG","code" => "1284","length" => "11"],
        "AG" => ["country_ru" => "Антигуа и Барбуда","country_lat" => "Antigua And Barbuda","iso" => "AG","code" => "1268","length" => "11"],
        "BB" => ["country_ru" => "Барбадос","country_lat" => "Barbados","iso" => "BB","code" => "1246","length" => "11"],
        "BS" => ["country_ru" => "Багамские о-ва","country_lat" => "Bahamas","iso" => "BS","code" => "1242","length" => "11"],
        "UZ" => ["country_ru" => "Узбекистан","country_lat" => "Uzbekistan","iso" => "UZ","code" => "998","length" => "12"],
        "KG" => ["country_ru" => "Кыргызстан","country_lat" => "Kyrgyzstan","iso" => "KG","code" => "996","length" => "12"],
        "GE" => ["country_ru" => "Грузия","country_lat" => "Georgia","iso" => "GE","code" => "995","length" => "12"],
        "AZ" => ["country_ru" => "Азербайджан","country_lat" => "Azerbaijan","iso" => "AZ","code" => "994","length" => "12"],
        "TM" => ["country_ru" => "Туркменистан","country_lat" => "Turkmenistan","iso" => "TM","code" => "993","length" => "11"],
        "TJ" => ["country_ru" => "Таджикистан","country_lat" => "Tajikistan","iso" => "TJ","code" => "992","length" => "12"],
        "NP" => ["country_ru" => "Непал","country_lat" => "Nepal","iso" => "NP","code" => "977","length" => "13"],
        "MN" => ["country_ru" => "Монголия","country_lat" => "Mongolia","iso" => "MN","code" => "976","length" => "11"],
        "BT" => ["country_ru" => "Бутан","country_lat" => "Bhutan","iso" => "BT","code" => "975","length" => "11"],
        "QA" => ["country_ru" => "Катар","country_lat" => "Qatar","iso" => "QA","code" => "974","length" => "11"],
        "BH" => ["country_ru" => "Бахрейн","country_lat" => "Bahrain","iso" => "BH","code" => "973","length" => "11"],
        "IL" => ["country_ru" => "Израиль","country_lat" => "Israel","iso" => "IL","code" => "972","length" => "12"],
        "AE" => ["country_ru" => "Объединенные Арабские эмираты","country_lat" => "United Arab Emirates","iso" => "AE","code" => "971","length" => "12"],
        "PS" => ["country_ru" => "Палестина","country_lat" => "Palestinian Territories","iso" => "PS","code" => "970","length" => "12"],
        "OM" => ["country_ru" => "Оман","country_lat" => "Oman","iso" => "OM","code" => "968","length" => "11"],
        "YE" => ["country_ru" => "Йемен","country_lat" => "Yemen","iso" => "YE","code" => "967","length" => "12"],
        "SA" => ["country_ru" => "Саудовская Аравия","country_lat" => "Saudi Arabia","iso" => "SA","code" => "966","length" => "12"],
        "KW" => ["country_ru" => "Кювейт","country_lat" => "Kuwait","iso" => "KW","code" => "965","length" => "11"],
        "IQ" => ["country_ru" => "Ирак","country_lat" => "Iraq","iso" => "IQ","code" => "964","length" => "13"],
        "SY" => ["country_ru" => "Сирия","country_lat" => "Syrian Arab Republic","iso" => "SY","code" => "963","length" => "12"],
        "JO" => ["country_ru" => "Иордания","country_lat" => "Jordan","iso" => "JO","code" => "962","length" => "12"],
        "LB" => ["country_ru" => "Ливан","country_lat" => "Lebanon","iso" => "LB","code" => "961","length" => "11"],
        "MV" => ["country_ru" => "Мальдивы","country_lat" => "Maldives","iso" => "MV","code" => "960","length" => "10"],
        "TW" => ["country_ru" => "Тайвань","country_lat" => "Taiwan","iso" => "TW","code" => "886","length" => "12"],
        "BD" => ["country_ru" => "Бангладеш","country_lat" => "Bangladesh","iso" => "BD","code" => "880","length" => "13"],
        "KH" => ["country_ru" => "Камбоджа","country_lat" => "Cambodia","iso" => "KH","code" => "855","length" => "11"],
        "MO" => ["country_ru" => "Макао","country_lat" => "Macao","iso" => "MO","code" => "853","length" => "11"],
        "HK" => ["country_ru" => "Гонг Конг","country_lat" => "Hong Kong","iso" => "HK","code" => "852","length" => "11"],
        "PF" => ["country_ru" => "Французская Полинезия","country_lat" => "French Polynesia","iso" => "PF","code" => "689","length" => "9"],
        "NC" => ["country_ru" => "Новая Каледония","country_lat" => "New Caledonia","iso" => "NC","code" => "687","length" => "9"],
        "AS" => ["country_ru" => "Самоа","country_lat" => "Samoa","iso" => "AS","code" => "685","length" => "9"],
        "CK" => ["country_ru" => "о-ва Кука","country_lat" => "Cook Islands","iso" => "CK","code" => "682","length" => "8"],
        "FJ" => ["country_ru" => "Фиджи","country_lat" => "Fiji","iso" => "FJ","code" => "679","length" => "10"],
        "VU" => ["country_ru" => "Вануату","country_lat" => "Vanuatu","iso" => "VU","code" => "678","length" => "10"],
        "SB" => ["country_ru" => "Соломоновы острова","country_lat" => "Solomon Islands","iso" => "SB","code" => "677","length" => "10"],
        "TO" => ["country_ru" => "Тонга","country_lat" => "Tonga","iso" => "TO","code" => "676","length" => "10"],
        "PG" => ["country_ru" => "Папуа-Новая Гвинея","country_lat" => "Papua New Guinea","iso" => "PG","code" => "675","length" => "10"],
        "NR" => ["country_ru" => "Науру","country_lat" => "Nauru","iso" => "NR","code" => "674","length" => "10"],
        "BN" => ["country_ru" => "Бруней","country_lat" => "Brunei Darussalam","iso" => "BN","code" => "673","length" => "10"],
        "GU" => ["country_ru" => "Гуам","country_lat" => "Guam","iso" => "GU","code" => "671","length" => "11"],
        "MP" => ["country_ru" => "Северо-Марианские о-ва","country_lat" => "Northern Mariana Islands","iso" => "MP","code" => "670","length" => "11"],
        "AN" => ["country_ru" => "Кюрасао","country_lat" => "Curacao","iso" => "AN","code" => "599","length" => "11"],
        "UY" => ["country_ru" => "Уругвай","country_lat" => "Uruguay","iso" => "UY","code" => "598","length" => "11"],
        "SR" => ["country_ru" => "Суринам","country_lat" => "Suriname","iso" => "SR","code" => "597","length" => "10"],
        "MQ" => ["country_ru" => "Мартиника","country_lat" => "Martinique","iso" => "MQ","code" => "596","length" => "12"],
        "PY" => ["country_ru" => "Парагвай","country_lat" => "Paraguay","iso" => "PY","code" => "595","length" => "12"],
        "GF" => ["country_ru" => "Французская Гвиана","country_lat" => "French Guiana","iso" => "GF","code" => "594","length" => "12"],
        "EC" => ["country_ru" => "Эквадор","country_lat" => "Ecuador","iso" => "EC","code" => "593","length" => "12"],
        "BO" => ["country_ru" => "Боливия","country_lat" => "Bolivia","iso" => "BO","code" => "591","length" => "11"],
        "GP" => ["country_ru" => "Гваделупа","country_lat" => "Guadeloupe","iso" => "GP","code" => "590","length" => "12"],
        "HT" => ["country_ru" => "Гаити","country_lat" => "Haiti","iso" => "HT","code" => "509","length" => "11"],
        "PA" => ["country_ru" => "Панама","country_lat" => "Panama","iso" => "PA","code" => "507","length" => "11"],
        "CR" => ["country_ru" => "Коста-Рика","country_lat" => "Costa Rica","iso" => "CR","code" => "506","length" => "11"],
        "NI" => ["country_ru" => "Никарагуа","country_lat" => "Nicaragua","iso" => "NI","code" => "505","length" => "11"],
        "HN" => ["country_ru" => "Гондурас","country_lat" => "Honduras","iso" => "HN","code" => "504","length" => "11"],
        "SV" => ["country_ru" => "Эль Сальвадор","country_lat" => "El Salvador","iso" => "SV","code" => "503","length" => "11"],
        "GT" => ["country_ru" => "Гватемала","country_lat" => "Guatemala","iso" => "GT","code" => "502","length" => "11"],
        "BZ" => ["country_ru" => "Белиз","country_lat" => "Belize","iso" => "BZ","code" => "501","length" => "10"],
        "LI" => ["country_ru" => "Лихтенштейн","country_lat" => "Liechtenstein","iso" => "LI","code" => "423","length" => "12"],
        "SK" => ["country_ru" => "Словакия","country_lat" => "Slovakia","iso" => "SK","code" => "421","length" => "12"],
        "CZ" => ["country_ru" => "Чешская республика","country_lat" => "Czech Republic","iso" => "CZ","code" => "420","length" => "12"],
        "MK" => ["country_ru" => "Македония","country_lat" => "Macedonia","iso" => "MK","code" => "389","length" => "11"],
        "BA" => ["country_ru" => "Босния","country_lat" => "Bosnia And Herzegovina","iso" => "BA","code" => "387","length" => "11"],
        "SI" => ["country_ru" => "Словения","country_lat" => "Slovenia","iso" => "SI","code" => "386","length" => "11"],
        "HR" => ["country_ru" => "Хорватия","country_lat" => "Croatia","iso" => "HR","code" => "385","length" => "11"],
        "CS" => ["country_ru" => "Сербия","country_lat" => "Serbia","iso" => "CS","code" => "381","length" => "11"],
        "UA" => ["country_ru" => "Украина","country_lat" => "Ukraine","iso" => "UA","code" => "380","length" => "12"],
        "SM" => ["country_ru" => "Сан-Марино","country_lat" => "San Marino","iso" => "SM","code" => "378","length" => "11"],
        "MC" => ["country_ru" => "Монако","country_lat" => "Monaco","iso" => "MC","code" => "377","length" => "12"],
        "AD" => ["country_ru" => "Андорра","country_lat" => "Andorra","iso" => "AD","code" => "376","length" => "9"],
        "BY" => ["country_ru" => "Беларусь","country_lat" => "Belarus","iso" => "BY","code" => "375","length" => "12"],
        "AM" => ["country_ru" => "Армения","country_lat" => "Armenia","iso" => "AM","code" => "374","length" => "11"],
        "MD" => ["country_ru" => "Молдова","country_lat" => "Moldova","iso" => "MD","code" => "373","length" => "11"],
        "EE" => ["country_ru" => "Эстония","country_lat" => "Estonia","iso" => "EE","code" => "372","length" => "11"],
        "LV" => ["country_ru" => "Латвия","country_lat" => "Latvia","iso" => "LV","code" => "371","length" => "11"],
        "LT" => ["country_ru" => "Литва","country_lat" => "Lithuania","iso" => "LT","code" => "370","length" => "11"],
        "BG" => ["country_ru" => "Болгария","country_lat" => "Bulgaria","iso" => "BG","code" => "359","length" => "12"],
        "FI" => ["country_ru" => "Финляндия","country_lat" => "Finland","iso" => "FI","code" => "358","length" => "12"],
        "CY" => ["country_ru" => "Кипр","country_lat" => "Cyprus","iso" => "CY","code" => "357","length" => "11"],
        "MT" => ["country_ru" => "Мальта","country_lat" => "Malta","iso" => "MT","code" => "356","length" => "11"],
        "AL" => ["country_ru" => "Албания","country_lat" => "Albania","iso" => "AL","code" => "355","length" => "12"],
        "IS" => ["country_ru" => "Исландия","country_lat" => "Iceland","iso" => "IS","code" => "354","length" => "10"],
        "IE" => ["country_ru" => "Ирландия","country_lat" => "Ireland","iso" => "IE","code" => "353","length" => "12"],
        "LU" => ["country_ru" => "Люксенбург","country_lat" => "Luxembourg","iso" => "LU","code" => "352","length" => "12"],
        "PT" => ["country_ru" => "Португалия","country_lat" => "Portugal","iso" => "PT","code" => "351","length" => "12"],
        "GI" => ["country_ru" => "Гибралтар","country_lat" => "Gibraltar","iso" => "GI","code" => "350","length" => "11"],
        "GL" => ["country_ru" => "Гренландия","country_lat" => "Greenland","iso" => "GL","code" => "299","length" => "9"],
        "FO" => ["country_ru" => "Фарерские острова","country_lat" => "Faroe Islands","iso" => "FO","code" => "298","length" => "9"],
        "AW" => ["country_ru" => "Аруба","country_lat" => "Aruba","iso" => "AW","code" => "297","length" => "10"],
        "KM" => ["country_ru" => "Коморские о-ва","country_lat" => "Comoros","iso" => "KM","code" => "269","length" => "10"],
        "BW" => ["country_ru" => "Ботсвана","country_lat" => "Botswana","iso" => "BW","code" => "267","length" => "11"],
        "LS" => ["country_ru" => "Лесото","country_lat" => "Lesotho","iso" => "LS","code" => "266","length" => "11"],
        "MW" => ["country_ru" => "Малави","country_lat" => "Malawi","iso" => "MW","code" => "265","length" => "12"],
        "NA" => ["country_ru" => "Намибия","country_lat" => "Namibia","iso" => "NA","code" => "264","length" => "12"],
        "ZW" => ["country_ru" => "Зимбабве","country_lat" => "Zimbabwe","iso" => "ZW","code" => "263","length" => "12"],
        "RE" => ["country_ru" => "Реюнион","country_lat" => "Reunion","iso" => "RE","code" => "262","length" => "12"],
        "MG" => ["country_ru" => "Мадагаскар","country_lat" => "Madagascar","iso" => "MG","code" => "261","length" => "12"],
        "ZM" => ["country_ru" => "Замбия","country_lat" => "Zambia","iso" => "ZM","code" => "260","length" => "12"],
        "MZ" => ["country_ru" => "Мозамбик","country_lat" => "Mozambique","iso" => "MZ","code" => "258","length" => "12"],
        "BI" => ["country_ru" => "Бурунди","country_lat" => "Burundi","iso" => "BI","code" => "257","length" => "11"],
        "UG" => ["country_ru" => "Уганда","country_lat" => "Uganda","iso" => "UG","code" => "256","length" => "12"],
        "TZ" => ["country_ru" => "Танзания","country_lat" => "Tanzania","iso" => "TZ","code" => "255","length" => "12"],
        "KE" => ["country_ru" => "Кения","country_lat" => "Kenya","iso" => "KE","code" => "254","length" => "12"],
        "ET" => ["country_ru" => "Эфиопия","country_lat" => "Ethiopia","iso" => "ET","code" => "251","length" => "12"],
        "RW" => ["country_ru" => "Руанда","country_lat" => "Rwanda","iso" => "RW","code" => "250","length" => "12"],
        "SD" => ["country_ru" => "Судан","country_lat" => "Sudan","iso" => "SD","code" => "249","length" => "12"],
        "SC" => ["country_ru" => "Сейшельские острова","country_lat" => "Seychelles","iso" => "SC","code" => "248","length" => "10"],
        "GW" => ["country_ru" => "Гвинея-Бисау","country_lat" => "Guinea-Bissau","iso" => "GW","code" => "245","length" => "10"],
        "AO" => ["country_ru" => "Ангола","country_lat" => "Angola","iso" => "AO","code" => "244","length" => "12"],
        "CD" => ["country_ru" => "Конго","country_lat" => "Congo [DRC]","iso" => "CD","code" => "242","length" => "12"],
        "GA" => ["country_ru" => "Габон","country_lat" => "Gabon","iso" => "GA","code" => "241","length" => "11"],
        "GQ" => ["country_ru" => "Экваториальная Гвинея","country_lat" => "Equatorial Guinea","iso" => "GQ","code" => "240","length" => "12"],
        "CV" => ["country_ru" => "Капе Верде","country_lat" => "Cape Verde","iso" => "CV","code" => "238","length" => "10"],
        "CM" => ["country_ru" => "Камерун","country_lat" => "Cameroon","iso" => "CM","code" => "237","length" => "11"],
        "CF" => ["country_ru" => "ЦАР","country_lat" => "Central African Republic","iso" => "CF","code" => "236","length" => "11"],
        "TD" => ["country_ru" => "Чад","country_lat" => "Chad","iso" => "TD","code" => "235","length" => "11"],
        "NG" => ["country_ru" => "Нигерия","country_lat" => "Nigeria","iso" => "NG","code" => "234","length" => "13"],
        "GH" => ["country_ru" => "Гана","country_lat" => "Ghana","iso" => "GH","code" => "233","length" => "12"],
        "SL" => ["country_ru" => "Сьерра-Леоне","country_lat" => "Sierra Leone","iso" => "SL","code" => "232","length" => "11"],
        "LR" => ["country_ru" => "Либерия","country_lat" => "Liberia","iso" => "LR","code" => "231","length" => "10"],
        "MU" => ["country_ru" => "Маврикий","country_lat" => "Mauritius","iso" => "MU","code" => "230","length" => "10"],
        "BJ" => ["country_ru" => "Бенин","country_lat" => "Benin","iso" => "BJ","code" => "229","length" => "11"],
        "TG" => ["country_ru" => "Того","country_lat" => "Togo","iso" => "TG","code" => "228","length" => "11"],
        "NE" => ["country_ru" => "Нигер","country_lat" => "Niger","iso" => "NE","code" => "227","length" => "11"],
        "BF" => ["country_ru" => "Буркина Фасо","country_lat" => "Burkina Faso","iso" => "BF","code" => "226","length" => "11"],
        "CI" => ["country_ru" => "Берег слоновой кости","country_lat" => "Cote D'Ivoire","iso" => "CI","code" => "225","length" => "11"],
        "GN" => ["country_ru" => "Гвинея","country_lat" => "Guinea","iso" => "GN","code" => "224","length" => "11"],
        "ML" => ["country_ru" => "Мали","country_lat" => "Mali","iso" => "ML","code" => "223","length" => "11"],
        "MR" => ["country_ru" => "Мавритания","country_lat" => "Mauritania","iso" => "MR","code" => "222","length" => "11"],
        "SN" => ["country_ru" => "Сенегал","country_lat" => "Senegal","iso" => "SN","code" => "221","length" => "12"],
        "GM" => ["country_ru" => "Гамбия","country_lat" => "Gambia","iso" => "GM","code" => "220","length" => "10"],
        "TN" => ["country_ru" => "Тунис","country_lat" => "Tunisia","iso" => "TN","code" => "216","length" => "11"],
        "DZ" => ["country_ru" => "Алжир","country_lat" => "Algeria","iso" => "DZ","code" => "213","length" => "12"],
        "MA" => ["country_ru" => "Марокко","country_lat" => "Morocco","iso" => "MA","code" => "212","length" => "12"],
        "IR" => ["country_ru" => "Иран","country_lat" => "Iran","iso" => "IR","code" => "98","length" => "12"],
        "LK" => ["country_ru" => "Шри-Ланка","country_lat" => "Sri Lanka","iso" => "LK","code" => "94","length" => "11"],
        "AF" => ["country_ru" => "Афганистан","country_lat" => "Afghanistan","iso" => "AF","code" => "93","length" => "11"],
        "PK" => ["country_ru" => "Пакистан","country_lat" => "Pakistan","iso" => "PK","code" => "92","length" => "12"],
        "IN" => ["country_ru" => "Индия","country_lat" => "India","iso" => "IN","code" => "91","length" => "12"],
        "TR" => ["country_ru" => "Турция","country_lat" => "Turkey","iso" => "TR","code" => "90","length" => "12"],
        "CN" => ["country_ru" => "Китай","country_lat" => "China","iso" => "CN","code" => "86","length" => "13"],
        "VN" => ["country_ru" => "Вьетнам","country_lat" => "Vietnam","iso" => "VN","code" => "84","length" => "11"],
        "KR" => ["country_ru" => "Южная Корея","country_lat" => "South Korea","iso" => "KR","code" => "82","length" => "12"],
        "JP" => ["country_ru" => "Япония","country_lat" => "Japan","iso" => "JP","code" => "81","length" => "12"],
        "KZ" => ["country_ru" => "Казахстан","country_lat" => "Kazakhstan","iso" => "KZ","code" => "77","length" => "11"],
        "TH" => ["country_ru" => "Таиланд","country_lat" => "Thailand","iso" => "TH","code" => "66","length" => "11"],
        "SG" => ["country_ru" => "Сингапур","country_lat" => "Singapore","iso" => "SG","code" => "65","length" => "10"],
        "NZ" => ["country_ru" => "Новая Зеландия","country_lat" => "New Zealand","iso" => "NZ","code" => "64","length" => "11"],
        "PH" => ["country_ru" => "Филиппины","country_lat" => "Philippines","iso" => "PH","code" => "63","length" => "12"],
        "ID" => ["country_ru" => "Индонезия","country_lat" => "Indonesia","iso" => "ID","code" => "62","length" => "11"],
        "AU" => ["country_ru" => "Австралия","country_lat" => "Australia","iso" => "AU","code" => "61","length" => "11"],
        "MY" => ["country_ru" => "Малайзия","country_lat" => "Malaysia","iso" => "MY","code" => "60","length" => "11"],
        "VE" => ["country_ru" => "Венесуэла","country_lat" => "Venezuela","iso" => "VE","code" => "58","length" => "12"],
        "CO" => ["country_ru" => "Колумбия","country_lat" => "Colombia","iso" => "CO","code" => "57","length" => "12"],
        "CL" => ["country_ru" => "Чили","country_lat" => "Chile","iso" => "CL","code" => "56","length" => "11"],
        "BR" => ["country_ru" => "Бразилия","country_lat" => "Brazil","iso" => "BR","code" => "55","length" => "12"],
        "AR" => ["country_ru" => "Аргентина","country_lat" => "Argentina","iso" => "AR","code" => "54","length" => "13"],
        "CU" => ["country_ru" => "Куба","country_lat" => "Cuba","iso" => "CU","code" => "53","length" => "10"],
        "MX" => ["country_ru" => "Мексика","country_lat" => "Mexico","iso" => "MX","code" => "52","length" => "13"],
        "PE" => ["country_ru" => "Перу","country_lat" => "Peru","iso" => "PE","code" => "51","length" => "11"],
        "DE" => ["country_ru" => "Германия","country_lat" => "Germany","iso" => "DE","code" => "49","length" => "12"],
        "PL" => ["country_ru" => "Польша","country_lat" => "Poland","iso" => "PL","code" => "48","length" => "11"],
        "NO" => ["country_ru" => "Норвегия","country_lat" => "Norway","iso" => "NO","code" => "47","length" => "10"],
        "SE" => ["country_ru" => "Швеция","country_lat" => "Sweden","iso" => "SE","code" => "46","length" => "11"],
        "DK" => ["country_ru" => "Дания","country_lat" => "Denmark","iso" => "DK","code" => "45","length" => "10"],
        "UK" => ["country_ru" => "Великобритания","country_lat" => "United Kingdom","iso" => "UK","code" => "44","length" => "12"],
        "AT" => ["country_ru" => "Австрия","country_lat" => "Austria","iso" => "AT","code" => "43","length" => "12"],
        "CH" => ["country_ru" => "Швейцария","country_lat" => "Switzerland","iso" => "CH","code" => "41","length" => "11"],
        "RO" => ["country_ru" => "Румыния","country_lat" => "Romania","iso" => "RO","code" => "40","length" => "11"],
        "IT" => ["country_ru" => "Италия","country_lat" => "Italy","iso" => "IT","code" => "39","length" => "12"],
        "HU" => ["country_ru" => "Венгрия","country_lat" => "Hungary","iso" => "HU","code" => "36","length" => "11"],
        "ES" => ["country_ru" => "Испания","country_lat" => "Spain","iso" => "ES","code" => "34","length" => "11"],
        "FR" => ["country_ru" => "Франция","country_lat" => "France","iso" => "FR","code" => "33","length" => "11"],
        "BE" => ["country_ru" => "Бельгия","country_lat" => "Belgium","iso" => "BE","code" => "32","length" => "11"],
        "NL" => ["country_ru" => "Нидерланды","country_lat" => "Netherlands","iso" => "NL","code" => "31","length" => "11"],
        "GR" => ["country_ru" => "Греция","country_lat" => "Greece","iso" => "GR","code" => "30","length" => "12"],
        "ZA" => ["country_ru" => "ЮАР","country_lat" => "South Africa","iso" => "ZA","code" => "27","length" => "11"],
        "LY" => ["country_ru" => "Ливия","country_lat" => "Libya","iso" => "LY","code" => "21","length" => "12"],
        "EG" => ["country_ru" => "Египет","country_lat" => "Egypt","iso" => "EG","code" => "20","length" => "12"],
        "RU" => ["country_ru" => "Россия","country_lat" => "Russia","iso" => "RU","code" => "7","length" => "11"],
        "CA" => ["country_ru" => "Канада","country_lat" => "Canada","iso" => "CA","code" => "1","length" => "11"],
   ],

   "sms_services" => [
        "sms.ru" => [ "url" => "https://sms.ru", "param" => "id", "country" => "Россия", 'call' => true ],
        "iqsms.ru" => [ "url" => "https://iqsms.ru", "param" => "login:pass", "country" => "Россия", "label" => true ],
        "smsc.ru" => [ "url" => "https://smsc.ru", "param" => "login:pass", "country" => "Россия", "label" => true, 'call' => true ],
        "smsc.kz" => [ "url" => "https://smsc.kz", "param" => "login:pass", "country" => "Казахстан", "label" => true, 'call' => true ],
        "mobizon.kz" => [ "url" => "https://mobizon.kz", "param" => "id", "country" => "Казахстан" ],
        "turbosms.ua" => [ "url" => "https://turbosms.ua", "param" => "id", "country" => "Украина", "label" => true ],
        "mobizon.ua" => [ "url" => "https://mobizon.ua", "param" => "id", "country" => "Украина" ],
        "sms.by" => [ "url" => "https://sms.by", "param" => "id", "country" => "Беларусь" ],
        "cheapglobalsms.com" => [ "url" => "https://cheapglobalsms.com", "param" => "login:pass" ],
        "osonsms.com" => [ "url" => "https://osonsms.com", "param" => "login:pass", "country" => "Таджикистан", "label" => true ],
        "playmobile.uz" => [ "url" => "playmobile.uz", "param" => "login:pass", "country" => "" ],
   ],

   "icon_colors" => ["#FD3660","#0572EC", "#E78AF2", "#6DF066", "#A8DEC7", "#EB66AA", "#DFFB2D", "#387876", "#ED979C", "#F6772A", "#A1BED1", "#D1AD2A", "#B207E0", "#E9D3D3", "#95345F", "#02F4AA", "#219972", "#FDCB07", "#8EB945", "#DD5E54", "#4C8BF4", "#9D5CCB", "#82D8E9", "#C82C97", "#E57920", "#E9A7D5", "#6CAC27", "#2EA0A2", "#7A14AF"],

];

?>