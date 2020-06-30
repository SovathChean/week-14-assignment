$(document).ready(function () {
    $.ajaxSetup({
        headers: {
			"X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content"),
        },
    });

    $(".ajax-delete").click(function () {
		const self = $(this);

        if (confirm("Do you want to delete?")) {
            $.ajax({
                url: self.data("url"),
                type: "DELETE",
                success: function (res) {
                    if (res.success) {
                        $('#' + self.data('id')).html('');
                    } else {
						if(confirm(res.message + '\nDo you want to refresh the page?'))
							window.location.reload();
					}
				},
				error: function (res) {
					if (confirm(res.responseJSON.message + '\nDo you want to refresh the page?'))
						window.location.reload();
				}
            });
        }
    });
  $(".ajax-approve").click(function (){
    const self = $(this);

    if (confirm("Do you want to approve?")) {
    $.ajax({
          type: "POST",
          url: self.data("url"),
          success: function(response){
            if(response.success){
                if(self.data('approve'))
                {
                 $('#' + self.data('change')).html('<button type="submit" class="btn btn-outline-danger ajax-approve" data-change= "{{  $post->id }}" data-url="{{ url("posts.ajax_approve/") }}" data-id="post-{{ $post->id }} data-approve="0" > Approve</button>');
                }
                else{

                $('#' + self.data('change')).html(`<button type="submit" class="btn btn-outline-success ajax-approve" data-change= "{{  $post->id }}" data-url="{{ url("posts.ajax_approve/") }}" data-id="post-{{ $post->id }}  data-approve="1" > Disapprove</button>`);
                }
            }
            else {
              if(confirm(response.message + '\nDo you want to refresh the page?'))
                window.location.reload();
            }
          },
  				error: function (response) {
  					if (confirm(response.responseJSON.message + '\nDo you want to refresh the page?'))
  						window.location.reload();
  				}
       });
     }
    })

});
