<div class="card-styles">
    <div class="card-style-1 mb-30">
        <div class="card-content">
            <form method="get">
                <h6 class="mb-25">Form Filter</h6>
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-style-2">
                            <input type="date" name="start_date" value="{{ request('start_date') ?? date('Y-m-d') }}">
                            <span class="icon">
                                <i class="lni lni-calendar"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-style-2">
                            <input type="date" name="end_date" value="{{ request('end_date') ?? date('Y-m-d') }}">
                            <span class="icon">
                                <i class="lni lni-calendar"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="select-style-2">
                            <div class="select-position">
                                <select name="vehicle_id" id="">
                                    <option value="0">Semua</option>
                                    @foreach(\App\Models\Vehicle::all() as $vehicle)
                                        <option @if(request('vehicle_id') == $vehicle->id ) selected @endif value="{{ $vehicle->id }}">{{ $vehicle->model }} nopol {{ $vehicle->license_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <button class="main-btn primary-btn btn-hover">
                            Filter!
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
