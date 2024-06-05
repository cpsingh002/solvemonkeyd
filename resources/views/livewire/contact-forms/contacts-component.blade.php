
 <!-- sa-app__toolbar / end -->
 <!-- sa-app__body -->
 <div id="top" class="sa-app__body">

     <div class="mx-xxl-3 px-4 px-sm-5">
         <div class="py-5">
             <div class="row g-4 align-items-center">
                 <div class="col">
                     <nav class="mb-2" aria-label="breadcrumb">

                     </nav>
                     <h1 class="h3 m-0">Contact Forms</h1>
                 </div>
                 
             </div>
         </div>
     </div>
     <div class="mx-xxl-3 px-4 px-sm-5 pb-6">
         <div class="sa-layout">
             <!-- <div class="sa-layout__backdrop" data-sa-layout-sidebar-close=""></div> -->

             <div class="sa-layout__content">
                 <div class="card">

                 @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                     <!-- <div class="sa-divider"></div> -->
                     <div class="p-4"><input type="text" placeholder="Start typing to search for customers" class="form-control form-control--search mx-auto" id="table-search"></div>
                     <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]" data-sa-search-input="#table-search" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                         <thead>
                         <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Message</th>
                                    <th>Is Replied</th>
                                    <th>Reply</th>
                                </tr>

                         </thead>
                         <tbody>
                         @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{$contact->id}}</td>
                                        <td>{{$contact->fname}} {{$contact->lname}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->phone}}</td>
                                        <td>{{$contact->message}}</td>
                                        <td>@if($contact->is_replay) Yes @else No @endif</td>
                                        <td><button  class="btn btn-primary" wire:click.prevent="replyContact({{$contact->id}})">Reply</button></td>
                                    </tr>
                                @endforeach
                         </tbody>
                     </table>

                    

                 </div>
             </div>
         </div>
     </div>
     <div wire:ignore.self class="modal fade" id="contactReplyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Preview Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="sendMail">
            <div class="modal-body">
                <label class="form-label">Email:{{$email}}</label><br>
                <div>
                <label class="form-label">Subject:</label>
                <input type='text' class ="form-control" wire:model="subject"></input>
                @error('subject') <p class="text-danger">{{$message}}</p> @enderror<br>
                </div>
                <div>
                <label class="form-label">Reply:</label>
                <textarea class ="form-control" id="description" placeholder="Description" wire:model="reply"></textarea>
                @error('reply') <p class="text-danger">{{$message}}</p> @enderror
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Send</button>
            </div>
            </form>
        </div>
    </div>
</div> 
 </div>
 
 @push('scripts')
 <script>
    document.addEventListener('livewire:init', () => {
       Livewire.on('opencontactReplyModal', (event) => {
        $('#contactReplyModal').modal('show');
       });
    });
    document.addEventListener('livewire:init', () => {
       Livewire.on('closecontactReplyModal', (event) => {
        $('#contactReplyModal').modal('hide');
       });
    });
</script>
<script src="https://cdn.tiny.cloud/1/5949s82j52s02vlrmcq6l2c2gkzihao5gxjymat25ancman4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
     $(function(){
            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#description').val();
                        @this.set('reply',sd_data);
                    });
                }
            });

            
        });
    </script>
@endpush