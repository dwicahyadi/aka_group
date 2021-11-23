@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center  mb-30">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                    <h2 class="mr-40">Jadwal Service</h2>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    @include('report._form-filter')

    <div class="card-styles" >
        <div class="card-style-3 mb-30">
            <div class="card-content" id="section-to-print" style="width: 100%">
                <h6 class="mb-25">Jadwal Servis tanggal {{ request('start_date') ?? date('d M Y') }} s.d {{ request('end_date') ?? date('d M Y') }}                </h6>
                <div class="table-wrapper table-responsive">
                    <table class="table striped-table" style="width: 100%">
                        <thead>
                        <tr >
                            <th><h6>Jadwal Servis</h6></th>
                            <th><h6>Kode Kendaraan</h6></th>
                            <th><h6>Merk/Model/Tahun</h6></th>
                            <th><h6>No. Polisi</h6></th>
                            <th><h6>Catatan</h6></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody class="text-sm">
                        @foreach($services as $service)
                            <tr>
                                <td>
                                    {{ $service->next_service_date }}
                                </td>
                                <td>
                                    {{ $service->vehicle->code }}
                                </td>
                                <td>
                                    {{ $service->vehicle->brand }} {{ $service->vehicle->model }} {{ $service->vehicle->year }}
                                </td>
                                <td>
                                    {{ $service->vehicle->license_number }}
                                </td>
                                <td>
                                    {{ $service->note }}
                                </td>
                            </tr>
                        @endforeach
                        <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                </div>

            </div>
        </div>

        <div class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          ">
            <button class="main-btn secondary-btn btn-hover m-2" type="button" onclick="window.print()">
                <i class="icon lni lni-printer"></i> Cetak
            </button>

        </div>
    </div>
@endsection
