$(document).ready(function(){
  
        $("a.servidor").click(function(){
            window.history.pushState("", "", "/cgpes/main.php");
        });
    });
  
$(document).ready(function(){
  
        $("a.usuario").click(function(){
            window.history.pushState("", "", "/cgpes/main.php");
        });
    });

$(function() {
    $('a[data-toggle="tab"]').on('click', function(e) {
        window.localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = window.localStorage.getItem('activeTab');
    if (activeTab) {
        $('#cgpes a[href="' + activeTab + '"]').tab('show');
        window.localStorage.removeItem("activeTab");
    }
});
// Atualiza dados servidor
$('#update-servidor').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipientID = button.data('whatever') // Extract info from data-* attributes
          var recipientnome = button.data('whatevernome')
          var recipientemail = button.data('whateveremail')
          var recipienttrt = button.data('whatevertrt')
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('#id').val(recipientID)
          modal.find('#nome').val(recipientnome)
          modal.find('#email').val(recipientemail)
          modal.find('#trt').val(recipienttrt)
          
        })
// Atualiza dados usuario
$('#update-usuario').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipientID = button.data('whatever') // Extract info from data-* attributes
          var recipientnome = button.data('whatevernome')
          var recipientemail = button.data('whateveremail')
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('#idUsuario').val(recipientID)
          modal.find('#nomeUsuario').val(recipientnome)
          modal.find('#emailUsuario').val(recipientemail)
          
        })
//Atualiza dados do próprio usuário
$('#update-user').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipientID = button.data('whatever') // Extract info from data-* attributes
          var recipientnome = button.data('whatevernome')
          var recipientemail = button.data('whateveremail')
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('#idUser').val(recipientID)
          modal.find('#nomeUser').val(recipientnome)
          modal.find('#emailUser').val(recipientemail)
          
        })

$(function(){
  $("#myTabs .tab").each(function(){
    if (location.href.indexOf($(this).attr("url"))>-1) $(this).addClass("active");
  });
});