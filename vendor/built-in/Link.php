<?php


abstract class Link {

    static function redirect(string $app, array $controller_parameter=array(), array $url_variables=array()) {
        $link = '/'.$app;
        if ($controller_parameter) {
            foreach ($controller_parameter as $param) {
                $link .= '/'.$param;
            }
        }
        if ($url_variables) {
            $link .= '?';
            foreach ($url_variables as $var => $val) {
                $link .= $var.'='.$val.'&';
            }
        }
        header('Location: '.$link);
        exit();
    }
}