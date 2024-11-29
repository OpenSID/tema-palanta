@php
    $themeVersion = 'v2409.0.0';  
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('commons.meta')
    @include('commons.source_css')
    @include('commons.source_js')
    <title>@yield('title')</title>
    @stack('styles')
</head>

<body>
    <div id="palanta">
        @include('commons.header')
        @yield('layout')
    </div>    

    @include('commons.footer')
    
    <script src="{{ theme_asset('js/script.min.js') }}?{{$themeVersion}}"></script>
    <script type="text/javascript">
        function formatRupiah(angka, prefix = 'Rp ') {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '') + ',00';
        }
    </script>
    @stack('scripts')
</body>

</html>