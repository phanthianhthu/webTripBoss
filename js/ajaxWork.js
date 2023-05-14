
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
function showContact(){
    $.ajax({
        url:"./adminview/viewContact.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



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
function cateEditForm(cateId){
    $.ajax({
        url:"./adminview/updateFormCategory.php",
        method:"post",
        data:{record:cateId},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function blogsEditForm(blogId){
    $.ajax({
        url:"./adminview/updateBlogsForm.php",
        method:"post",
        data:{record:blogId},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function tripsEditForm(tripId){
    $.ajax({
        url:"./adminview/updateTripForm.php",
        method:"post",
        data:{record:tripId},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



//delete category data
function categoryDelete(cateId){
    if (confirm("Are you sure you want to delete this category?")) {
    $.ajax({
        url:"./controller/catDeleteController.php",
        method:"post",
        data:{record:cateId},
        success:function(data){
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategory();
        }
    });
    } else {
        return false;
    }
}


//delete trip data
function tripsDelete(tripId){
    if (confirm("Are you sure you want to delete this trip?")) {
    $.ajax({
        url:"./controller/deleteTripsController.php",
        method:"post",
        data:{record:tripId},
        success:function(data){
            alert('Trip Successfully deleted');
            $('form').trigger('reset');
            showTrips();
        }
    });
    }else {
    return false;
    }
}


//delete blogs data
function blogsDelete(blogId){
    if (confirm("Are you sure you want to delete this blog?")) {
    $.ajax({
        url:"./controller/deleteBlogsController.php",
        method:"post",
        data:{record:blogId},
        success:function(data){
            alert('Successfully deleted');
            $('form').trigger('reset');
            showBlogs();
        }
    });
    }else {
        return false;
        }
}

//delete booking data
function bookingDelete(bookingId){
    if (confirm("Are you sure you want to delete this booking?")) {
    $.ajax({
        url:"./controller/deleteBookingController.php",
        method:"post",
        data:{record:bookingId},
        success:function(data){
            alert('Successfully deleted');
            $('form').trigger('reset');
            showBooking();
        }
    });
    }else {
        return false;
        }
}
//delete contact data
function contactDelete(contactId){
    if (confirm("Are you sure you want to delete this contact?")) {
    $.ajax({
        url:"./controller/deleteContactController.php",
        method:"post",
        data:{record:contactId},
        success:function(data){
            alert('Successfully deleted');
            $('form').trigger('reset');
            showContact();
        }
    });
    }else {
        return false;
        }
}




