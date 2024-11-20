
@extends('layouts.master')

@section('top')
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <!-- Log on to codeastro.com for more projects! -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ \App\Models\Fasilitas::count() }}<sup style="font-size: 20px"></sup></h3>

                <p>Fasilitas</p>
            </div>
            <div class="icon">
                <i class="fa fa-list"></i>
            </div>
            <a href="{{ route('admin.fasilitas.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ \App\Models\Gallery::count() }}<sup style="font-size: 20px"></sup></h3>

                <p>Gallery</p>
            </div>
            <div class="icon">
                <i class="fa fa-list"></i>
            </div>
            <a href="{{ route('admin.gallery.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ \App\Models\Pembayaran::count() }}<sup style="font-size: 20px"></sup></h3>

                <p>Pembayaran</p>
            </div>
            <div class="icon">
                <i class="fa fa-list"></i>
            </div>
            <a href="{{ route('admin.pembayaran.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ \App\Models\Kamar::count() }}</h3>

                <p>Kamar</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ route('admin.kamar.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3>{{ \App\Models\Penghuni::count() }}</h3>

                <p>Penghuni</p>
            </div>
            <div class="icon">
                <i class="fa fa-cart-plus"></i>
            </div>
            <a href="{{ route('admin.penghuni.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- Log on to codeastro.com for more projects! -->


<div class="row">
    
    <!-- ./col -->
    <!-- ./col -->

    <!-- ./col -->
    <!-- ./col -->
    <div id="container" class=" col-xs-6"></div>
</div><!-- Log on to codeastro.com for more projects! -->
@endsection