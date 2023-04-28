
function showBlogs(){  
     $.ajax({
         url:"./adminview/viewBlog.php",
         method:"post",
         data:{record:1},
         success:function(data){
             $('.allContent-section').html(data);
         }
     });
 }
function showBooking(){  
    $.ajax({
        url:"./adminview/viewBooking.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showCategory(){  
    $.ajax({
        url:"./adminview/viewCategories.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showTrips(){  
    $.ajax({
        url:"./adminview/viewTrip.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showUsers(){
    $.ajax({
        url:"./adminview/viewUser.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


//add product data
// function addTrips(){
//     $('#upload').click(function addTrips(){

//     var tr_name=$('#tr_name').val();
//     var tr_place=$('#tr_place').val();
//     var tr_desc=$('#tr_desc').val();
//     var tr_price=$('#tr_price').val();
//     var tr_cate=$('#tr_cate').val();  
//     var file=$('#file')[0].files[0];

//     var fd = new FormData();
//     fd.append('tr_name', tr_name);
//     fd.append('tr_place', tr_place);
//     fd.append('tr_desc', tr_desc);
//     fd.append('tr_price', tr_price);
//     fd.append('tr_cate', tr_cate);
//     fd.append('file', file);
//     $.ajax({
//         url:"./controller/addTripsController.php",
//         method:"post",
//         async: false,
//         data:fd,
//         processData: false,
//         cache: false,
//         contentType: false,
//         success: function(data){
//             alert('Product Added successfully.');
//             $('form').trigger('reset');
//             showTrips();
//         }
//     });
// });
// }


// //add cate
function addCate () {
    var c_name = $('c_name').val();
    var c_desc = $('c_desc').val();

    var fd = new FormData();
    fd.append('c_name', c_name);
    fd.append('c_desc', c_desc);
    $.ajax({
        url:"./controller/addCatController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Category Added successfully.');
            $('form').trigger('reset');
            showCategory();
        }
    });
}

//edit cate data
function cateEditForm(id){
    $.ajax({
        url:"./adminview/updateFormCategory.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function blogsEditForm(id){
    $.ajax({
        url:"./adminview/updateBlogsForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



//delete category data
function categoryDelete(id){
    $.ajax({
        url:"./controller/catDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategory();
        }
    });
}

//delete trip data
function tripsDelete(id){
    $.ajax({
        url:"./controller/deleteTripsController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Size Successfully deleted');
            $('form').trigger('reset');
            showTrips();
        }
    });
}


//delete blogs data
function blogsDelete(id){
    $.ajax({
        url:"./controller/deleteBlogsController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Successfully deleted');
            $('form').trigger('reset');
            showBlogs();
        }
    });
}


//update cate after submit
// function updateCate(){
//     var c_name = $('#c_name').val();
//     var c_desc = $('#c_desc').val();
//     var fd = new FormData();
//     fd.append('c_name', c_name);
//     fd.append('c_desc', c_desc);
   
//     $.ajax({
//       url:'./controller/updateCategory.php',
//       method:'post',
//       data:fd,
//       processData: false,
//       contentType: false,
//       success: function(data){
//         alert('Update Success.');
//         $('form').trigger('reset');
//         showCategory();
//       }
//     });
// }



