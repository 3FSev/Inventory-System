$(document).ready(function() {
    // Add item button click handler
    $('.add-item').click(function() {
        // Clone the item group template
        var itemGroup = $('.item-group-template').clone().removeClass('d-none').addClass('item-group');

        // Append the item group to the items container
        $('#items-container').append(itemGroup);

        // Add remove item button click handler
        itemGroup.find('.remove-item').click(function() {
            $(this).closest('.item-group').remove();
        });

        // Add item to the table
        var itemName = itemGroup.find('.item-select option:selected').text();
        var itemQuantity = itemGroup.find('.quantity-input').val();
        var row = $('<tr>').append(
            $('<td>').text(itemName),
            $('<td>').text(itemQuantity)
        );
        $('#items-table tbody').append(row);
    });
});