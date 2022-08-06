$(document).ready(function(){
    //datatable
    $('#sections').DataTable();
    //check admin password
    $("#current_password").keyup(function(){
        var current_password = $("#current_password").val();
        alert(current_password);
    })
    //confirm deletion
    // $(".confirmDelete").click(function(){
    //     var title = $(this).attr("title");
    //     if(confirm("Are you sure to delete this"+title+"?")){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // })
    $(".confirmDelete").click(function(){
        var module = $(this).attr('module');
        var moduleid = $(this).attr('moduleid');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
              window.location = "/admin/delete-"+module+"/"+moduleid;
            }
          })
    })
    //append catagories
    $("#section_id").change(function(){
      var section_id = $this.val();
      alert(section_id);
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'get',
        url:'/admin/append-catagories-level',
        data:{section_id:section_id},
        seccess:function(resp){
          $("#appendCatagoriesLevel").html(resp);

        },error:function(){
          alert("Error");
        }
      })
    });
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div> <div style="height:10px;"></div><input type="text" name="size[]"  placeholder="Size" style="width: 100px"/>&nbsp;<input type="text" name="sku[]"  placeholder="Sku" style="width: 100px"/>&nbsp<input type="text" name="price[]"  placeholder="Price" style="width: 100px"/>&nbsp;<input type="text" name="stock[]"  placeholder="Stock" style="width: 100px"/>&nbsp;<a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});