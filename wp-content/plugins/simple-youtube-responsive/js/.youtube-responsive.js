/**
 * Simple YouTube Responsive
 * Lazy Load, Since version 2.0.0
 *
 **/
window.addEventListener("load", function(){
      var erdytplaydiv = document.querySelectorAll('.erd-ytplay');
      
      for (var i = 0; i < erdytplaydiv.length; i++) {
        erdytplaydiv[i].addEventListener( "click", function() {
          var erdyti = document.createElement( "iframe" );
                erdyti.setAttribute( "id", "erdyti-"+[i]+"-"+this.dataset.vid );
                erdyti.setAttribute( "frameborder", "0" );
                erdyti.setAttribute( "allowfullscreen", "" );
				erdyti.setAttribute( "allow", "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" );
                erdyti.setAttribute( "src", this.dataset.src );
          var erdytip = this.parentNode;
              erdytip.innerHTML = '';
              erdytip.appendChild( erdyti );  
          });
      }
}, false);