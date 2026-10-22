{{-- Area widget per posisi (Admin Web > Widget). Widget kanan tetap dirender sidebar tema; atas & kiri tampil di atas baris artikel, bawah di bawahnya, selebar container tema. --}}
@if (! function_exists('widget_aktif'))
    @yield('layout')
@else
    <div class="default-row">
        <div class="container-custom">
            @include('theme::partials.widget.posisi', ['posisi' => 'atas'])
            @include('theme::partials.widget.posisi', ['posisi' => 'kiri'])
        </div>
    </div>
    @yield('layout')
    <div class="default-row">
        <div class="container-custom">
            @include('theme::partials.widget.posisi', ['posisi' => 'bawah'])
        </div>
    </div>
    <style>
        .opensid-widget-area { display:grid; gap:15px; margin-top:20px; }
        .opensid-widget-item { min-width:0; background:#fff; border:#dbdbdb 1px solid; box-shadow:0 0 5px 0 rgba(0,0,0,.35); padding:15px; overflow:hidden; }
    </style>
@endif
