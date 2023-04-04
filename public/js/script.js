$(document).ready(function() {
    $(".js-select2").select2();


    /* Delete Modal */
    $("body").on("click", "a[data-confirm], button[data-confirm]", function(ev) {
        var href = $(this).attr('href');

        var title = $(this).attr("data-title");

        if (!$('#dataConfirmModal').length) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            var html = '<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog modal-sm" style="width: 50%;"><div class="modal-content"><div class="modal-header"><h5 id="dataConfirmLabel" class="modal-title">Delete Confirmation</h5><button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button></div><div class="modal-body"></div><div class="modal-footer"><button class="btn btn-sm btn-secondary btn-sm" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i> Cancel</button>';
            html += '<form id="dataConfirmOK" action="" method="POST">';
            html += '<input type="hidden" name="_token" value="' + csrf_token + '">';
            html += '<input type="hidden" name="_method" value="DELETE">';

            html += '<button type="submit" class="btn btn-sm btn-danger">Delete</button></form></div></div></div></div>';
            $('body').append(html);
        }
        $('#dataConfirmModal').find('.modal-body').html($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('action', href);
        $('#dataConfirmModal').modal({ show: true });
        return false;
    });
});