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
