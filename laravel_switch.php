<!-- TOOGLE SWITCH 1 -->

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

<!-- USE THIS IN CONTROLLER -->
public function changeEventStatus(Request $request)
{
    $obj = Event::find($request->id);
    $obj->status = $request->status;
    $obj->save();

    return response()->json(['success' => 'Status change successfully.']);
}










<!-- TOOGLE SWITCH 2 take permission -->
<input type="checkbox" class="__CHANGE__THIS__1__" id="single-col-{{ $service->id }}" data-id="{{ $service->id }}" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $service->status ? 'checked' : '' }} >
<label class="custom-control-label" for="customSwitch3">Toggle this</label>


<script>
    $(function() {
        $('.customControlInput').change(function() {
            if(confirm("Do you want to change the status?")){
                var status = $(this).prop('checked') == true ? 1 : 0; 
                var id = $(this).data('id');     
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "changeCoursCategoryStatus",
                    data: {'status': status, 'id': id},
                    success: function(data){
                        console.log(data.success);
                    }
                });
            } else {
                if($("#single-col-"+$(this).data('id')).prop("checked") == true){
                     $("#single-col-"+$(this).data('id')).prop('checked', false);
                }
                else if($("#single-col-"+$(this).data('id')).prop("checked") == false){
                     $("#single-col-"+$(this).data('id')).prop('checked', true);
                }
            }
        })
    })
</script>


<!-- USE ROUTE LIKE THIS -->
Route::get('__CHANGE__THIS__2__', [ServiceController::class, 'changeServiceStatus']);

<!-- USE THIS IN CONTROLLER -->
public function changeEventStatus(Request $request)
{
    $obj = Event::find($request->id);
    $obj->status = $request->status;
    $obj->save();

    return response()->json(['success' => 'Status change successfully.']);
}
