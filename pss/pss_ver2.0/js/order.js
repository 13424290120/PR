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

// To format the subTotal as Finance view format 300,000.00
function fmoney(s, n)   
{   
   n = n > 0 && n <= 20 ? n : 2;   
   s = parseFloat((s + "").replace(/[^\d\.-]/g, "")).toFixed(n) + "";   
   var l = s.split(".")[0].split("").reverse(),   
   r = s.split(".")[1];   
   t = "";   
   for(i = 0; i < l.length; i ++ )   
   {   
      t += l[i] + ((i + 1) % 3 == 0 && (i + 1) != l.length ? "," : "");   
   }   
   return t.split("").reverse().join("") + "." + r;   
} 

// To convert back from Finance view format to normal number in order to do calculation
function rmoney(s)   
{  
    if ( s != 0 && s.indexOf(",") > 0 ){
        return parseFloat(s.replace(/[^\d\.-]/g, ""));
    }else{
        return s;
    }
       
} 

function calcProdSubTotal() {
    
    var prodSubTotal = 0;

    $(".row-total-input").each(function(){
    
        var valString = $(this).val()+"" || 0;        
        if ( valString != 0 && valString.indexOf(",") > 0 )
        {
            valString = rmoney(valString); //convert back from string to float
        }        
        
        prodSubTotal += parseFloat(valString); 
        
    });
      
    $("#product-subtotal").val(fmoney(prodSubTotal, 2));

};

function calcTax(){
    var taxRate = $("#taxRate").children('option:selected').val(); 
    var prodSubTotal = $("#product-subtotal").val();
    
        prodSubTotal = rmoney(prodSubTotal);
        if (IsNumeric(prodSubTotal)){
            var tax = prodSubTotal * taxRate;            
            var totalWithTax = tax + prodSubTotal;
            $("#tax").val(tax);
            $("#product-subtotal-tax").val(totalWithTax);  
        }
}

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
            var roundRowTotal = fmoney(rowTotal, 2);
            //var roundRowTotal = rowTotal.toFixed(2);
            
            $this
                .css("background-color", "white")
                .parent().parent()
                .find("td.row-total input")
                .val(roundRowTotal);                    
            
        } else {
        
            $this.css("background-color", "#ffdcdc"); 
                        
        };
        
        calcProdSubTotal();
        calcTax();
        
    });

    $('.price-per-pallet').blur(function(){
    
        var $this = $(this);
    
        var pricePallets = $this.val();
//        alert (numPallets);
        var multiplier = $this
                            .parent().parent()
                            .find("input.num-pallets-input")
                            .val();
//          alert (multiplier);
        
        if ( (IsNumeric(pricePallets)) && (pricePallets != '') ) {
            
            var rowTotal = pricePallets * multiplier;
            //var roundRowTotal = rowTotal.toFixed(2);
           var roundRowTotal = fmoney(rowTotal, 2);
            
            $this
                .css("background-color", "white")
                .parent().parent()
                .find("td.row-total input")
                .val(roundRowTotal);                    
            
        } else {
        
            $this.css("background-color", "#ffdcdc"); 
                        
        };
        
        calcProdSubTotal(); 
        calcTax();
        
    });
    
    $('#taxRate').change(function(){
        var taxVal = $(this).children('option:selected').val();
        var prodSubTotal = $('#product-subtotal').val();
        if ( prodSubTotal != 0 && prodSubTotal.indexOf(",") > 0 )
        {
            prodSubTotal = rmoney(prodSubTotal); //convert back from string to float
        }
        var tax = taxVal * prodSubTotal;
        var prodSubTotalWithTax = prodSubTotal + tax;
        $('#tax').val(tax);
        $('#product-subtotal-tax').val(prodSubTotalWithTax);
    })

});