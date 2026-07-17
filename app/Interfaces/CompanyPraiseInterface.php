<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface CompanyPraiseInterface extends BaseInterface{
    public function status($id);
}
