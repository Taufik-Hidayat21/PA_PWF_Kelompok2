<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            
            <div class="pull-left info">
                <p>{{ \Auth::user()->name  }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">Functions</li> -->
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="{{ route('admin.gallery.index') }}"><i class="fa fa-cubes"></i> <span>Gallery</span></a></li>
            <li><a href="{{ route('admin.fasilitas.index') }}"><i class="fa fa-cubes"></i> <span>Fasilitas</span></a></li>
            <li><a href="{{ route('admin.pembayaran.index') }}"><i class="fa fa-list"></i> <span>Pembayaran</span></a></li>
            <li><a href="{{ route('admin.kamar.index') }}"><i class="fa fa-plus-square"></i> <span>Kamar</span></a></li>
            <li><a href="{{ route('admin.penghuni.index') }}"><i class="fa fa-users"></i> <span>Penghuni</span></a></li>
            








        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>