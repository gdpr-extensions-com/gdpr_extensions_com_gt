<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComGt',
        'gdprgt',
        [
            \GdprExtensionsCom\GdprExtensionsComGt\Controller\GdprExtensionsComGtController::class => 'index , showReviews, ajax'
        ],
        // non-cacheable actions
        [
            \GdprExtensionsCom\GdprExtensionsComGt\Controller\GdprExtensionsComGtController::class => 'showReviews, ajax',
            \GdprExtensionsCom\GdprExtensionsComGt\Controller\GdprManagerController::class => 'create, update, delete'
        ],

    );

    // register plugin for cookie widget
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComGt',
        'gdprcookiewidget',
        [
            \GdprExtensionsCom\GdprExtensionsComGt\Controller\GdprCookieWidgetController::class => 'index, ajax'
        ],
        // non-cacheable actions
        [
            \GdprExtensionsCom\GdprExtensionsComGt\Controller\GdprCookieWidgetController::class => 'index, ajax'
        ],
    );



    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    gdprcookiewidget {
                        iconIdentifier = gdpr_two_x_gtm_plugin_gdprgoogle_reviewlist
                        title = cookie
                        description = LLL:EXT:gdpr_extensions_com_gt/Resources/Private/Language/locallang_db.xlf:tx_gdpr_two_x_gtm_gdprgoogle_reviewlist.description
                        tt_content_defValues {
                            CType = list
                            list_type = gdprextensionscomgt_gdprcookiewidget
                        }
                    }
                }
                show = *
            }
       }'
    );
    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod.wizards.newContentElement.wizardItems {
               gdpr.header = LLL:EXT:gdpr_extensions_com_gt/Resources/Private/Language/locallang_db.xlf:tx_gdpr_two_x_gtm_gdprgoogle_reviewlist.name.tab
        }'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.common {
                elements {
                    gdprtgt {
                        iconIdentifier = gdpr_two_x_gtm_plugin_gdprgoogle_reviewlist
                        title = LLL:EXT:gdpr_extensions_com_gt/Resources/Private/Language/locallang_db.xlf:tx_gdpr_two_x_gtm_gdprgoogle_reviewlist.name
                        description = LLL:EXT:gdpr_extensions_com_gt/Resources/Private/Language/locallang_db.xlf:tx_gdpr_two_x_gtm_gdprgoogle_reviewlist.description
                        tt_content_defValues {
                            CType = gdprextensionscomgt_gdprgt

                        }
                    }
                }
                show = *
            }
       }'
    );
    $registeredTasks = $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'];
    $alreadyRegistered = 0;
    foreach($registeredTasks as $registeredTask){

        if(isset($registeredTask['extension']) && strpos($registeredTask['extension'], 'Googlereview') !== false){
            $alreadyRegistered +=1;
        }

    }


    if(!$alreadyRegistered){
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\GdprExtensionsCom\GdprExtensionsComGt\Commands\SyncReviewsTask::class] = [
            'extension' => 'GdprExtensionsComGt',
            'title' => 'Sync gdpr reviews',
            'description' => 'Sync gdpr reviews',
            'additionalFields' => \GdprExtensionsCom\GdprExtensionsComGt\Commands\SyncReviewsTask::class,
        ];
    }


})();
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \GdprExtensionsCom\GdprExtensionsComGt\Hooks\DataHandlerHook::class;
if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['GdprExtensionsComGt'])) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['GdprExtensionsComGt'] = [
        'frontend' => \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class,
        'backend' => \TYPO3\CMS\Core\Cache\Backend\FileBackend::class,
        'groups' => ['all', 'GdprExtensionsComGt'],
        'options' => [
            'defaultLifetime' => 3600, // Cache lifetime in seconds
        ],
    ];
}
