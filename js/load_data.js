/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Load Data Ajax
 */


$(document).ready(function (e) {
        $("#search").keyup(function () {
            $("#show_up").show();
            var text = $(this).val();
            $.ajax({
                type: 'GET',
                url: 'load_data.php',
                data: 'search=' + text,
                success: function (data) {
                    $("#show_up").html(data);
                }
            });
        })
    });