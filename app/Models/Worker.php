<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = ['name', 'phone', 'employment_date'];

    public function phoneNumber()
    {
        return substr($this->phone, 0, 1) . '-'
            . substr($this->phone, 1, 3) . '-'
            . substr($this->phone, 4, 3) . '-'
            . substr($this->phone, 7, 4);
    }

    public static function getLabelsForGraph()
    {
        $labels = '';
        $workers = self::all();

        if (empty($workers)) {
            return $labels;
        }

        $labelsArr = [];
        foreach ($workers as $worker) {
            $year = substr($worker->employment_date, 0, 4);
            if (!in_array($year, $labelsArr)) {
                $labelsArr[] = $year;
            }
        }
        sort($labelsArr);
        $labels = implode(',', $labelsArr);

        return $labels;
    }

    public static function getValuesForGraph()
    {
        $values = '';
        $workers = self::all();

        if (empty($workers)) {
            return $values;
        }

        $valuesArr = [];
        foreach ($workers as $worker) {
            $valuesArr[] = substr($worker->employment_date, 0, 4);
        }
        $dataArr = array_count_values($valuesArr);
        ksort($dataArr);
        $values = array_values($dataArr);

        return implode(',', $values);
    }
}
