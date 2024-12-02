<?php
function flash($name, $msg='', $class='alert alert-success', ) {
    if(!empty($msg) && !empty($name)) {
        $_SESSION[$name] = [
            'class' => $class,
           'msg' => $msg,
        ];
    } elseif(!empty($name)&& isset($_SESSION[$name])) {
        echo '<div class="'.$_SESSION[$name]['class'].'">'.$_SESSION[$name]['msg'].'</div>';
        unset($_SESSION[$name]);
    }
}