<?php

namespace SaltEmployeeTimeoff\Observers;

use SaltEmployeeTimeoff\Models\TimeoffEmployees;

trait RequestApproved
{

    public static function bootRequestApproved()
    {
        static::updated(function ($model) {
            // FIXME: this line of code below should be executed through event
            if(!$model->status != 'approved') return;

            $timeoff = new TimeoffEmployees;
            $timeoff->organization_id = $request->organization_id;
            $timeoff->timeoff_id = $request->timeoff_id;
            $timeoff->employee_id = $request->employee_id;
            $timeoff->date_start = $request->date_start;
            $timeoff->date_end = $request->date_end;
            $timeoff->note = $request->note;
            $timeoff->save();

        });
    }
}