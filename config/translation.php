<?php

return [
    'driver' => \OneCode\Translation\Lib\Drivers\GoogleTranslateDriver::class,
    'locales' => [
        'mapping' => [
            'en_US' => 'en',
            'nb_NO' => 'no',
            'nn_NO' => 'no',
            'da_DK' => 'da',
            'nl_NL' => 'nl',
            'de_DE' => 'de',
            'lv_LV' => 'lv',
            'ru_RU' => 'ru',
            'et_EE' => 'et',
            'fi_FI' => 'fi',
            'lt_LT' => 'lt',
            'ja_JP' => 'ja',
            'sv_SE' => 'sv',
            'es_ES' => 'es',
            'it_IT' => 'it',
            'ko_KR' => 'ko',
            'in_IN' => 'hi', // This should be 'hi_IN' for Hindi?
            'zh_CN' => 'zh', // Chinese (Simplified)
            'zh_TW' => 'zh', // Chinese (Traditional)
            'pt_PT' => 'pt', // Portuguese (Portugal)
            'pt_BR' => 'pt', // Portuguese (Brazil)
            'fr_FR' => 'fr', // French (France)
            'fr_CA' => 'fr', // French (Canada)
            'ar_SA' => 'ar', // Arabic (Saudi Arabia)
            'ar_EG' => 'ar', // Arabic (Egypt)
            'tr_TR' => 'tr', // Turkish (Turkey)
            'id_ID' => 'id', // Indonesian (Indonesia)
            'pl_PL' => 'pl', // Polish (Poland)
            'uk_UA' => 'uk', // Ukrainian (Ukraine)
            'cs_CZ' => 'cs', // Czech (Czech Republic)
            'hu_HU' => 'hu', // Hungarian (Hungary)
            'ro_RO' => 'ro', // Romanian (Romania)
            'el_GR' => 'el', // Greek (Greece)
            'he_IL' => 'he', // Hebrew (Israel)
            'bg_BG' => 'bg', // Bulgarian (Bulgaria)
            'hr_HR' => 'hr', // Croatian (Croatia)
            'sk_SK' => 'sk', // Slovak (Slovakia)
            'sl_SI' => 'sl', // Slovenian (Slovenia)
            'sr_RS' => 'sr', // Serbian (Serbia)
            'sq_AL' => 'sq', // Albanian (Albania)
            'mk_MK' => 'mk', // Macedonian (North Macedonia)
            'ka_GE' => 'ka', // Georgian (Georgia)
            'hy_AM' => 'hy', // Armenian (Armenia)
            'az_AZ' => 'az', // Azerbaijani (Azerbaijan)
            'uz_UZ' => 'uz', // Uzbek (Uzbekistan)
            'kk_KZ' => 'kk', // Kazakh (Kazakhstan)
            'tg_TJ' => 'tg', // Tajik (Tajikistan)
            'ky_KG' => 'ky', // Kyrgyz (Kyrgyzstan)
            'tk_TM' => 'tk', // Turkmen (Turkmenistan)
            'mn_MN' => 'mn', // Mongolian (Mongolia)
            'th_TH' => 'th', // Thai (Thailand)
            'vi_VN' => 'vi', // Vietnamese (Vietnam)
            'ms_MY' => 'ms', // Malay (Malaysia)
            'fil_PH' => 'fil', // Filipino (Philippines)
            'hi_IN' => 'hi', // Hindi (India)
            'bn_BD' => 'bn', // Bengali (Bangladesh)
            'te_IN' => 'te', // Telugu (India)
            'ta_IN' => 'ta', // Tamil (India)
            'ur_PK' => 'ur', // Urdu (Pakistan)
            'ur_IN' => 'ur', // Urdu (India)
            'gu_IN' => 'gu', // Gujarati (India)
            'kn_IN' => 'kn', // Kannada (India)
            'ml_IN' => 'ml', // Malayalam (India)
            'si_LK' => 'si', // Sinhala (Sri Lanka)
            'ne_NP' => 'ne', // Nepali (Nepal)
            'pa_IN' => 'pa', // Punjabi (India)
            'pa_PK' => 'pa', // Punjabi (Pakistan)
            'as_IN' => 'as', // Assamese (India)
            'mr_IN' => 'mr', // Marathi (India)
            'or_IN' => 'or', // Odia (India)
            'sd_PK' => 'sd', // Sindhi (Pakistan)
            'bn_IN' => 'bn', // Bengali (India)
            'ks_IN' => 'ks', // Kashmiri (India)
            'kok_IN' => 'kok', // Konkani (India)
            'br_FR' => 'br', // Breton (France)
            'gl_ES' => 'gl', // Galician (Spain)
            'eu_ES' => 'eu', // Basque (Spain)
            'cy_GB' => 'cy', // Welsh (United Kingdom)
            'ga_IE' => 'ga', // Irish (Ireland)
            'gd_GB' => 'gd', // Scottish Gaelic (United Kingdom)
            'kw_GB' => 'kw', // Cornish (United Kingdom)
            'la_VA' => 'la', // Latin (Vatican City)
            'mt_MT' => 'mt', // Maltese (Malta)
            'to_TO' => 'to', // Tongan (Tonga)
            'haw_US' => 'haw', // Hawaiian (United States)
            'sm_WS' => 'sm', // Samoan (Samoa)
            'gag_AZ' => 'gag', // Gagauz (Azerbaijan)
            'so_SO' => 'so', // Somali (Somalia)
            'sw_KE' => 'sw', // Swahili (Kenya)
            'rw_RW' => 'rw', // Kinyarwanda (Rwanda)
            'st_LS' => 'st', // Sesotho (Lesotho)
            'nso_ZA' => 'nso', // Northern Sotho (South Africa)
            'nbl_ZA' => 'nbl', // Southern Ndebele (South Africa)
            'ss_SZ' => 'ss', // Swati (Eswatini)
            've_ZA' => 've', // Venda (South Africa)
            'ts_ZA' => 'ts', // Tsonga (South Africa)
            'am_ET' => 'am', // Amharic (Ethiopia)
            'om_ET' => 'om', // Oromo (Ethiopia)
            'om_KE' => 'om', // Oromo (Kenya)
            'aa_ER' => 'aa', // Afar (Eritrea)
            'af_ZA' => 'af', // Afrikaans (South Africa)
            'bem_ZM' => 'bem', // Bemba (Zambia)
            'ny_MW' => 'ny', // Chichewa (Malawi)
            'lg_UG' => 'lg', // Luganda (Uganda)
            'rn_BI' => 'rn', // Rundi (Burundi)
            'kln_KE' => 'kln', // Kalenjin (Kenya)
            'sn_ZW' => 'sn', // Shona (Zimbabwe)
            'sg_CF' => 'sg', // Sango (Central African Republic)
            'ti_ET' => 'ti', // Tigrinya (Ethiopia)
            'ti_ER' => 'ti', // Tigrinya (Eritrea)
            'tn_BW' => 'tn', // Setswana (Botswana)
            'tn_ZA' => 'tn', // Setswana (South Africa)
            'ksf_CM' => 'ksf', // Bafia (Cameroon)
            'ff_SN' => 'ff', // Fulah (Senegal)
            'ha_NG' => 'ha', // Hausa (Nigeria)
            'ig_NG' => 'ig', // Igbo (Nigeria)
            'yo_NG' => 'yo', // Yoruba (Nigeria)
            'pcm_NG' => 'pcm', // Nigerian Pidgin (Nigeria)
            'wo_SN' => 'wo', // Wolof (Senegal)
            'zu_ZA' => 'zu', // Zulu (South Africa)
            'xh_ZA' => 'xh', // Xhosa (South Africa)
        ],
    ],
];
