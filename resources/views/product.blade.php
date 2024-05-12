<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Searching || Products List</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">


            <div class="mb-3" style="margin-top:30px;">
             <label  class="form-label"><strong>Search Product List</strong></label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Search Product" >
            </div>
            <div id="product_list">

            </div>

    </div>
    <script>
        $(document).ready(function(){
            $('#name').on('keyup',function(){
                var val = $(this).val();
                $.ajax({
                    url:'{{ route('product.search') }}',
                    type:'GET',
                    data:{'name':val},
                    success:function(data){
                        $('#product_list').html(data);
                    }
                });
            });
            $(document).on('click','li',function(){
                var val = $(this).text();
                $('#name').val(val);
                $('#product_list').html('');
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
