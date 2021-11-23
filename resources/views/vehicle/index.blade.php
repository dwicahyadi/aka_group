@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center  mb-30">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                    <h2 class="mr-40">Kendaraan</h2>
                    <a href="{{ route('vehicle.create') }}" class="main-btn primary-btn btn-hover btn-sm">
                        <i class="lni lni-plus mr-5"></i> Tambah</a>
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
                            <th>Kendaraan</th>
                            <th>Pengemudi</th>
                            <th>Petugas Pajak</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @foreach($vehicles as $vehicle)
                            <tr>
                                <td class="d-flex">
                                    <div class="mr-2"><img src="{{ Storage::url($vehicle->image) }}" alt="{{ $vehicle->image }}" class="img-fluid" style="width: 64px"></div>
                                    <div class="ml-20">
                                        <h6>{{ $vehicle->license_number }}</h6>
                                        {{ $vehicle->brand }} {{ $vehicle->model }} {{ $vehicle->year }}
                                        <p class="clearfix">{{ $vehicle->code }}</p>

                                    </div>
                                </td>
                                <td>
                                    @isset($vehicle->driver)
                                        {{ $vehicle->driver->name }}
                                        <p><a href="#">{{ $vehicle->driver->phone }}</a></p>
                                    @endisset
                                </td>

                                <td>
                                    @isset($vehicle->taxOfficer)
                                        {{ $vehicle->taxOfficer->name }}
                                        <p><a href="#">{{ $vehicle->taxOfficer->phone }}</a></p>
                                    @endisset
                                </td>

                                <td>
                                    <a class="btn btn-hover" href="{{ route('vehicle.show',$vehicle) }}"><i class="text-primary lni lni-book "></i></a>
                                </td>
                                <td>
                                    <a class="btn btn-hover" href="{{ route('vehicle.edit',$vehicle) }}"><i class="text-info lni lni-pencil "></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('vehicle.destroy', $vehicle) }}" method="post"  onsubmit="return confirm('Yakin hapus Kendaraan?');">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-hover" ><i class="text-danger lni lni-trash-can "></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{ $vehicles->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
