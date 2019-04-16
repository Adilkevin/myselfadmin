<?php
/**
 * User: ll
 * Date: 2018/7/3
 * Time: 12:01
 */

function pr($var) {
    $template = PHP_SAPI !== 'cli' ? '<pre>%s</pre>' : "\n%s\n";
    printf($template, print_r($var, true));
}

function respond($status, $message, $data = null)
{
    if($data == null) $data = new \PHPUnit\Util\Json();
    return response()->json(['status' => $status, 'message' => $message, 'data' => $data]);
}

function succeed($message, $data = null)
{
    return respond(1, $message, $data);
}

function failed($message, $data = null, $status = 0)
{
    return respond($status, $message, $data);
}

function return404()
{
    return 111;
}

/**
 * 获取当前控制器与方法
 *
 * @return array
 */
function getCurrentAction()
{
    $action = \Route::current()->getActionName();
    list($class, $method) = explode('@', $action);

    return ['controller' => $class, 'method' => $method];
}