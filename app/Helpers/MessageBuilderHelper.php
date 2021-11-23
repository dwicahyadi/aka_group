<?php

namespace App\Helpers;

use App\Models\Service;
use App\Models\Tax;

class MessageBuilderHelper
{
    public static function nextServiceReminderMsg(Service $service)
    {
        $vehicle = $service->vehicle;
        $driver = $service->vehicle->driver;
        $next_date = date('d M Y', strtotime($service->next_service_date));

        $msg = "Pengemudi {$driver->name} terhormat,";
        $msg .= "\n\nKami ingatkan untuk melakukan service rutin kendaraan ";
        $msg .= "\n*{$vehicle->code}* - {$vehicle->brand} {$vehicle->model} \ndengan nopol {$vehicle->license_number} \ntanggal {$next_date}.";
        if ($service->note)
            $msg .= "\n\nCatatan Tambahan:\n{$service->note}";
        $msg .= "\n\n\n *AKA GROUP REMINDER SISTEM*";

        $output = new \stdClass();
        $output->to = $driver->phone;
        $output->message = $msg;

        return $output;

    }


    public static function nextTaxReminderMsg(Tax $tax)
    {
        $vehicle = $tax->vehicle;
        $tax_officer = $tax->vehicle->taxOfficer;
        $next_date = date('d M Y', strtotime($tax->next_service_date));

        $msg = "Petugas {$tax_officer->name} terhormat,";
        $msg .= "\n\nKami ingatkan mebayar pajak kendaraan ";
        $msg .= "\n*{$vehicle->code}* - {$vehicle->brand} {$vehicle->model} \ndengan nopol {$vehicle->license_number} \ndengan no rangka {$vehicle->vin} \ntanggal {$next_date}.";
        if ($tax->note)
            $msg .= "\n\nCatatan Tambahan:\n{$tax->note}";
        $msg .= "\n\n\n *AKA GROUP REMINDER SISTEM*";

        $output = new \stdClass();
        $output->to = $tax_officer->phone;
        $output->message = $msg;

        return $output;

    }
}
