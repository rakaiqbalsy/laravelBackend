<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Merk
 *
 * @package App
 * @property string $merk
 * @property string $carname
*/
class Merk extends Model
{
    use SoftDeletes;

    protected $fillable = ['merk', 'carname'];
    protected $hidden = [];
    
    
    
}
