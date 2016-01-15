$(document).ready(function() {
    $('.showEdit').click(showEdit);
});
function showEdit(){
    $('.editRow').not(this).addClass('hidden');
    $('.viewRow').not(this).addClass('hidden');
    $(this).parent().parent().next().removeClass('hidden');

}

$(document).ready(function() {
    $('.showView').click(showView);
});
function showView(){
    $('.viewRow').not(this).addClass('hidden');
    $('.editRow').not(this).addClass('hidden');
    $(this).parent().parent().next().next().removeClass('hidden');

}