
/**Function to confirm the delete an item*/
function deleteRow (id,table,url){
    if (window.confirm("Do you really want to delete this entry?")) {
        window.location=url+"?ref="+table+"&id="+id;
    }
}
