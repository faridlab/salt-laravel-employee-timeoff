<?php

namespace SaltEmployeeTimeoff\Observers;

trait RequestRejected
{
    public static function bootRequestRejected()
    {
        static::updated(function ($model) {
            // FIXME: this line of code below should be executed through event
            // Notify user if their request get rejected by their approver
        });
    }
}