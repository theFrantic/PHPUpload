jQuery(function($) {
    var panelList = $('#draggablePanelList');

    panelList.sortable({
        // Only make the .panel-heading child elements support dragging.
        // Omit this to make the entire <li>...</li> draggable.
        handle: '.panel-heading',
        //Update event handler
        update: function() {
            var arrayOfIndexes = new Array();
            $('.panel', panelList).each(function(index, elem) {
                var listItem = $(elem),
                    newIndex = listItem.index();
                    var img = {
                        id: listItem.data("id"),
                        position: newIndex
                    };
                    arrayOfIndexes.push(img);   //Insert the object into the array
            });

            var params = { images: arrayOfIndexes };        //Our parameter images that will be sent to the server (contains an array)
            var paramsJSON = JSON.stringify(params);    //Converts into JSON

            // Persist the new indices. AJAX call to PHP action to save new indexes on db
            $.ajax({
                url : "action.update_positions.php",
                type: "POST",
                data : paramsJSON,
                contentType: "application/json",
                success: function(data, textStatus, jqXHR)
                {
                    //data - response from server
                    alert("Ok updated " + data);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert("Error");
                }
            });
        }
    });
});

/**
 * Function to delete an image on server
 */
function clickToDelete(elem){
    var id = $(elem).data("id");
    alert("on ClickToDelete()");
}