<?php

if ((int)\TYPO3\CMS\Core\Utility\VersionNumberUtility::getCurrentTypo3Version() >= 12) {

        return[
            'gdpr' => [
                'labels' => 'LLL:EXT:gdpr_extensions_com_gt/Resources/Private/Language/locallang_mod_web.xlf',
                'iconIdentifier' => 'gdpr_extensions_com_tab',
                'navigationComponent' => '@typo3/backend/page-tree/page-tree-element',
            ],
            'gtm' => [
                'parent' => 'gdpr',
                'position' => [],
                'access' => 'user,group',
                'iconIdentifier' => 'gdpr_two_x_gtm_plugin_gdprgoogle_reviewlist',
                'path' => '/module/gtm',
                'labels' => 'LLL:EXT:gdpr_extensions_com_gt/Resources/Private/Language/locallang_gdprmanager.xlf',
                'extensionName' => 'GdprExtensionsComGt',
                'controllerActions' => [
                    \GdprExtensionsCom\GdprExtensionsComGt\Controller\GdprManagerController::class => [
                        'list',
                        'index',
                        'show',
                        'new',
                        'create',
                        'edit',
                        'update',
                        'delete',
                        'uploadImage'
                    ],
                ],
            ]
        ];


}



