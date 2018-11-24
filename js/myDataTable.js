$(function(){
    myDataTable("myTable");

    myDataTableManager("myTableManager");
});

function myDataTable(id){
    $('#'+id+'').DataTable({
      "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "TODOS"]],
      "language": {
          "lengthMenu": "Mostrar _MENU_ noticias por página",
          "zeroRecords": "No hay noticias disponibles",
          "info": "Mostrando página _PAGE_ de _PAGES_",
          "infoEmpty": "No hay noticias disponibles",
          "infoFiltered": "(filtro de _MAX_ total de noticias)",
          "search": "Buscar noticias:",
          "paginate": {
             "previous": "Anterior",
              "next": "Siguiente"
          }
      },
  });
  }
  
  function myDataTableManager(id){
    $('#'+id+'').DataTable({
      "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "TODOS"]],
      "language": {
          "lengthMenu": "Mostrar _MENU_ administradores por página",
          "zeroRecords": "No hay administradores disponibles",
          "info": "Mostrando página _PAGE_ de _PAGES_",
          "infoEmpty": "No hay administradores disponibles",
          "infoFiltered": "(filtro de _MAX_ total de administradores)",
          "search": "Buscar administradores:",
          "paginate": {
             "previous": "Anterior",
              "next": "Siguiente"
          }
      },
  });
  }