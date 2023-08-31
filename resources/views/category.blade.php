<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta
        name="viewport"
        content='width=device-width, initial-scale=1.0, user-scalable=0'
    />
    <meta charset="utf-8" />
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .SUB_A{
            position: relative;
            left: 200px;
        }
        .SUB_B{
            position: relative;
            right: 200px;
        }
    </style>

</head>
<body class="d-flex justify-content-center " >
<div class=" mt-8 ">
    <div class="dropdown mt-5">
        <select name="main_category" id="main_category" class="form-control SelectBox btn btn-secondary ">
            <h1>Main Category</h1>
            <option selected disabled>Select Category </option>
            @foreach($categories as $category)
                <option class="btn btn-light "  value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="to_append">
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

<script>
    $(document).ready(function() {
        $('select[name="main_category"]').on('change', function() {
            var main_category_id = $(this).val();
            var main_category_name = $(this).find('option:selected').text();
            if (main_category_id) {
                $.ajax({
                    url: "{{ URL::to('sub_category') }}/" + main_category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var e = $('<div class="SUB_'+main_category_name.substring(0,4)+' dropdown d-flex  mt-5"><select class="sub_category form-control SelectBox btn btn-secondary"  id="'+main_category_name+'"><option selected disabled>Select Sub Category </option></select></div>');
                        $('.to_append').append(e);
                        $.each(data, function(key, value) {
                            $('select[id="'+main_category_name+'"]').append('<option value="' +
                                value['id'] + '">' + value['name'] + '</option>');
                        });
                    }})
            } else {
                console.log('AJAX OF PRODUCTS load did not work');
            }
        });
    });
    $(document).on('change', 'select.sub_category', function() {
        var sub_category_id = $(this).val();
        var sub_category_name = $(this).find('option:selected').text();
        if (sub_category_id) {
            $.ajax({
                url: "{{ URL::to('sub_category') }}/" + sub_category_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var e = $('<div class="'+sub_category_name.substring(0,3)+'_'+sub_category_name.substring(4,5)+' d-flex dropdown mt-5"><select class="sub_category form-control SelectBox btn btn-secondary"  id="'+sub_category_id+'"><option selected disabled>Select Sub Category </option></select></div>');
                    $(e).insertAfter($(this).closest('.dropdown')); // Insert after the parent dropdown

                    $.each(data, function(key, value) {
                        $('select[id="'+sub_category_id+'"]').append('<option value="' +
                            value['id'] + '">' + value['name'] + '</option>');
                    });
                }.bind(this) // Bind the success function to maintain the correct context
            });
        } else {
            console.log('AJAX request for sub_sub_category did not work');
        }
    });
</script>
</html>
