<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.head')

<body>
    <div id="app">
        @include('partials.navbar')

        <!-- class="py-4" --->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <hr>
    @include('partials.footer')

    <!-- Ajax -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>


</html>
