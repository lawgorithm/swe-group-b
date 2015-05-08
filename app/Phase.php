<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Phase extends Model
{

    // assign table to model
    protected $table = 'phase';

    // attributes to edit
    protected $fillable = [
        'sso',
        'author',
        'open',
        'transition',
        'close'
    ];

    public static $phaseDefinition = ['Awaiting Configuration', 'Awaiting Opening', 'Collecting Applications', 'Collecting Feedback', 'Awaiting Ranking'];
    const phaseFormat = 'l, F jS';

    public static function getPhaseData()
    {
        return Phase::all()->last();
    }

    public static function getPhaseCode()
    {
        $hold = Phase::getPhaseData();

        if ($hold === null) {
            return 0;
        }

        $now = Carbon::now('America/Chicago');

        if ($now < $hold['open']) {
            return 1;
        } else if ($now >= $hold['open'] && $now < $hold['transition']) {
            return 2;
        } else if ($now >= $hold['transition'] && $now < $hold['close']) {
            return 3;
        } else if ($now >= $hold['close']) {
            return 4;
        }

        return -1;
    }

    public static function getPhaseText()
    {
        $data = [];
        $data['phaseCode'] = Phase::getPhaseCode();
        $data['phaseDefinition'] = (Phase::getPhaseDefinition()[$data['phaseCode']]);

        if ($data['phaseCode'] !== 0) {

            $hold = Phase::all()->last()->toArray();

            $fs = Phase::phaseFormat;

            $data['open'] = Carbon::parse($hold['open'])->format($fs);
            $data['transition'] = Carbon::parse($hold['transition'])->format($fs);
            $data['close'] = Carbon::parse($hold['close'])->format($fs);
            $data['author'] = $hold['author'];

        }
        return $data;

    }

    /**
     * @return array
     */
    public static function getPhaseDefinition()
    {
        return self::$phaseDefinition;
    }

}