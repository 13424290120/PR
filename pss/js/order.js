function IsNumeric(sText)

{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
};

function calcProdSubTotal() {
    
    var prodSubTotal = 0;

    $(".row-total-input").each(function(){
    
        var valString = $(this).val() || 0;
        
        prodSubTotal += parseInt(valString);
                    
    });
        
    $("#product-subtotal").val(prodSubTotal);

};

$(function(){

    $('.num-pallets-input').blur(function(){
    
        var $this = $(this);
    
        var numPallets = $this.val();
//        alert (numPallets);
        var multiplier = $this
                            .parent().parent()
                            .find("input.price-per-pallet")
                            .val();
//          alert (multiplier);
        
        if ( (IsNumeric(numPallets)) && (numPallets != '') ) {
            
            var rowTotal = numPallets * multiplier;
            
            $this
                .css("background-color", "white")
                .parent().parent()
                .find("td.row-total input")
                .val(rowTotal);                    
            
        } else {
        
            $this.css("background-color", "#ffdcdc"); 
                        
        };
        
        calcProdSubTotal();    
    });

});