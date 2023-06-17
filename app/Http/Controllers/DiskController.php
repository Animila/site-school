<?php

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
use \Leonied7\Yandex\Disk;
class DiskController extends Controller
{
    public function getDisk() {
        $oauth_token = SocialAccount::first()->token;
        $yandexDisk = new Disk($oauth_token);
        $root = $yandexDisk->directory('/');

        dd($root->getChildren());
    }
}
