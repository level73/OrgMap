function spectrum(hue, steps, minSat, maxSat, minLig, maxLig){

    var deltaSat = maxSat - minSat;
    var deltaLig = minLig - maxLig;

    var satIncrement = Math.floor(deltaSat / steps);
    var ligIncrement = Math.floor(deltaLig / steps);

    var theSat = minSat;
    var theLig = maxLig;

    var theColors = new Array();

    for(i = 1; i <= steps; i++){
        var theColor = Raphael.hsl2rgb( hue, theSat, theLig);
        theColors[i] = theColor.hex;

        theSat = theSat + satIncrement;
        theLig = theLig + ligIncrement;
    }

    return theColors;
}

jQuery(document).ready(function(){
  // Checking what SDGS are alive on the country page
  var theSDGList = jQuery('.sdg-tabs .sdg-term-list .sdg-icon-list .sdg-icon');
  var activeSDG = [];
  theSDGList.each(function(){
    var sdgIndex = jQuery(this).data('sdg');
    if(jQuery('.country-taxonomy-entry.sdg-class-' + sdgIndex).length > 0){
      activeSDG.push(sdgIndex);
    }
    else {
      jQuery(this).fadeTo(300, 0.2);
    }
  });

  // show/hide organizatons and initiatives on the main country page
  jQuery('.sdg-tabs .sdg-taxonomy-term').click(function(e){
    e.preventDefault();
    var theSDG = jQuery(this).data('sdg');
    jQuery('.country-taxonomy-entry').addClass('sdg-hidden').removeClass('sdg-show');
    jQuery('.country-taxonomy-entry.sdg-class-' + theSDG ).removeClass('sdg-hidden').addClass('sdg-show');
  })


});
