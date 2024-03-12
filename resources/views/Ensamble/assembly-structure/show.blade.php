@extends('layouts.app')

@section('template_title')
    {{ $assemblyStructure->name ?? "{{ __('Show') Assembly Structure" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Assembly Structure</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('assembly-structures.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name Input:</strong>
                            {{ $assemblyStructure->name_input }}
                        </div>
                        <div class="form-group">
                            <strong>Color Input:</strong>
                            {{ $assemblyStructure->color_input }}
                        </div>
                        <div class="form-group">
                            <strong>Accessory Id:</strong>
                            {{ $assemblyStructure->accessory_id }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $assemblyStructure->amount }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
