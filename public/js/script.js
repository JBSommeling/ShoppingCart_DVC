$(document).ready(function () {
    /**
     * Function to toggle sidebar from left.
     */
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#search').toggleClass('extended');

    });

    /**
     * Function to toggle search bar from left.
     */
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
                $("#productContent").html(data);
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
                $("#productContent").html(data);
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
                $("#productContent").html(data);
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
                $("#productContent").html(data);
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
                $("#productContent").html(data);
            },
            error: function (data) {
                alert('error');
            }
        });
    });

    /**
     * Function to search products by name
     */
    $("#search").keyup(function(e){
        var search = $('#search').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        e.preventDefault();
        $.ajax({
            url: '/products/'+search,
            data:{_token: CSRF_TOKEN},
            type:'GET',
            success: function(data){
                $("#productContent").html(data);
            },
            error: function (data) {
                $.ajax({
                    url: '/products/all' ,
                    data:{_token: CSRF_TOKEN},
                    type:'GET',
                    success: function(data){
                        $("#productContent").html(data);
                    },
                    error: function (data) {
                        alert('error');
                    }
                });
            }
        });
    });
});
