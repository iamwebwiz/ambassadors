        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="text-right">
                <strong>Copyright &copy; 2018 <a href="{{ url('/') }}">Digital Ambassadors</a>.</strong>
                All rights reserved.
            </div>
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3.3.1 -->
    <script src="{{ asset('assets/jquery/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    @yield('script')

    <script>
        $('#flash-overlay-modal').modal();
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. -->
</body>
</html>
