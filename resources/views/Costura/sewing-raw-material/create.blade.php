@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span class="card-title"> Nuevo Material</span>
                                <div class="float-right">
                                    <div class="float-right">
                                        <div class="float-right">
                                            <a class="btn btn-primary" href="{{ route('sewing-raw-materials.index') }}">
                                                <i class="bi bi-backspace"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sewing-raw-materials.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('Costura/sewing-raw-material.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var amountRollInput = document.getElementById('amount-roll');
        var amountMtsInput = document.getElementById('amount-mts');

        amountRollInput.addEventListener('input', function() {
            var amountRoll = this.value;
            var amountMts = amountRoll * 50; // Ajusta la relación según tus necesidades
            amountMtsInput.value = amountMts;
        });
    });
</script>

