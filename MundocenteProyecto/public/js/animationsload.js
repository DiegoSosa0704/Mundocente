function loadLine(){
    var
      $progress       = $('.ui.progress'),
      $button         = $(this),
      updateEvent
    ;
    // restart to zero
    clearInterval(window.fakeProgress)
    $progress.progress('reset');
     // updates every 10ms until complete
    window.fakeProgress = setInterval(function() {
      $progress.progress('increment');
      $button.text( $progress.progress('get value') );
      // stop incrementing when complete
      if($progress.progress('is complete')) {
        clearInterval(window.fakeProgress)
        $progress.progress('reset');      
      }

    }, 5);

 }



$('#progressloadfixed')
  .progress({
    duration : 200,
    total    : 300,
    text     : {
      active: '{value} of {total} done',

    }
  })
;