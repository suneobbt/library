/**Function to confirm the delete an item*/
function deleteRow(id, table, url) {
    //alert(id+" "+table+" "+url);
    if (window.confirm("Do you really want to delete this entry?")) {
        window.location = url + "?ref=" + table + "&id=" + id;
    }
}


window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);