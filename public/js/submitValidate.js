
   
$(document).on("click",'#submits', function(){
 
    var stuffs = [];
    var validateArr=[];
    //console.log($('#OneSomon').find('.OneSomon').val());
  function ErrorValidateSomon(id_validate,id_error)
  {
      var stuff = {};
      var selectIsValid = true;
        id_validate.each(function (){

          if (isNaN(parseFloat($(this).val()))) {
             // selectIsValid = false;
              $("#"+$(this).attr('id')).addClass("border-danger");
              $(id_error+'Somon').removeClass("d-none");
               selectIsValid=false;
              validateArr.push(selectIsValid);
              return;
          }


            stuff[$(this).attr('name')] = $(this).val();

            stuffs[stuff];

      });
      // validateArr.push(selectIsValid);
        return selectIsValid;
  }
   // console.log(valueToPush);


    function filters(id_filter){
        return id_filter.filter(function(){
            return !isNaN(parseFloat($(this).val()));
        }).length;
    }

        //1 somon validate function
    $('[id^=newg]').each(function(){
        // do stuff
         var len= filters($(this).find('.Somon'));
           if(len>0)
           {
           var length=ErrorValidateSomon($(this).find('.Somon'),'#g');
           //console.log(length);
         } });
         $('[id^=newh]').each(function(){
        // do stuff
         var len= filters($(this).find('.Somon'));
           if(len>0)
           {
           var length=ErrorValidateSomon($(this).find('.Somon'),'#h');
           //console.log(length);
         } });
         $('[id^=newj]').each(function(){
        // do stuff
         var len= filters($(this).find('.Somon'));
           if(len>0)
           {
           var length=ErrorValidateSomon($(this).find('.Somon'),'#j');
           //console.log(length);
         } });
         $('[id^=newk]').each(function(){
        // do stuff
         var len= filters($(this).find('.Somon'));
           if(len>0)
           {
           var length=ErrorValidateSomon($(this).find('.Somon'),'#k');
           //console.log(length);
         } });
         $('[id^=new0]').each(function(){
        // do stuff
         var len= filters($(this).find('.Somon'));
           if(len>0)
           {
           var length=ErrorValidateSomon($(this).find('.Somon'),'#0');
           //console.log(length);
         } });
    $('[id^=new3]').each(function(){
        // do stuff
        var len= filters($(this).find('.Somon'));
        if(len>0)
        {
            ErrorValidateSomon($(this).find('.Somon'),'#3');
        } });
    $('[id^=new5]').each(function(){
        // do stuff
        var len= filters($(this).find('.Somon'));
        if(len>0)
        {
            ErrorValidateSomon($(this).find('.Somon'),'#5');
        } });

    $('[id^=newb]').each(function(){
        // do stuff
        var len= filters($(this).find('.Somon'));
        if(len>0)
        {
            ErrorValidateSomon($(this).find('.Somon'),'#b');
        } });
    $('[id^=newc]').each(function(){
        // do stuff
        var len= filters($(this).find('.Somon'));
        if(len>0)
        {
            ErrorValidateSomon($(this).find('.Somon'),'#c');
        } });
    $('[id^=newt]').each(function(){
        // do stuff
        var len= filters($(this).find('.Somon'));
        if(len>0)
        {
            ErrorValidateSomon($(this).find('.Somon'),'#t');
        } });
    $('[id^=newd]').each(function(){
        // do stuff
        var len= filters($(this).find('.Somon'));
        if(len>0)
        {
            ErrorValidateSomon($(this).find('.Somon'),'#d');
        } });
    $('[id^=newe]').each(function(){
        // do stuff
        var len= filters($(this).find('.Somon'));
        if(len>0)
        {
            ErrorValidateSomon($(this).find('.Somon'),'#e');
        } });
    $('[id^=newf]').each(function(){
        // do stuff
        var len= filters($(this).find('.Somon'));
        if(len>0)
        {
            ErrorValidateSomon($(this).find('.Somon'),'#f');
        } });
        // one diram validate 
        $('[id^=newq]').each(function(){
            // do stuff
            var len= filters($(this).find('.Somon'));
            if(len>0)
            {
                ErrorValidateSomon($(this).find('.Somon'),'#f');
            } });
            $('[id^=neww]').each(function(){
                // do stuff
                var len= filters($(this).find('.Somon'));
                if(len>0)
                {
                    ErrorValidateSomon($(this).find('.Somon'),'#f');
                } });

                //25 diram 
                $('[id^=newy]').each(function(){
                    // do stuff
                    var len= filters($(this).find('.Somon'));
                    if(len>0)
                    {
                        ErrorValidateSomon($(this).find('.Somon'),'#y');
                    } });
                    $('[id^=newu]').each(function(){
                        // do stuff
                        var len= filters($(this).find('.Somon'));
                        if(len>0)
                        {
                            ErrorValidateSomon($(this).find('.Somon'),'#u');
                        } });
                        $('[id^=newi]').each(function(){
                            // do stuff
                            var len= filters($(this).find('.Somon'));
                            if(len>0)
                            {
                                ErrorValidateSomon($(this).find('.Somon'),'#i');
                            } });

                            $('[id^=newo]').each(function(){
                                // do stuff
                                var len= filters($(this).find('.Somon'));
                                if(len>0)
                                {
                                    ErrorValidateSomon($(this).find('.Somon'),'#o');
                                } });
                                $('[id^=newp]').each(function(){
                                    // do stuff
                                    var len= filters($(this).find('.Somon'));
                                    if(len>0)
                                    {
                                        ErrorValidateSomon($(this).find('.Somon'),'#p');
                                    } });
                                    
                                    // 50 diram
                                    $('[id^=new4]').each(function(){
                                        // do stuff
                                        var len= filters($(this).find('.Somon'));
                                        if(len>0)
                                        {
                                            ErrorValidateSomon($(this).find('.Somon'),'#4');
                                        } });
                                        $('[id^=new6]').each(function(){
                                            // do stuff
                                            var len= filters($(this).find('.Somon'));
                                            if(len>0)
                                            {
                                                ErrorValidateSomon($(this).find('.Somon'),'#6');
                                            } });
                                            $('[id^=new7]').each(function(){
                                                // do stuff
                                                var len= filters($(this).find('.Somon'));
                                                if(len>0)
                                                {
                                                    ErrorValidateSomon($(this).find('.Somon'),'#7');
                                                } });
    //post form validateArr.length
    var len= filters($('[id^=new]').find('.Somon'));
    //nipolnoe validate
    function nepolnoe()
    {
        var selectIsValid = false;
        $('[id^=nepolniySomon]').each(function (){

            if($(this).val()>0)
            {
                selectIsValid=true;
            }
        });
        return  selectIsValid;
    }

    if(validateArr.length==0 && len>0 )
    {

        $("#form").submit();

        return;
    }

    if(validateArr.length==0 && len==0 &&  nepolnoe()==true)
    {
        $("#form").submit();

        return;
    }

    return false;
});