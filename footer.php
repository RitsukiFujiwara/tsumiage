<footer id="footer">
      Copyright <a href="#">Tsumiageサポートセンター</a>. All Rights Reserved.<a href="https://stories.freepik.com/data">Illustration by Freepik Stories</a>
    </footer>
    
    <script src="js/vendor/jquery-2.2.2.min.js"></script>
    <script>
      $(function(){
        var $ftr = $('#footer');
        if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight() ){
          $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) +'px;' });
        }
      });
    </script>
  </body>
</html>