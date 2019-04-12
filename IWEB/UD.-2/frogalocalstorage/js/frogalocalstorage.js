$(document).ready(function(){
    $('#botonGuardar').click(function(){
         var nickNuevo= $('#ikasleNick').val();
           var nombreNuevo=$('#ikasleNombre').val()
                    
           localStorage.setItem(nickNuevo,nombreNuevo)
           alert('Valor guardado') 
    })
    
     $('#botonVer').click(function(){
         $('ul').html("");
             for (var i=0; i<localStorage.length; i++) {
                     var nuevoelem= $(document.createElement('li'));
                    var minick = localStorage.key(i);
                    var minombre = localStorage.getItem(minick);
                    
                 nuevoelem.html(minick + " - " + minombre)
                 $(nuevoelem).appendTo('ul');  
             }
     })
    
     $('#botonBorrar').click(function(){
          var nickNuevo= $('#ikasleNick').val();
         

                    localStorage.removeItem(nickNuevo);
	 	alert('Valor eliminado');
               

     })
     $('#botonModificar').click(function(){
         var nickNuevo= $('#ikasleNick').val();
           var nombreNuevo=$('#ikasleNombre').val()
                    
           localStorage.setItem(nickNuevo,nombreNuevo)
           alert('Valor guardado') 
         
     })
    
    
})

