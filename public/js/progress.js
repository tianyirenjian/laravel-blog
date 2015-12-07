(function() {
  $(function() {
    return window.onscroll = function() {
      var allHeight, percent;
      allHeight = document.body.clientHeight - window.innerHeight;
      if (allHeight > 0) {
        percent = parseInt(document.body.scrollTop / allHeight * 100);
        if (percent > 100) {
          percent = 100;
        }
        percent = percent + '%';
        return $('#topProgress>div').css({
          'width': percent
        });
      }
    };
  });

}).call(this);

//# sourceMappingURL=progress.js.map
