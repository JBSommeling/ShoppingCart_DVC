$(document).ready(function () {
    /**
     * Function to toggle sidebar from left.
     */
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#search').toggleClass('extended');

    });

    $('#searchCollapse').on('click', function () {
        $('#search').toggleClass('active');
    });

    /**
     * Function to filter list of products by books
     */
    $("#Boeken").click(function(e){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        e.preventDefault();
        $.ajax({
            url: '/products/books' ,
            data:{_token: CSRF_TOKEN},
            type:'GET',
            success: function(data){
                $("#productContent").load('/products/books');
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
            url: '/products/movies' ,
            data:{_token: CSRF_TOKEN},
            type:'GET',
            success: function(data){
                $("#productContent").load('/products/movies');
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
            url: '/products/music' ,
            data:{_token: CSRF_TOKEN},
            type:'GET',
            success: function(data){
                $("#productContent").load('/products/music');
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
            url: '/products/games' ,
            data:{_token: CSRF_TOKEN},
            type:'GET',
            success: function(data){
                $("#productContent").load('/products/games');
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
            url: '/products/instruments' ,
            data:{_token: CSRF_TOKEN},
            type:'GET',
            success: function(data){
                $("#productContent").load('/products/instruments');
            },
            error: function (data) {
                alert('error');
            }
        });
    });
});
