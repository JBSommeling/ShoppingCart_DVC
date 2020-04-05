$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    /**
     * Function to filter list of products by books
     */
    $("#Boeken").click(function(e){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        e.preventDefault();
        $.ajax({
            url: 'product/books' ,
            data:{_token: CSRF_TOKEN},
            type:'GET',
            success: function(data){
                $("#productContent").load('/product/books');
            },
            error: function (data) {
                alert('error');
            }
        });
    });

    /**
     * Function to filter list of products by movies
     */
    $("#Films").click(function(e){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        e.preventDefault();
        $.ajax({
            url: 'product/movies' ,
            data:{_token: CSRF_TOKEN},
            type:'GET',
            success: function(data){
                $("#productContent").load('/product/movies');
            },
            error: function (data) {
                alert('error');
            }
        });
    });

    /**
     * Function to filter list of products by music
     */
    $("#Muziek").click(function(e){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        e.preventDefault();
        $.ajax({
            url: 'product/music' ,
            data:{_token: CSRF_TOKEN},
            type:'GET',
            success: function(data){
                $("#productContent").load('/product/music');
            },
            error: function (data) {
                alert('error');
            }
        });
    });

    /**
     * Function to filter list of products by games
     */
    $("#Games").click(function(e){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        e.preventDefault();
        $.ajax({
            url: 'product/games' ,
            data:{_token: CSRF_TOKEN},
            type:'GET',
            success: function(data){
                $("#productContent").load('/product/games');
            },
            error: function (data) {
                alert('error');
            }
        });
    });

    /**
     * Function to filter list of products by instruments
     */
    $("#Instrumenten").click(function(e){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        e.preventDefault();
        $.ajax({
            url: 'product/instruments' ,
            data:{_token: CSRF_TOKEN},
            type:'GET',
            success: function(data){
                $("#productContent").load('/product/instruments');
            },
            error: function (data) {
                alert('error');
            }
        });
    });
});
