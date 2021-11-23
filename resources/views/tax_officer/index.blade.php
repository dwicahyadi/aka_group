@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center  mb-30">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                    <h2 class="mr-40">Petugas Pajak</h2>
                    <a href="{{ route('tax_officer.create') }}" class="main-btn primary-btn btn-hover btn-sm">
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
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @foreach($tax_officers as $tax_officer)
                            <tr>
                                <td>
                                    {{ $tax_officer->name }}
                                </td>
                                <td>
                                    {{ $tax_officer->phone }}
                                </td>
                                <td>
                                    <a class="btn btn-hover" href="{{ route('tax_officer.edit',$tax_officer) }}"><i class="text-info lni lni-pencil "></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('tax_officer.destroy', $tax_officer) }}" method="post"  onsubmit="return confirm('Yakin hapus Pengemudi?');">
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

                    {{ $tax_officers->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
