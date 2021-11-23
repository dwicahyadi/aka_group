@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center  mb-30">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                    <h2 class="mr-40">Service Kendaraan</h2>
                    <a href="{{ route('tax.create') }}" class="main-btn primary-btn btn-hover btn-sm">
                        <i class="lni lni-plus mr-5"></i> Input Pajak Baru</a>
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
                            <th>Tanggal</th>
                            <th>Biaya</th>
                            <th>Jadwal Pajak Berikutnya</th>
                            <th>Catatan</th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @foreach($taxes as $tax)
                            <tr>
                                <td>
                                    <a href="{{ route('vehicle.show', $tax->vehicle) }}">{{ $tax->vehicle->code }} <i class="lni lni-share"></i></a>
                                </td>
                                <td>{{ $tax->date }}</td>
                                <td>{{ number_format($tax->cost) }}</td>
                                <td>{{ $tax->next_tax_date }}</td>
                                <td>{{ $tax->note }}</td>
                            </tr>
                        @endforeach
                        <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{ $taxes->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
