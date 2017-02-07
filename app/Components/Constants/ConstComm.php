<?php
/**
 * Created by PhpStorm.
 * User: trungpt21
 * Date: 11/9/2016
 * Time: 10:06 AM
 */

namespace App\Components\Constants;


class ConstComm
{
    const KEY_SESSION_REDIRECT = 'index';

    const STATUS_RESPONSE_SUCCESS = 200;

    const CACHE_TIME_HOME = 60; // minutes

    // roles
    const ROLES = [

    ];

    // permissions
    const PERMISSIONS = [
        'SUPER_ADMIN' => 'SUPER_ADMIN',

        'ADMIN_SONG' => 'ADMIN_SONG',
        'CP_SONG' => 'CP_SONG',

        'ADMIN_VIDEO' => 'ADMIN_VIDEO',
        'CP_VIDEO' => 'CP_VIDEO',

        'ADMIN_ALBUM' => 'ADMIN_ALBUM',
        'CP_ALBUM' => 'CP_ALBUM',

        'ADMIN_RADIO' => 'ADMIN_RADIO',
        'CP_RADIO' => 'CP_RADIO',

        'ADMIN_NEWS' => 'ADMIN_NEWS',
        'CP_NEWS' => 'CP_NEWS',

        'ADMIN_SINGER' => 'ADMIN_SINGER',
        'ADMIN_AUTHOR' => 'ADMIN_AUTHOR',
        'ADMIN_RINGBACKTONE' => 'ADMIN_RINGBACKTONE',
        'ADMIN_RANK' => 'ADMIN_RANK',
        'ADMIN_RANK_SONG' => 'ADMIN_RANK_SONG',
        'ADMIN_RANK_VIDEO' => 'ADMIN_RANK_VIDEO',

        'ADMIN_FLASHHOT' => 'ADMIN_FLASHHOT',
        'ADMIN_TOPIC' => 'ADMIN_TOPIC',
        'ADMIN_CATEGORY' => 'ADMIN_CATEGORY',
        'ADMIN_KCSMS' => 'ADMIN_KCSMS',
        'ADMIN_INLINEBOX' => 'ADMIN_INLINEBOX',
        'ADMIN_BANNER' => 'ADMIN_BANNER',
        'ADMIN_POPUP' => 'ADMIN_POPUP',
        'ADMIN_SHORTLINK' => 'ADMIN_SHORTLINK',
        'ADMIN_KCSTAT' => 'ADMIN_KCSTAT',
        'ADMIN_SONG_CHARGE_LOGS' => 'ADMIN_SONG_CHARGE_LOGS',
        'ADMIN_ALBUM_CHARGE_LOGS' => 'ADMIN_ALBUM_CHARGE_LOGS',
        'ADMIN_CUSTOMER_PACKAGES' => 'ADMIN_CUSTOMER_PACKAGES',
        'ADMIN_CUSTOMER_MOS' => 'ADMIN_CUSTOMER_MOS',
        'ADMIN_CUSTOMER_MTS' => 'ADMIN_CUSTOMER_MTS',
        'ADMIN_CUSTOMER_CHARGE_LOGS' => 'ADMIN_CUSTOMER_CHARGE_LOGS',
        'ADMIN_BLACK_LIST' => 'ADMIN_BLACK_LIST',
        'ADMIN_USER_BANNED' => 'ADMIN_USER_BANNED',
        'ADMIN_STATUS' => 'ADMIN_STATUS',
        'ADMIN_AVATAR' => 'ADMIN_AVATAR',
        'ADMIN_KEENG_UPLOAD' => 'ADMIN_KEENG_UPLOAD',
        'ADMIN_CPY_IMPORT' => 'ADMIN_CPY_IMPORT',
        'ADMIN_CPY_IMPORT_DETAIL' => 'ADMIN_CPY_IMPORT_DETAIL',
        'ADMIN_MAKE_SONG_DATA_IMPORT' => 'ADMIN_MAKE_SONG_DATA_IMPORT',
        'ADMIN_MAKE_SONG_DATA_IMPORT_DETAIL' => 'ADMIN_MAKE_SONG_DATA_IMPORT_DETAIL',
        'ADMIN_UPLOAD_SONG_MOCHA' => 'ADMIN_UPLOAD_SONG_MOCHA',
        'ADMIN_CHECK_LOG_SERVER' => 'ADMIN_CHECK_LOG_SERVER',
        'ADMIN_USER' => 'ADMIN_USER',
        'ADMIN_LOG' => 'ADMIN_LOG',
        'ADMIN_NOTIFY' => 'ADMIN_NOTIFY',
        'USER_BANNED_DELETE' => 'USER_BANNED_DELETE',
    ];
    const DASHBOARD = [
        ConstComm::PERMISSIONS['ADMIN_NOTIFY'],
    ];
    const CONTENT = [
        ConstComm::PERMISSIONS['ADMIN_SONG'], ConstComm::PERMISSIONS['CP_SONG'], ConstComm::PERMISSIONS['ADMIN_ALBUM'],
        ConstComm::PERMISSIONS['CP_ALBUM'], ConstComm::PERMISSIONS['ADMIN_VIDEO'], ConstComm::PERMISSIONS['CP_VIDEO'],
        ConstComm::PERMISSIONS['ADMIN_SINGER'], ConstComm::PERMISSIONS['ADMIN_AUTHOR'],
        ConstComm::PERMISSIONS['ADMIN_RINGBACKTONE'], ConstComm::PERMISSIONS['ADMIN_NEWS'],
        ConstComm::PERMISSIONS['CP_NEWS'],
    ];
    const MENU = [
        ConstComm::PERMISSIONS['ADMIN_RANK'], ConstComm::PERMISSIONS['ADMIN_FLASHHOT'],
        ConstComm::PERMISSIONS['ADMIN_TOPIC'], ConstComm::PERMISSIONS['ADMIN_CATEGORY'],
        ConstComm::PERMISSIONS['ADMIN_RANK_SONG'], ConstComm::PERMISSIONS['ADMIN_RANK_VIDEO'],
    ];
    const BUSINESS = [
        ConstComm::PERMISSIONS['ADMIN_KCSMS'],
        ConstComm::PERMISSIONS['ADMIN_INLINEBOX'], ConstComm::PERMISSIONS['ADMIN_BANNER'],
        ConstComm::PERMISSIONS['ADMIN_POPUP'], ConstComm::PERMISSIONS['ADMIN_SHORTLINK'],
    ];
    const REPORT = [
        ConstComm::PERMISSIONS['ADMIN_KCSTAT'], ConstComm::PERMISSIONS['ADMIN_SONG_CHARGE_LOGS'],
        ConstComm::PERMISSIONS['ADMIN_ALBUM_CHARGE_LOGS'],
    ];
    const CUSTOMER_CARE = [
        ConstComm::PERMISSIONS['ADMIN_CUSTOMER_PACKAGES'], ConstComm::PERMISSIONS['ADMIN_CUSTOMER_MOS'],
        ConstComm::PERMISSIONS['ADMIN_CUSTOMER_MTS'], ConstComm::PERMISSIONS['ADMIN_CUSTOMER_CHARGE_LOGS'],
        ConstComm::PERMISSIONS['ADMIN_BLACK_LIST'], ConstComm::PERMISSIONS['ADMIN_USER_BANNED'],
    ];
    const SOCIAL = [
        ConstComm::PERMISSIONS['ADMIN_STATUS'],
        ConstComm::PERMISSIONS['ADMIN_AVATAR'], ConstComm::PERMISSIONS['ADMIN_KEENG_UPLOAD'],
    ];
    const CPY = [
        ConstComm::PERMISSIONS['ADMIN_CPY_IMPORT'], ConstComm::PERMISSIONS['ADMIN_CPY_IMPORT_DETAIL'],
        ConstComm::PERMISSIONS['ADMIN_MAKE_SONG_DATA_IMPORT'],
        ConstComm::PERMISSIONS['ADMIN_MAKE_SONG_DATA_IMPORT_DETAIL'],
    ];
    const MOCHA = [
        ConstComm::PERMISSIONS['ADMIN_UPLOAD_SONG_MOCHA'],
    ];
    const DEV = [
        ConstComm::PERMISSIONS['ADMIN_CHECK_LOG_SERVER'],
    ];
    const TOOL = [

    ];
}
