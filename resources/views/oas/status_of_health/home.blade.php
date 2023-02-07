@extends('oas.layouts.app')

@section('content')
{{-- header --}}
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="border-bottom">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('button.home') }}</a></li>
                      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ __('statusOfHealth.title') }}</li>
                    </ol>
                </nav>
                <h1 class="fw-bold">{{ __('statusOfHealth.title') }}</h1>
                <p><span class="fw-bold">{{ __('step.step-3') }}</span> {{ __('step.completed') }}</p>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary opacity-25" role="progressbar" style="width: 58%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end header --}}

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('statusOfHealth.create',['id' => Crypt::encrypt($APPLICATION_RECORD_ID)])}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('statusOfHealth.card-header-1') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">{{ __('statusOfHealth.table-header-1') }}</th>
                                        <th scope="col">{{ __('statusOfHealth.table-header-2') }}</th>
                                        <th scope="col">{{ __('statusOfHealth.table-header-3') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($diseases); $i++)         
                                        <tr>
                                            <th scope="row">
                                                {{ $diseases[$i]->name }}
                                                <input type="hidden" name="disease_id[]" value="{{ $diseases[$i]->id }}">
                                            </th>
                                            <td>
                                                <select name="disease_status[]" id="disease_status[{{ $diseases[$i]->id }}]" class="form-select" onchange="setRequired(this,'disease_remark[{{ $diseases[$i]->id }}]')">
                                                    <option value="0">{{ __('statusOfHealth.option-0') }}</option>
                                                    <option value="1">{{ __('statusOfHealth.option-1') }}</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" maxlength="100" onkeyup="if (/[^|A-Za-z0-9\s,/]+/g.test(this.value)) this.value = this.value.replace(/[^|A-Za-z0-9\s,/]+/g,'')" name="disease_remark[]" id="disease_remark[{{ $diseases[$i]->id }}]" class="form-control">
                                            </td>  
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('academicDetail.home',['id'=> Crypt::encrypt($APPLICATION_RECORD_ID)]) }}" class="btn btn-outline-secondary me-3">{{ __('button.back') }}</a>
                            <button type="submit" class="btn btn-primary me-3">{{ __('button.next') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // 1 = no, 2 = yes 
    // refer to dropdown above
    function setRequired(select,remark_id){
        (select.value == 1)?document.getElementById(remark_id).setAttribute('required',''):document.getElementById(remark_id).removeAttribute('required');
    }
</script>
@endsection