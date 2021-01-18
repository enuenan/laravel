<!-- TOOGLE SWITCH -->

<input type="checkbox" class="__CHANGE__THIS__1__" id="customSwitch3" data-id="{{ $service->id }}" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $service->status ? 'checked' : '' }} >
<label class="custom-control-label" for="customSwitch3">Toggle this</label>

<!-- USE THIS AJAX -->
<script>
    $(function() {
        $('.__CHANGE__THIS__1__').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0; 
            var id = $(this).data('id'); 
            // console.log(id);
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "__CHANGE__THIS__2__",
                data: {'status': status, 'id': id},
                success: function(data){
                    console.log(data.success);
                }
            });
        })
    })
</script>

<!-- USE ROUTE LIKE THIS -->
Route::get('__CHANGE__THIS__2__', [ServiceController::class, 'changeServiceStatus']);