@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center  mb-30">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                    <h2 class="mr-40">Service Kendaraan</h2>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    @if(!$selected_vehicle)
        <div class="card-style mb-30">
            <h6 class="mb-25">Pilih Kendaraan</h6>
            <form>
                <div class="input-style-3 mb-30">
                    <input type="search" name="code" placeholder="kode kendaraan..." list="vehicle-list">
                    <span class="icon"><i class="lni lni-search"></i></span>

                    <datalist id="vehicle-list">
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->code }}">[{{ $vehicle->license_number }}] {{ $vehicle->brand }} {{ $vehicle->model }}</option>
                        @endforeach
                    </datalist>
                </div>

                <div class="col-12">
                    <div class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          ">
                        <button class="main-btn primary-btn btn-hover m-2">
                            Berikutnya
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div class="card-style mb-30 d-flex">
            <div class="mr-2"><img src="{{ Storage::url($selected_vehicle->image) }}" alt="{{ $selected_vehicle->image }}" class="img-fluid" style="width: 256px"></div>
            <div class="ml-20 flex-fill">
                <p class="clearfix">Kode Kendaraan <strong class="text-info">{{ $selected_vehicle->code }}</strong></p>
                <h4>{{ $selected_vehicle->license_number }}</h4>
                <h5 class="lead">{{ $selected_vehicle->brand }} {{ $selected_vehicle->model }} {{ $selected_vehicle->year }}</h5>
            </div>
            <div>
                <a class="link-secondary" href="{{ route('service.create') }}"><i class="lni lni-car"></i> Ganti Kendaraan</a>
            </div>
        </div>
        <div class="card-style mb-30">
            <h6 class="mb-25">Service Baru</h6>
            <form action="{{ route('service.store') }}" method="post" >
                @csrf
                <input type="hidden" name="vehicle_id" value="{{ $selected_vehicle->id }}">
                <div class="input-style-1">
                    <label for="license_number">Tanggal Service</label>
                    <div class="row">
                        <div class="col-3">
                            <input type="date" @error('date') class="form-control is-invalid" @enderror name="date"
                                   id="date" value="{{ old('date') ?? date('Y-m-d') }}" max="{{ date('Y-m-d') }}" required>
                            @error('date')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="input-style-1">
                    <label for="license_number">Detail Service</label>
                    <div class="row">
                        <div class="col-6">
                            <textarea @error('detail') class="form-control is-invalid" @enderror name="detail"
                                      id="detail" value="{{ old('detail') }}" required></textarea>
                            @error('detail')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="input-style-1">
                    <label for="license_number">Biaya</label>
                    <div class="row">
                        <div class="col-3">
                            <input type="number" @error('cost') class="form-control is-invalid" @enderror name="cost"
                                   id="cost" value="{{ old('cost') }}" required>
                            @error('cost')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr>

                <div class="input-style-1">
                    <label for="license_number">Jadwal Service Berikutnya</label>
                    <div class="row">
                        <div class="col-3">
                            <input type="date" @error('next_service_date') class="form-control is-invalid" @enderror name="next_service_date"
                                   id="date" value="{{ old('next_service_date') ?? \Carbon\Carbon::now()->add('month', 1)->format('Y-m-d') }}" min="date('Y-m-d')" required>
                            @error('next_service_date')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="input-style-1">
                    <label for="license_number">Catatan (opsional)</label>
                    <div class="row">
                        <div class="col-6">
                            <textarea @error('note') class="form-control is-invalid" @enderror name="note"
                                      id="note" value="{{ old('note') }}"></textarea>
                            @error('note')
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
                        <button class="main-btn primary-btn btn-hover m-2" type="submit">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endif

@endsection
