$(document).ready(function () {
    // Warning
    $(window).on('beforeunload', function(){
        return "Any changes will not be Saved";
    });

    // Form Submit
    $(document).on("submit", "form", function(event){
        // disable warning
        $(window).off('beforeunload');
    });
});