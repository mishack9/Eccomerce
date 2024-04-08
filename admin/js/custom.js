$(document).ready(function(){

$('.delete_cat').click(function(e) {
    e.preventDefault();
    var id = $(this).val();
   // alert(id);

    swal({
        title: "Are you sure you want to delete this record ?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
         $.ajax({
            method: "POST",
            url: "code.php",
            data: {
                'catergory_id':id,
                'delete_cat': true
            },
           
           success: function(response){
            console.log(response);
             if(response == 200){
              
                swal("Success!", "Product deleted successfully....!", "success");
                $('#cat_table').load(location.href + " #cat_table")
             } else if(response == 500){
                swal("Error!", "Something went wrong....!", "Error");
             }
           }
         });
        }
      });

});

});


//Delete product using iquery
$(document).ready(function(){

    $('.delete-btn').click(function(e) {
        e.preventDefault();
        var id = $(this).val();
       // alert(id);
    
        swal({
            title: "Are you sure you want to delete this record ?",
            text: "Once deleted, you will not be able to recover this record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
             $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'product_id':id,
                    'delete_btn': true
                },
               
               success: function(response){
                console.log(response);
                 if(response == 200){
                  
                    swal("Success!", "Product deleted successfully....!", "success");
                    $('#product_table').load(location.href + " #product_table")
                 } else if(response == 500){
                    swal("Error!", "Something went wrong....!", "Error");
                 }
               }
             });
            }
          });
    
    });
    
    });