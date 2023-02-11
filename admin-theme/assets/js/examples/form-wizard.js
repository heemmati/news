'use strict';
$(document).ready(function () {

    $('#wizard1').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="wizard-index">#index#</span> #title#'
    });

    $('#wizard2').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="wizard-index">#index#</span> #title#',
        onStepChanging: function (event, currentIndex, newIndex) {
           return true;
        }
    });

});
