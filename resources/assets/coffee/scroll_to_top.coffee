$ ()->
  window.onscroll=()->
    sc = document.body.scrollTop
    if sc > 150
      $('#scrollToTop').show()
    else
      $('#scrollToTop').hide()

  $('#scrollToTop').on 'click',()->
    $('body').animate {'scrollTop':'0'},300
    false

  $('#scrollToTop').on 'mouseover',()->
    $(this).css {
      'color':'white',
      'background-color':'#03A9F4'
    }

  $('#scrollToTop').on 'mouseout',()->
    $(this).css {
      'color':'black',
      'background-color':'#B6B6B6'
    }