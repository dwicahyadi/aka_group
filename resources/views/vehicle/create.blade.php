@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center  mb-30">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                    <h2 class="mr-40">Tambah Kendaraan</h2>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-style mb-30">
        <h6 class="mb-25">Form</h6>
        <form action="{{ route('vehicle.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-style-1">
                    <label for="name">Kode</label>
                    <div class="row">
                        <div class="col-3">
                            <input type="text" @error('code') class="form-control is-invalid" @enderror name="code"
                                   id="code" value="{{ old('code') }}" placeholder="Kode unik kendaraan" required>
                            @error('code')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="input-style-1">
                    <label for="brand">Kendaraan</label>
                    <div class="row">
                        <div class="col-3">
                            <input type="text" @error('brand') class="form-control is-invalid" @enderror name="brand"
                                   id="brand" value="{{ old('brand') }}" placeholder="Merk" required>
                            @error('brand')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <input type="text" @error('model') class="form-control is-invalid" @enderror name="model"
                                   id="model" value="{{ old('model') }}" placeholder="Model/Type" required>
                            @error('model')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <input type="number" @error('year') class="form-control is-invalid" @enderror name="year"
                                   id="year" value="{{ old('year') }}" placeholder="Tahun Kendaraan" required>
                            @error('year')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="input-style-1">
                    <label for="license_number">Nomor Polisi</label>
                    <div class="row">
                        <div class="col-3">
                            <input type="text" @error('license_number') class="form-control is-invalid" @enderror name="license_number"
                                   id="license_number" value="{{ old('license_number') }}" required>
                            @error('license_number')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="input-style-1">
                    <label for="vin">Nomor Rangka</label>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" @error('vin') class="form-control is-invalid" @enderror name="vin"
                                   id="vin" value="{{ old('vin') }}" required>
                            @error('license_number')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-30">
                    <label for="image" class="text-medium text-black mb-10">Foto</label><br>
                    <input type="file" @error('image') class="form-control is-invalid" @enderror name="image"
                           id="image" value="{{ old('image') }}" required accept="image/*" onchange="loadFile(event)">
                    @error('image')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <br>
                    <img id="output">
                </div>

                <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="select-style-1">
                            <label for="license_number">Pengemudi</label>
                            <div class="select-position">
                                <select @error('driver_id') class="form-control is-invalid" @enderror name="driver_id"
                                        id="driver_id" value="{{ old('driver_id') }}">
                                    <option value="">Pilih pengemudi</option>
                                    @foreach($drivers as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('driver_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="select-style-1">
                            <label for="license_number">Petugas Pajak</label>
                            <div class="select-position">
                                <select @error('tax_officer_id') class="form-control is-invalid" @enderror name="tax_officer_id"
                                        id="tax_officer_id" value="{{ old('tax_officer_id') }}">
                                    <option value="">Pilih pengemudi</option>
                                    @foreach($tax_officers as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('tax_officer_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          ">
                        <button class="main-btn primary-btn btn-hover m-2">
                            Save
                        </button>
                        <a href="{{ route('driver.index') }}" class="main-btn danger-btn-outline m-2">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </form>
    </div>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
