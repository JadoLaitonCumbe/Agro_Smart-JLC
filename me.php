<?php require '../../../config/bootstrap.php';$u=require_auth();json_response(['user'=>$u,'csrf'=>csrf_token()]);
