<!-- Footer -->
  <footer class="site-footer">
    <div class="site-footer-legal">© 2016 <a href="//www.dgambassadors.com" target="_blank">DGAmbassadors</a></div>
    <div class="site-footer-right">
      Crafted with <i class="red-600 icon md-favorite"></i> by Webwiz
    </div>
  </footer>
  <!-- Core  -->
  {{-- <script src="{{ asset('assets/jquery/jquery-3.3.1.min.js') }}"></script> --}}
  <script src="{{asset('userdash/global/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/bootstrap/bootstrap.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/animsition/animsition.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/asscroll/jquery-asScroll.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/mousewheel/jquery.mousewheel.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/asscrollable/jquery.asScrollable.all.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/ashoverscroll/jquery-asHoverScroll.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/waves/waves.min.js')}}"></script>

  <!-- Plugins -->
  <script src="{{asset('userdash/global/vendor/switchery/switchery.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/intro-js/intro.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/screenfull/screenfull.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/slidepanel/jquery-slidePanel.min.js')}}"></script>

  <!-- Plugins For This Page -->
  <script src="{{asset('userdash/global/vendor/chartist-js/chartist.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/jvectormap/jquery-jvectormap.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/matchheight/jquery.matchHeight-min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/peity/jquery.peity.min.js')}}"></script>

  <!-- Scripts -->
  <script src="{{asset('userdash/global/js/core.min.js')}}"></script>
  <script src="{{asset('userdash/js/site.min.js')}}"></script>

  <script src="{{asset('userdash/js/sections/menu.min.js')}}"></script>
  <script src="{{asset('userdash/js/sections/menubar.min.js')}}"></script>
  <script src="{{asset('userdash/js/sections/gridmenu.min.js')}}"></script>
  <script src="{{asset('userdash/js/sections/sidebar.min.js')}}"></script>

  <script src="{{asset('userdash/global/js/configs/config-colors.min.js')}}"></script>
  <script src="{{asset('userdash/js/configs/config-tour.min.js')}}"></script>

  <script src="{{asset('userdash/global/js/components/asscrollable.min.js')}}"></script>
  <script src="{{asset('userdash/global/js/components/animsition.min.js')}}"></script>
  <script src="{{asset('userdash/global/js/components/slidepanel.min.js')}}"></script>
  <script src="{{asset('userdash/global/js/components/switchery.min.js')}}"></script>
  <script src="{{asset('userdash/global/js/components/tabs.min.js')}}"></script>

  <script src="{{asset('userdash/global/js/components/matchheight.min.js')}}"></script>
  <script src="{{asset('userdash/global/js/components/jvectormap.min.js')}}"></script>
  <script src="{{asset('userdash/global/js/components/peity.min.js')}}"></script>


  <script src="{{asset('userdash/examples/js/dashboard/v1.min.js')}}"></script>


  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'http://www.google-analytics.com/analytics.js',
      'ga');

    ga('create', 'UA-65522665-1', 'auto');
    ga('send', 'pageview');
  </script>

    @yield('scripts')
    <script>
        $('#flash-overlay-modal').modal();
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
</body>


<!-- Mirrored from getbootstrapadmin.com/remark/material/base/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Sep 2017 10:43:15 GMT -->
</html>
