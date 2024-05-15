$("#quantity_bundle").change(function () {
    let price_bundle = $("#price_bundle").val();
    let quantity_bundle = $("#quantity_bundle").val();
    $("#amount_bundle").val(price_bundle * quantity_bundle);
});

$("#price_bundle").change(function () {
    let price_bundle = $("#price_bundle").val();
    let quantity_bundle = $("#quantity_bundle").val();
    $("#amount_bundle").val(price_bundle * quantity_bundle);
});

let price_bundle = $("#price_bundle").val();
$("#amount_bundle").val(price_bundle);
