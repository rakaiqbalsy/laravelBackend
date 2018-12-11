<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Beritum
 *
 * @package App
 * @property string $judul
 * @property text $kontent
 * @property string $picture
*/
class Beritum extends Model
{
    use SoftDeletes;

    protected $fillable = ['judul', 'kontent', 'picture'];
    protected $hidden = [];
    
    
    
}
