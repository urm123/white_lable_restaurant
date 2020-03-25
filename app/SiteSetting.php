<?php
namespace App;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * Add a settings value
     *
     * @param $key
     * @param $val
     * @param string $type
     * @return bool
     */
    public static function add($key, $val, $type = 'string')
    {
        if ( self::has($key) ) {
            return self::set($key, $val, $type);
        }
        return self::create(['name' => $key, 'val' => $val, 'type' => $type]) ? $val : false;
    }
    /**
     * Get a settings value
     *
     * @param $key
     * @param null $default
     * @return bool|int|mixed
     */
    public static function get($key, $section = null, $default = null)
    {
        if ( self::has($key) ) {
            $setting = self::getAllSettings()->where('name', $key)->first();
            return self::castValue($setting->val, $setting->type);
        }
        return self::getDefaultValue($key, $section, $default);
    }
    /**
     * Set a value for setting
     *
     * @param $key
     * @param $val
     * @param string $type
     * @return bool
     */
    public static function set($key, $val, $type = 'string')
    {
        if ( $setting = self::getAllSettings()->where('name', $key)->first() ) {
            return $setting->update([
                'name' => $key,
                'val' => $val,
                'type' => $type]) ? $val : false;
        }
        return self::add($key, $val, $type);
    }
    /**
     * Remove a setting
     *
     * @param $key
     * @return bool
     */
    public static function remove($key)
    {
        if( self::has($key) ) {
            return self::whereName($key)->delete();
        }
        return false;
    }
    /**
     * Check if setting exists
     *
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return (boolean) self::getAllSettings()->whereStrict('name', $key)->count();
    }
    /**
     * Get the validation rules for setting fields
     *
     * @return array
     */
    public static function getValidationRules($section)
    {
        return self::getDefinedSettingFields($section)->pluck('rules', 'name')
            ->reject(function ($val) {
                return is_null($val);
            })->toArray();
    }
    /**
     * Get the data type of a setting
     *
     * @param $field
     * @return mixed
     */
    public static function getDataType($field, $section)
    {
        $type  = self::getDefinedSettingFields($section)
            ->pluck('data', 'name')
            ->get($field);
        return is_null($type) ? 'string' : $type;
    }
    /**
     * Get the type of a input
     *
     * @param $field
     * @return mixed
     */
    public static function getInputType($field, $section)
    {
        $type  = self::getDefinedSettingFields($section)
            ->pluck('type', 'name')
            ->get($field);
        return is_null($type) ? 'text' : $type;
    }

    /**
     * Get the path of file upload
     *
     * @param $field
     * @return mixed
     */
    public static function getFilePath($field, $section)
    {
        $type  = self::getDefinedSettingFields($section)
            ->pluck('path', 'name')
            ->get($field);
        return is_null($type) ? 'storage' : $type;
    }
    /**
     * Get default value for a setting
     *
     * @param $field
     * @return mixed
     */
    public static function getDefaultValueForField($field, $section)
    {
        return self::getDefinedSettingFields($section)
            ->pluck('value', 'name')
            ->get($field);
    }
    /**
     * Get default value from config if no value passed
     *
     * @param $key
     * @param $default
     * @return mixed
     */
    private static function getDefaultValue($key, $section, $default)
    {
        return is_null($default) ? self::getDefaultValueForField($key, $section) : $default;
    }

    /**
     * Get all the settings fields from config
     *
     * @return Collection
     */

    private static function getDefinedSettingFields($section)
    {
        return collect(config('setting_fields.'.$section, []))->pluck('elements')->flatten(1);
    }
    /**
     * caste value into respective type
     *
     * @param $val
     * @param $castTo
     * @return bool|int
     */
    private static function castValue($val, $castTo)
    {
        switch ($castTo) {
            case 'int':
            case 'integer':
                return intval($val);
                break;
            case 'bool':
            case 'boolean':
                return boolval($val);
                break;
            default:
                return $val;
        }
    }
    /**
     * Get all the settings
     *
     * @return mixed
     */
    public static function getAllSettings()
    {
        return Cache::rememberForever('settings.all', function() {
            return self::all();
        });
    }
    /**
     * Flush the cache
     */
    public static function flushCache()
    {
        Cache::forget('settings.all');
    }
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::updated(function () {
            self::flushCache();
        });
        static::created(function() {
            self::flushCache();
        });
        static::deleted(function () {
            self::flushCache();
        });
    }

}
