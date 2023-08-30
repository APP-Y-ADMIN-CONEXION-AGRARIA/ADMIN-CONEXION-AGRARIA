function NotificacionEliminar(){
    Swal.fire({
        title: '¿Estas seguro de borrar este registro?',
        text: "No podras revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borralo!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Eliminado!',
            'El registro ha sido eliminado correctamente',
            'success'
          )
        }
      })
}