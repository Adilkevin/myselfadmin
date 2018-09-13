<?php
/**
 * Created by PhpStorm.
 * User: Peng Xiang
 * Date: 2018/7/4
 * Time: 16:01
 */
namespace App\Http;

interface IEnum {
    const FIRST_LEVEL_NAV = 0;   //一级导航
    const SECOND_LEVEL_NAV = 1;  //多级导航

    const ACTIVE_STATUS = 0;  //激活状态
    const DELETE_STATUS = 1;  //删除状态

}