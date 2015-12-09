$ ()->
    window.onscroll=()->
        allHeight = document.body.clientHeight - window.innerHeight
        if allHeight > 0
            percent = parseInt document.body.scrollTop / allHeight * 100
            percent = 100 if percent >100
            percent = percent + '%';
            $('#topProgress>div').css 
                'width' : percent