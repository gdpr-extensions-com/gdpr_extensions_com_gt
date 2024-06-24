<?php
defined('TYPO3') || die();

$frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'GdprExtensionsComGt',
    'gdprgt',
    'GDPR - GoogleReviewlist'
);

$fields = [
    'gdpr_button_shape_list' => [
        'onChange' => 'reload',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['Round', '1'],
                ['Square', '2'],
            ],
            'default' =>  '1'
        ],
    ],

    'gdpr_business_locations_list' => [
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'itemsProcFunc' => 'GdprExtensionsCom\GdprExtensionsComGt\Utility\ProcesslistItems->getLocationsforRoodPid',
        ],
    ],

    'gdpr_background_color_list' => [
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
        ],
    ],
    'gdpr_color_of_border_list' => [
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
        ],
    ],
    'gdpr_color_of_sort_dropdown_list' => [
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
        ],
    ],
    'gdpr_color_of_sort_dropdown_text_list' => [
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
        ],
    ],
    'gdpr_color_of_text_list' => [
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
        ],
    ],
    'gdpr_button_color_list' => [
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
        ],
    ],
    'gdpr_button_text_color_list' => [
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
        ],
    ],

    'gdpr_total_color_of_text_list' => [
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
        ],
    ],
    'tx_gdprreviewsclient_slider_max_reviews_list' => [
        'displayCond' => 'FIELD:gdpr_show_all_reviews_list:=:0',
        'config' => [
            'type' => 'input',
            'size' => 10,
            'eval' => 'trim,int',
            'range' => [
                'lower' => 1,
                'upper' => 100,
            ],
            'default' => 4,
            'slider' => [
                'step' => 1,
                'width' => 200,
            ],
        ],
    ],

    'gdpr_show_all_reviews_list' => [
        'onChange' => 'reload',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'items' => [
                [
                    0 => '',
                    1 => '',
                ],
            ],
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $fields);

$GLOBALS['TCA']['tt_content']['types']['gdprextensionscomgt_gdprgoogle_reviewlist'] = [
    'showitem' => '
                --palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
                 gdpr_color_of_border_list; Border Color,
                 gdpr_color_of_text_list; Text Color,
                 gdpr_background_color_list; Background Color,
                 gdpr_button_color_list ; Button Background Color,
                 gdpr_button_text_color_list ; Button Text Color,
                 gdpr_color_of_sort_dropdown_list ; Drop Down Background Color,
                 gdpr_color_of_sort_dropdown_text_list ; Drop Down Text Color,
                 tx_gdprreviewsclient_slider_max_reviews_list; Max. number of reviews,
                 gdpr_show_all_reviews_list; Show All Reviews,
                 gdpr_button_shape_list ; Button Shape,
                 gdpr_business_locations_list; Bussiness Locations,


                --div--;' . $frontendLanguageFilePrefix . 'tabs.appearance,
                --palette--;' . $frontendLanguageFilePrefix . 'palette.frames;frames,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
                --div--;' . $frontendLanguageFilePrefix . 'tabs.access,
                hidden;' . $frontendLanguageFilePrefix . 'field.default.hidden,
                --palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
        ',
];
