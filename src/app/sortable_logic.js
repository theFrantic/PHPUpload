/**
 * Created by frantic on 22-11-2014.
 */
var main_list = document.getElementById('main_list');
new Sortable(main_list, {
    group: "main_list",
    store: null, // @see Store
    handle: ".my-handle", // Restricts sort start click/touch to the specified element
    filter: ".ignor-elements", // Selectors that do not lead to dragging (String or Function)
    draggable: ".item",   // Specifies which items inside the element should be sortable
    ghostClass: "sortable-ghost",

    onStart: function (/**Event*/evt) { /* dragging */ },
    onEnd: function (/**Event*/evt) { /* dragging */ },

    onAdd: function (/**Event*/evt){
        var itemEl = evt.item; // dragged HTMLElement
    },

    onUpdate: function (/**Event*/evt){
        var itemEl = evt.item; // dragged HTMLElement
    },

    onRemove: function (/**Event*/evt){
        var itemEl = evt.item; // dragged HTMLElement
    },

    onFilter: function (/**Event*/evt){
        var itemEl = evt.item; // HTMLElement on which was `mousedown|tapstart` event.
    }
});
