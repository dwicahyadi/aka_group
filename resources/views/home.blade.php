@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Dashboard') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="row">
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon purple">
                    <i class="lni lni-car"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Kendaraan</h6>
                    <h3 class="text-bold mb-10">{{ \App\Models\Vehicle::count() }}</h3>
                </div>
            </div>
            <!-- End Icon Cart -->
        </div>
        <!-- End Col -->
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon success">
                    <i class="lni lni-users"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Pengemudi</h6>
                    <h3 class="text-bold mb-10">{{ \App\Models\Driver::count() }}</h3>
                </div>
            </div>
            <!-- End Icon Cart -->
        </div>
        <!-- End Col -->
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon primary">
                    <i class="lni lni-credit-cards"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Petugas Pajak</h6>
                    <h3 class="text-bold mb-10">{{ \App\Models\TaxOfficer::count() }}</h3>
                </div>
            </div>
            <!-- End Icon Cart -->
        </div>
        <!-- End Col -->

    </div>
    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <div class="">
                    <h6><i class="lni lni-cogs mr-10 text-primary"></i> Jadwal Service</h6>
                    <p  class="mb-25">Menampilkan jadwal servis 7 hari mendatang</p>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($upcoming_services as $service)
                        @php($vehicle = $service->vehicle)
                        <li class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center">
                                <div class="mr-20">
                                    <img src="{{ \Storage::url($vehicle->image) }}" alt="{{ $vehicle->code }}" style="width: 128px">
                                </div>
                                <div class="flex-fill">
                                    {{ $vehicle->code }}
                                    <h6>{{ $vehicle->brand }} {{ $vehicle->model }}</h6>
                                    <p>{{ $vehicle->license_number }}</p>
                                </div>
                                <div>
                                    {{ $service->next_service_date }}
                                </div>
                                <div>
                                    <a class="btn  ml-20" href="{{ route('service.create',['code'=>$vehicle->code]) }}" title="Input Servis"><i class="lni lni-share"></i></a>
                                    <a class="btn  ml-20" href="{{ route('reminder.service',$service) }}" target="_blank" title="Kirim Remindaer"><i class="lni lni-whatsapp"></i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <div class="">
                    <h6><i class="lni lni-certificate mr-10 text-primary"></i> Jadwal Pembayaran Pajak</h6>
                    <p  class="mb-25">Menampilkan jadwal pajak 7 hari mendatang</p>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($upcoming_taxes as $tax)
                        @php($vehicle = $tax->vehicle)
                        <li class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center">
                                <div class="mr-20">
                                    <img src="{{ \Storage::url($vehicle->image) }}" alt="{{ $vehicle->code }}" style="width: 128px">
                                </div>
                                <div class="flex-fill">
                                    {{ $vehicle->code }}
                                    <h6>{{ $vehicle->brand }} {{ $vehicle->model }}</h6>
                                    <p>{{ $vehicle->license_number }}</p>
                                </div>
                                <div>
                                    {{ $tax->next_tax_date }}
                                </div>
                                <div>
                                    <a class="btn  ml-20" href="{{ route('tax.create',['code'=>$vehicle->code]) }}" title="Input Servis"><i class="lni lni-share"></i></a>
                                    <a class="btn  ml-20" href="{{ route('reminder.tax',$tax) }}" target="_blank" title="Kirim Reminder"><i class="lni lni-whatsapp"></i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
