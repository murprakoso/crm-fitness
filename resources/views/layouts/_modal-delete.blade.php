 {{-- Modal --}}
 <div class="modal hide fade in" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <form action="#" method="post" id="formDelete">
                 @csrf
                 @method('delete')
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Yakin ingin hapus?</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                     <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
