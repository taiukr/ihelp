<?php

function __autoload($class ){
    require_once(LIB.'/'.$class.'.php' );
}
