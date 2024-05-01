    <input type="text" name="search" id="search_text">

    <div id="result"></div> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){

    load_data();

    function load_data(query)
    {
        $.ajax({
                    url:'shop.php',
                    type:"POST",
                    data:{
                        'q':query,
                    },
    success:function(data)
    {
        $('#result').html(data);
    }
    });
    }
    
    $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
    load_data(search);
    }
    else
    {
    load_data();
    }
    });
    });
    </script>