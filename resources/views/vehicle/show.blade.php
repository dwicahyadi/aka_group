@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center  mb-30">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                    <h2 class="mr-40">Informasi Kendaraan</h2>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-style mb-30 d-flex">
        <div class="mr-2"><img src="{{ Storage::url($vehicle->image) }}" alt="{{ $vehicle->image }}" class="img-fluid" style="width: 256px"></div>
        <div class="ml-20 flex-fill">
            <p class="clearfix"><small>Kode</small><br><strong>{{ $vehicle->code }}</strong></p>
            <p class="clearfix"><small>Merk/Model/Type</small><br><strong>{{ $vehicle->brand }} {{ $vehicle->model }} {{ $vehicle->year }}</strong></p>
            <p class="clearfix"><small>Nomor Polisi</small><br><strong>{{ $vehicle->license_number }}</strong></p>
            <p class="clearfix"><small>Nomor Rangka</small><br><strong>{{ $vehicle->vin }}</strong></p>
        </div>

        <div class="ml-20 flex-fill">
            <p class="clearfix"><small>Pengemudi</small><br><strong>{{ $vehicle->driver->name ?? '-' }}</strong></p>
            <p class="clearfix"><small>Petugas Pajak</small><br><strong>{{ $vehicle->tax_officer->name ?? '-' }}</strong></p>
        </div>
        <div>
            <a class="link-secondary" href="{{ route('vehicle.index') }}"><i class="lni lni-car"></i> Semua Kendaraan</a>
        </div>
    </div>
    <div class="card-style mb-30">
        <h6 class="mb-25">Riwayat Servis</h6>
        <table class="table">
            <tr>
                <th>Tanggal Service</th>
                <th>Detail Service</th>
                <th>Jadwal Service Berikutnya</th>
                <th>Catatan</th>
            </tr>
            @foreach($vehicle->services as $service)
                <tr>
                    <td>{{ $service->date }}</td>
                    <td>{{ $service->detail }}</td>
                    <td>{{ $service->next_service_date }}</td>
                    <td>{{ $service->note }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="card-style mb-30">
        <h6 class="mb-25">Riwayat Pajak</h6>
    </div>

@endsection
