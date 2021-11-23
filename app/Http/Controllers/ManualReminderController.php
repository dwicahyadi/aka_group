<?php

namespace App\Http\Controllers;

use App\Helpers\MessageBuilderHelper;
use App\Jobs\SendWA;
use App\Models\Service;
use App\Models\Tax;
use Illuminate\Http\Request;

class ManualReminderController extends Controller
{
    public function service(Service $service)
    {
        $reminderMsg = MessageBuilderHelper::nextServiceReminderMsg($service);
        dispatch(new SendWA($reminderMsg->to,$reminderMsg->message. ' send by '.auth()->user()->name.' at '.date('H:i:s')));

        return view('wa-sent', compact('reminderMsg'));
    }

    public function tax(Tax $tax)
    {
        $reminderMsg = MessageBuilderHelper::nextTaxReminderMsg($tax);
        dispatch(new SendWA($reminderMsg->to,$reminderMsg->message. ' send by '.auth()->user()->name.' at '.date('H:i:s')));

        return view('wa-sent', compact('reminderMsg'));
    }
}
