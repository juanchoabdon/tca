function(
  a, // 'Shockwave'
  b, // 'Flash'
  ) {

    // try creating an AxtiveXObject (internet explorer use this object)
    try {
        a = new ActiveXObject(a+b+'.'+a+b);
    } 
    // if fails, is not ie, so check for the navigator.plugins object
    catch ( e ) {
        a = navigator.plugins[a+' '+b];
    }
	
    // return true/false
    return!!a;

}('Shockwave','Flash') // auto-run passing the name of Flash Player plugin