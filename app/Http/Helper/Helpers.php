<?php
function currentUser(){
    return request()->session()->get('roleIdentity');
}
?>