      const containerImage = document.querySelector('.container #containerImage');
      const jumbo = document.querySelector('.container #jumbo');
      const thumbs = document.querySelectorAll('.container #thumb');

      containerImage.addEventListener('click', function(e) {
        
        // correct click which is thumb
        if( e.target.id == 'thumb' ){
          
          jumbo.src = e.target.src;
          jumbo.classList.add('fade');
          setTimeout(function(){
            jumbo.classList.remove('fade');
          }, 500);
          
          thumbs.forEach(function(thumb) {
            /*if( thumb.classList.contains('active')) {
              thumb.classList.remove('active');
            }*/
            thumb.className = 'thumb';
          });
          
          e.target.classList.add('active');
        }
        
      });
