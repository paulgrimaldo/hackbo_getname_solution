<?php

namespace App\Http\Controllers\Queries;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QueriesController extends Controller
{
    public function getGeneralBarChartData()
    {
        $partialResult = DB::table('users as u')
            ->join('processes as p', 'u.id', '=', 'p.employee_id')
            ->join('surveys as s', 'p.id', '=', 's.process_id')
            ->where('u.role', '=', "EMPLOYEE")
            ->select(DB::raw('u.id, AVG (s.attention_score) as score_avg, SUM(s.attention_score) as score_sum, COUNT(*)'))
            ->groupBy('u.id')
            //->avg('s.attention_score');
                ->get();
            QueriesController::roundCollection($partialResult);
            return response()->json(QueriesController::countPerAvg($partialResult));
        
    }

    private static function roundCollection($collection) {
        foreach ($collection as $item) {
            $item->score_avg = round($item->score_avg);
        }
    }

    private static function countPerAvg($collection) {
        $r = [
            0,0,0,0,0
        ];

        foreach ($collection as $item) {
            $r[$item->score_avg - 1] = $r[$item->score_avg - 1] + 1;
        }

        $result = [
            (object)array(1 => $r[0]),
            (object)[2 => $r[1]],
            (object)[3 => $r[2]],
            (object)[4 => $r[3]],
            (object)[5 => $r[4]]
        ];

        return $result;
    }

    public function getReportOfProcesses($employee_id) {
        $partialResult = DB::table('users as u')
            ->join('processes as p', 'u.id', '=', 'p.employee_id')
            ->join('surveys as s', 'p.id', '=', 's.process_id')
            ->where('u.role', '=', "EMPLOYEE")
            ->where('u.id', '=', $employee_id)
            ->select('s.attention_score', 's.timestamp')
            //->avg('s.attention_score');
            ->get();
        return response()->json(QueriesController::normalizeReportOfProcesses($partialResult));
    }

    public static function normalizeReportOfProcesses($collection) {
        $result = [];

        foreach ($collection as $item) {
            $arrayItem = [
                $item->timestamp,
                $item->attention_score
            ];
            array_push($result, $arrayItem);
        }

        return $result;
    }
    
}

?>