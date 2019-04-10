/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Delete function
 */



$('a#delete').confirm({
    icon: 'glyphicon glyphicon-trash',
    title: '',
    type: 'red',
    content: "Are you sure you want to delete?",
    typeAnimated: true,
    buttons: {
        Ok: {
            btnClass: 'btn-red',
            action: function () {
                location.href = this.$target.attr('href');
            }
        },
        cancel: function () {
        }
    }
});