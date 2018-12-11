<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TestDrive
 *
 * @package App
 * @property string $nama
 * @property string $email
 * @property string $ktp
 * @property string $alamat
 * @property string $tanggal_test_drive
 * @property string $jenis_sim
 * @property string $merk
*/
class TestDrive extends Model
{
    use SoftDeletes;

    protected $fillable = ['nama', 'email', 'ktp', 'alamat', 'tanggal_test_drive', 'jenis_sim', 'merk_id'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setTanggalTestDriveAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['tanggal_test_drive'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['tanggal_test_drive'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getTanggalTestDriveAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setMerkIdAttribute($input)
    {
        $this->attributes['merk_id'] = $input ? $input : null;
    }
    
    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk_id')->withTrashed();
    }
    
}
