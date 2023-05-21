<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use DateTimeImmutable;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model {
    protected $table = "currencies";
    protected $fillable = ['code', 'amount'];

    // @todo test 
    public static function insertExchangeRate(string $code, string $amount) {

        $dateWithName = self::checkIfTodayExchangeRateWasAdded($code);
        
        if ($dateWithName['date'] == null) {
            self::create([
                'code' => $code,
                'amount' => $amount
            ]); 
        }
        else {
            self::updateWhenTodayDateCreateOther($dateWithName['date'], $code, $amount);
        }
    }

    // @todo refactor omit repeating create statement in code.
    // @todo refactor omit if possible where in $today and in update statement.
    private static function updateWhenTodayDateCreateOther(Carbon $datetime, string $code, string $amount) {

        $today = self::where('code', $code)->whereDate('updated_at', $datetime->toDateString())->first('updated_at');

        if ($today !== null) {
            $updatedAt = $today->updated_at;

            self::where('code', $code)->where('updated_at', $updatedAt)->update(['amount' => $amount]);
        } else { 
            self::create(['code' => $code, 'amount' => $amount]);
        }
    } 

    /**
     * Take more current date. Created at is always before updated at so there are null checks.
     */
    private static function checkIfTodayExchangeRateWasAdded(string $code) : array {
        $dates = self::where('code', $code)->whereDate('updated_at', date_format(date_create(), 'Y-m-d'))->orderByDesc('updated_at')->first();
        
        $date = null;
        $dateName = null;

        // @todo created_at can be ommited. updated_at is set on create of record.
        if ($dates != null) {
            if ($dates->updated_at != null) {
                $date = $dates['updated_at'];
                $dateName = 'updated_at';
            } else if ($dates['created_at'] != null) {
                $date = $dates['created_at'];
                $dateName = 'created_at';
            }
        }

        return ['date' => $date, 'dateName' => $dateName];
    }

    public function getByCode(string $code, DateTimeImmutable $date) : array {


        return self::where('code', $code)->whereDate('')->first()->get('code', 'amount','created_at', 'updated_at');
    }

    public function getInDay(DateTimeImmutable $date) : array {
        //@todo
    }

}