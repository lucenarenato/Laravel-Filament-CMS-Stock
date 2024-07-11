<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;

class Organization extends Model
{
    protected $fillable = [
        'id', 'name', 'avatar_url', 'company_size', 'website', 'zip_code', 'street_adress', 'country', 'city', 'state', 'email1', 'email2',
        'temporary_email', 'fax', 'fone1', 'fone2', 'other', 'storage_limit', 'status_active'
    ];

    public function getTemporaryUrlAvatar(Organization $organization)
    {
        if (config('app.env') == 'local') {

            return $organization->avatar_url;
        } else {
            if ($organization->avatar_url != null && $organization->avatar_url != "") {
                \Log::info('getTemporaryUrlAvatar organization.php model function cache');
                return Cache::remember('s3tempurlv4_' . $organization->avatar_url, 345600, function () use ($organization) {
                    return Storage::disk('s3')->temporaryUrl(
                        $organization->avatar_url,
                        now()->addDays(6)
                    );
                });
            } else {
                return $organization->avatar_url;
            }
        }
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function getSizeStorage()
    {
        //\Log::info('getNumberAssets organization modelfunction cache');
        //\Log::info(Auth::user()->organization_id_logged);
        return 0;
        return Cache::rememberForever('cachev3_organization_storagesize_' . Auth::user()->organization_id_logged, function () {
            $disk = Storage::disk('s3');
            $size = array_sum(array_map(function ($file) {
                return (int) $file['size'];
            }, array_filter($disk->listContents(sha1(Auth::user()->organization_id_logged), true), function ($file) {
                return $file['type'] == 'file';
            })));

            $suffixes = array('bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
            $power = $size > 0 ? floor(log($size, 1024)) : 0;
            $sizes = number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $suffixes[$power];
            return $sizes;
        });
    }

    function byteconvert($bytes, $precision = 2)
    {
        $base = log($bytes, 1024);
        $suffixes = array('MB', 'GB', 'TB');

        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }

}
