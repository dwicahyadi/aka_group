@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center  mb-30">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                    <h2 class="mr-40">Service Kendaraan</h2>
                    <a href="{{ route('service.create') }}" class="main-btn primary-btn btn-hover btn-sm">
                        <i class="lni lni-plus mr-5"></i> Input Serive Baru</a>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <div class="table-wrapper table-responsive">
                    <table class="table striped-table">
                        <thead>
                        <tr>
                            <th>Kode Kendaraan</th>
                            <th>Tanggal Service</th>
                            <th>Detail Service</th>
                            <th>Biaya</th>
                            <th>Jadwal Service Berikutnya</th>
                            <th>Catatan</th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>
                                    <a href="{{ route('vehicle.show', $service->vehicle) }}">{{ $service->vehicle->code }} <i class="lni lni-share"></i></a>
                                </td>
                                <td>{{ $service->date }}</td>
                                <td>{{ $service->detail }}</td>
                                <td>{{ number_format($service->cost) }}</td>
                                <td>{{ $service->next_service_date }}</td>
                                <td>{{ $service->note }}</td>
                            </tr>
                        @endforeach
                        <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{ $services->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
