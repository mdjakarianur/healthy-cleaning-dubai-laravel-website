<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface FaqInterface extends BaseInterface{
    public function status($id);

    public function GetService($id);
}
