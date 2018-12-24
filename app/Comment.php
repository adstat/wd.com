<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    public $timestamps = false;
    protected $table = 'comment';
    protected static function getData(&$data)
    {
        switch ($data){
            case $data['cat_id']==1:
                self::one();
            case $data['cat_id']==2:
                self::two();
        }
    }

    private static function one()
    {

    }

    private static function two()
    {

    }
}
