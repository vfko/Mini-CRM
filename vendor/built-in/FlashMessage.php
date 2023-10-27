<?php

class FlashMessage {

    public function __construct() {

    }

    static function getFlashMessage() {

        if (isset($_SESSION[SESSION_SUCCESS])) {
            $message = SELF::sessionSuccess();
            SELF::unsetSession(SESSION_SUCCESS);
            return $message;
        } elseif (isset($_SESSION[SESSION_FAILURE])) {
            $message = SELF::sessionFailure();
            SELF::unsetSession(SESSION_FAILURE);
            return $message;
        } elseif (isset($_SESSION[SESSION_INFO])) {
            $message = SELF::sessionInfo();
            SELF::unsetSession(SESSION_INFO);
            return $message;
        }

        return false;
    }

    static function setSession(string $session_name, string $session_value) {
        $_SESSION[$session_name] = $session_value;
    }

    static function sessionSuccess(): string {
        return '<div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Úspěch! </strong>'. $_SESSION[SESSION_SUCCESS].'
                </div>';
    }

    static function sessionFailure(): string {
        return '<div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Oops! </strong>'. $_SESSION[SESSION_FAILURE].'
                </div>';
    }

    static function sessionInfo(): string {
        return '<div class="alert alert-info alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        '. $_SESSION[SESSION_INFO].'
                </div>';
    }

    static function unsetSession(string $session): void {
        unset($_SESSION[$session]);
    }


}